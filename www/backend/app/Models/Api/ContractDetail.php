<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Api\ContractDetail
 *
 * @property int $id
 * @property int $contract_id
 * @property string $target
 * @property string $amount
 * @property string $datetime
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|ContractDetail newModelQuery()
 * @method static Builder|ContractDetail newQuery()
 * @method static Builder|ContractDetail query()
 * @method static Builder|ContractDetail whereAmount($value)
 * @method static Builder|ContractDetail whereContractId($value)
 * @method static Builder|ContractDetail whereCreatedAt($value)
 * @method static Builder|ContractDetail whereDatetime($value)
 * @method static Builder|ContractDetail whereId($value)
 * @method static Builder|ContractDetail whereTarget($value)
 * @method static Builder|ContractDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ContractDetail extends Model
{
    use HasFactory;

    const TYPE_ADDITION = 'addition';
    const TYPE_DECREASE = 'decrease';

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->amount > 0 ? self::TYPE_ADDITION : self::TYPE_DECREASE;
    }
}
