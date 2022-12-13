<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Api\Service
 *
 * @property int $id
 * @property int $contract_id
 * @property int $service_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property Contract $contract
 * @property Service $service
 * @method static Builder|Service newModelQuery()
 * @method static Builder|Service newQuery()
 * @method static Builder|Service query()
 * @method static Builder|Service whereCreatedAt($value)
 * @method static Builder|Service whereContractId($value)
 * @method static Builder|Service whereServiceId($value)
 * @method static Builder|Service whereId($value)
 * @method static Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ContractService extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @return BelongsTo
     */
    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }
}
