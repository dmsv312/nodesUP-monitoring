<?php

namespace App\Models\Api;

use App\Models\Carbon\UserInfoDTO;
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
 //TODO - make amount float
 * @property string $amount
 * @property string $blocking_date
 * @property float $recommended_payment_amount
 * @property float $minimum_payment_amount
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
 *
 * * @mixin \Eloquent
 */
class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'amount',
        'blocking_date',
        'recommended_payment_amount',
        'minimum_payment_amount',
    ];

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

    public function updateBalance(UserInfoDTO $userInfo, float $ratePrice): bool
    {
        $this->amount = $userInfo->balance;
        $this->blocking_date = date('Y-m-d H:i:s', strtotime($userInfo->blockingDate));
        $this->recommended_payment_amount = $ratePrice - $this->amount;
        $this->minimum_payment_amount = $userInfo->minimumPaymentAmount;
        //TODO - throw exception
        if (!$this->save()) {
            return false;
        }
        return true;
    }
}
