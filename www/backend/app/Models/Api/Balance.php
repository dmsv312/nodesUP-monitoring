<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Api\Balance
 *
 * @property int $id
 * @property int $contract_id
 * @property string $amount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Contract $contract
 * @property ContractDetail $lastReplenishment
 * @method static Builder|Balance newModelQuery()
 * @method static Builder|Balance newQuery()
 * @method static Builder|Balance query()
 * @method static Builder|Balance whereAmount($value)
 * @method static Builder|Balance whereContractId($value)
 * @method static Builder|Balance whereCreatedAt($value)
 * @method static Builder|Balance whereId($value)
 * @method static Builder|Balance whereUpdatedAt($value)
 */
class Balance extends Model
{
    use HasFactory;

    /**
     * Get Contract
     */
    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    public function lastReplenishment(): HasOne
    {
        return $this->hasOne(ContractDetail::class,'contract_id','contract_id')
            ->ofMany(
                ['datetime' => 'max'],
                function ($query) {
                    $query->where('amount', '>', 0);
                }
            );
    }
}
