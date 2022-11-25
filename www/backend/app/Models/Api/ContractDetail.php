<?php

namespace App\Models\Api;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ContractDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractDetail whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractDetail whereContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractDetail whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractDetail whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ContractDetail extends Model
{
    use HasFactory;
}
