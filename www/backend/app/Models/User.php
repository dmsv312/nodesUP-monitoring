<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Api\Contract;
use App\Models\Api\Rate;
use App\Models\Api\UserProfile;
use App\Models\Carbon\CarbonClient;
use Exception;
use Hash;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Throwable;

/**
 * App\Models\User
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $id
 * @property string $suid
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property UserProfile $userProfile
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @throws AuthorizationException
     * @throws Exception|Throwable
     */
    public function updateUser(string $name, string $password): array
    {

        $carbonClient = new CarbonClient();
        $profile = $carbonClient->getProfile($name, $password);

        if (!$profile) {
            throw new AuthorizationException('Not authorized in Carbon Api');
        }
        try {
            DB::beginTransaction();
            $this->name = $name;
            $this->password = Hash::make($password);
            $this->suid = $profile->suid;
            $this->save();

            $userProfile = UserProfile::firstOrNew(['user_id' => $this->id]);
            $userInfo = $userProfile->updateUserProfile($this, $profile);

            $rate = Rate::firstWhere(['carbon_rate_id' => $userInfo->rateId]);
            $contract = Contract::firstOrNew(['user_id' => $this->id]);
            $contract->updateContract($this, $rate->id);

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return [
            'profileDTO' => $profile,
            'userInfoDTO' => $userInfo,
            'rate' => $rate,
            'contract' => $contract,
        ];
    }

    /**
     * Get UserProfile.
     */
    public function userProfile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

}
