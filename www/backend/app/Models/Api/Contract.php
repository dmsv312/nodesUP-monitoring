<?php

namespace App\Models\Api;

use App\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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

    public function updateContract(User $user, int $rateId): bool
    {
        $this->rate_id = $rateId;
        $this->number = $user->name;
        $this->name = $user->name;
        //TODO - throw exception
        if (!$this->save()) {
            return false;
        }
        return true;
    }
}
