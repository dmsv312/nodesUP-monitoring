<?php

namespace App\Models\Api;

use App\Models\Carbon\CarbonClient;
use App\Models\Carbon\ProfileDTO;
use App\Models\Carbon\UserInfoDTO;
use App\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Api\UserProfile
 *
 * @property int $id
 * @property int $user_id
 * @property int $carbon_user_id
 * @property string $carbon_caller_id
 * @property string $lastname
 * @property string $firstname
 * @property string $middlename
 * @property string $address
 * @property string $phone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereMiddlename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserId($value)
 * @mixin Eloquent
 */
class UserProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'carbon_user_id',
        'carbon_caller_id',
        'firstname',
        'lastname',
        'middlename',
        'address',
        'phone',
    ];

    public function updateUserProfile(User $user, ProfileDTO $profileDTO): UserInfoDTO|bool
    {
        $this->carbon_user_id = $profileDTO->carbonUserId;
        $this->carbon_caller_id = $profileDTO->carbonCallerId;
        $this->firstname = $profileDTO->firstname;
        $this->lastname = $profileDTO->lastname;
        $this->middlename = $profileDTO->middlename;
        $this->address = $profileDTO->address;

        $carbonClient = new CarbonClient();
        $userInfo = $carbonClient->getWebCabinetUserInfo($user->suid);

        $this->phone = $userInfo->phone;
        //TODO - throw exception
        if (!$this->save()) {
            return false;
        }

        return $userInfo;
    }

    /**
     * Get User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
