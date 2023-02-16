<?php

namespace App\Models\Api;

use App\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Api\Contract
 *
 * @mixin Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $rate_id
 * @property string $number
 * @property string $name
 * @property bool $is_blocked
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property User $user
 * @property Balance $balance
 * @property Blocking $blocking
 * @property Rate $rate
 * @property Service[] $services
 * @method static Builder|Contract newModelQuery()
 * @method static Builder|Contract newQuery()
 * @method static Builder|Contract query()
 * @method static Builder|Contract whereCreatedAt($value)
 * @method static Builder|Contract whereId($value)
 * @method static Builder|Contract whereName($value)
 * @method static Builder|Contract whereNumber($value)
 * @method static Builder|Contract whereRateId($value)
 * @method static Builder|Contract whereUpdatedAt($value)
 * @method static Builder|Contract whereUserId($value)
 */
class Contract extends Model
{
    use HasFactory;

    /**
     * Get User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Balance
     */
    public function balance(): HasOne
    {
        return $this->hasOne(Balance::class);
    }

    /**
     * Get Blocking
     */
    public function blocking(): HasOne
    {
        return $this->hasOne(Blocking::class);
    }

    /**
     * Get Services
     * @return BelongsToMany
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }

    /**
     * Get Rate
     */
    public function rate(): HasOne
    {
        return $this->hasOne(Rate::class, 'id', 'rate_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'rate_id',
        'number',
        'name',
    ];

    public function updateContract(User $user, int $rateId, bool $isBlocked): bool
    {
        $this->rate_id = $rateId;
        $this->number = $user->name;
        $this->name = $user->name;
        $this->is_blocked = $isBlocked;
        //TODO - throw exception
        if (!$this->save()) {
            return false;
        }
        return true;
    }
}
