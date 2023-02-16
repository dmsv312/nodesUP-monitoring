<?php

namespace App\Models\Carbon;

use stdClass;

/**
 * @property string $date
 * @property string $amount
 */
class LastFinanceOperationDTO
{
    public function __construct(stdClass $carbonFinanceOperationsInfo)
    {
        $this->date = $carbonFinanceOperationsInfo->fields->op_date;
        $this->amount = $carbonFinanceOperationsInfo->fields->op_summa;
    }
}
