<?php

namespace App\Models\Carbon;

use stdClass;

/**
 * @property string $suid
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property int $carbonUserId
 * @property int $carbonCallerId
 * @property string $ownDisabledStart
 * @property string $ownDisabledEnd
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
        //TODO - find a right address
        $this->address = 'кв. ' . $carbonProfile->user->abonent->a_home_number;
//        $this->address = $carbonProfile->user->home->unrestricted_value . ', кв. ' . $carbonProfile->user->abonent->a_home_number;
        $this->phone = $carbonProfile->user->abonent->sms ?? null;
        $this->email = $carbonProfile->user->abonent->email ?? null;
        $this->ownDisabledStart = $carbonProfile->user->abonent->own_disabled_start;
        $this->ownDisabledEnd = $carbonProfile->user->abonent->own_disabled_end;
    }
}
