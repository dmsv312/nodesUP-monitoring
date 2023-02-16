<?php

namespace App\Models\Carbon;

use stdClass;

/**
 * @property int $rateId
 * @property float $balance
 * @property bool $isBlocked
 * @property string $blockingDate
 * @property float $minimumPaymentAmount
 */
class UserInfoDTO
{
    public function __construct(stdClass $carbonUserInfo)
    {
        $this->rateId = $carbonUserInfo->tarif_id;
        $this->balance = floor($carbonUserInfo->balance * 100) / 100;
        $this->isBlocked = (bool)(int)$carbonUserInfo->in_block;
        $this->blockingDate = $carbonUserInfo->enough_to_date;
        $this->minimumPaymentAmount = round((float)$carbonUserInfo->minimal_pay_sum, 2, PHP_ROUND_HALF_UP);
    }
}
