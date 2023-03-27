<?php

namespace App\Models\Api;

use App\Models\Carbon\CarbonClient;
use App\Models\Carbon\PromisePayDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Api\Contract
 *
 * @mixin Eloquent
 *
 * @property int $id
 * @property int $contract_id
 * @property int $carbon_service_id
 * @property bool $is_active
 * @property string $start_date
 * @property string $end_date
 *
 * @property Contract $contract
 */
class PromisePay extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contract_id',
        'carbon_service_id',
        'is_active',
        'start_date',
        'end_date',
    ];

    /**
     * Get Contract
     */
    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    public function updatePromisePay(PromisePayDTO|bool $promisePayInfo): bool
    {
        if ($promisePayInfo) {
            $this->start_date = $promisePayInfo->startDate;
            $this->end_date = $promisePayInfo->endDate;
            $this->carbon_service_id = $promisePayInfo->carbonServiceId;
            $this->is_active = true;
        } else {
            $this->is_active = false;
        }

        //TODO - exceptions
        if (!$this->save()) {
            return false;
        }

        return true;
    }

    public function addPromisePay()
    {
        $carbonClient = new CarbonClient();

        $result = $carbonClient->addPromisePay($this->contract->user->suid);

        if ($result) {
            $this->is_active = true;
            $this->save();
        }

        return $result;
    }
}
