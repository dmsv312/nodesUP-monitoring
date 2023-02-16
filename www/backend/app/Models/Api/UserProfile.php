<?php

namespace App\Models\Api;

use App\Models\Carbon\CarbonClient;
use App\Models\Carbon\ProfileDTO;
use App\Models\Carbon\UserInfoDTO;
use App\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
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
 * @method static Builder|UserProfile newModelQuery()
 * @method static Builder|UserProfile newQuery()
 * @method static Builder|UserProfile query()
 * @method static Builder|UserProfile whereAddress($value)
 * @method static Builder|UserProfile whereCreatedAt($value)
 * @method static Builder|UserProfile whereFirstname($value)
 * @method static Builder|UserProfile whereId($value)
 * @method static Builder|UserProfile whereLastname($value)
 * @method static Builder|UserProfile whereMiddlename($value)
 * @method static Builder|UserProfile wherePhone($value)
 * @method static Builder|UserProfile whereUpdatedAt($value)
 * @method static Builder|UserProfile whereUserId($value)
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
        $this->phone = $profileDTO->phone;

        $carbonClient = new CarbonClient();
        $userInfo = $carbonClient->getWebCabinetUserInfo($user->suid);

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
