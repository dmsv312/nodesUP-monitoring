<?php

namespace App\Models\Carbon;

use stdClass;

/**
 * @property string $suid
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $address
 * @property int $carbonUserId
 * @property int $carbonCallerId
 */
class ProfileDTO
{
    public function __construct(stdClass $carbonProfile)
    {
        $this->carbonUserId = $carbonProfile->user->pk;
        $this->carbonCallerId = $carbonProfile->user->abonent->pk;
        $this->suid = $carbonProfile->session_id;
        $fio = explode(' ', $carbonProfile->user->__abonent);
        $this->lastname = $fio[0];
        $this->firstname = $fio[1];
        $this->middlename = $fio[2];
        $this->address = $carbonProfile->user->abonent->__home . ' ' . $carbonProfile->user->abonent->a_home_number;
    }
}
