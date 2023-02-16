<?php

namespace App\Models\Api;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Api\Rate
 *
 * @property int $id
 * @property string $name
 * @property string $speed
 * @property string $channels
 * @property string $hd_channels
 * @property float $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Rate newModelQuery()
 * @method static Builder|Rate newQuery()
 * @method static Builder|Rate query()
 * @method static Builder|Rate whereChannels($value)
 * @method static Builder|Rate whereCreatedAt($value)
 * @method static Builder|Rate whereHdChannels($value)
 * @method static Builder|Rate whereId($value)
 * @method static Builder|Rate whereName($value)
 * @method static Builder|Rate wherePrice($value)
 * @method static Builder|Rate whereSpeed($value)
 * @method static Builder|Rate whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Rate extends Model
{
    use HasFactory;
}
