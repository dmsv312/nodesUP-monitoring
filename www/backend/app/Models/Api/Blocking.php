<?php

namespace App\Models\Api;
use App\Models\Carbon\CarbonClient;
use App\Models\User;
use Eloquent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Api\Contract
 *
 * @mixin Eloquent
 *
 * @property int $id
 * @property int $contract_id
 * @property bool $is_active
 * @property string $start_date
 * @property string $end_date
 *
 * @property Contract $contract
 */
class Blocking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contract_id',
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

    public function updateBlocking(string $startDate, string $endDate): bool
    {
        if ($endDate) {
            $this->start_date = $startDate;
            $this->end_date = $endDate;
            $this->is_active = true;
        } else {
            $this->start_date = null;
            $this->end_date = null;
            $this->is_active = false;
        }
        //TODO - throw exception
        if (!$this->save()) {
            return false;
        }
        return true;
    }

    public function changeBlocking(): bool
    {
        $carbonClient = new CarbonClient();

        if ($this->is_active) {
            $startDate = null;
            $endDate = null;
        } else {
            $startDate = date('Y-m-d');
            $endDate = date('Y-m-d', strtotime('+1 year'));
        }

        $blockingInfoDTO = $carbonClient->changeBlocking($this->contract->user->userProfile->carbon_caller_id, $startDate, $endDate);
        // TODO - throw exception
        if (!$blockingInfoDTO) {
            return false;
        }
        $this->is_active = !(bool)$this->is_active;
        $this->start_date = $blockingInfoDTO->startDate;
        $this->end_date = $blockingInfoDTO->endDate;

        //TODO - throw exception
        if (!$this->save()) {
            return false;
        }

        return true;
    }
}
