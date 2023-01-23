<?php

namespace App\Models\Carbon;

use stdClass;

/**
 * @property string $startDate
 * @property string $endDate
 */
class BlockingInfoDTO
{
    public function __construct(stdClass $carbonBlockingResponse)
    {
        $this->startDate = $carbonBlockingResponse->fields->own_disabled_start;
        $this->endDate = $carbonBlockingResponse->fields->own_disabled_end;
    }
}
