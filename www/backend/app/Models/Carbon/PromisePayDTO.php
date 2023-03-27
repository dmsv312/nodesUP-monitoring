<?php

namespace App\Models\Carbon;

use stdClass;

/**
 * @property int $carbonServiceId
 * @property string $startDate
 * @property string $endDate
 */
class PromisePayDTO
{
    public function __construct(stdClass $serviceInfo)
    {
        $this->carbonServiceId = $serviceInfo->pk;
        $this->startDate = $serviceInfo->fields->create_date;
        $this->endDate = $serviceInfo->fields->end_time;
    }
}
