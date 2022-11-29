<?php

namespace App\Models\Api;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Api\Balance
 *
 * @property int $id
 * @property int $contract_id
 * @property string $amount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Balance newModelQuery()
 * @method static Builder|Balance newQuery()
 * @method static Builder|Balance query()
 * @method static Builder|Balance whereAmount($value)
 * @method static Builder|Balance whereContractId($value)
 * @method static Builder|Balance whereCreatedAt($value)
 * @method static Builder|Balance whereId($value)
 * @method static Builder|Balance whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Balance extends Model
{
    use HasFactory;
}
