<?php

namespace App\Models\Carbon;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class CarbonClient
{
    public const USER_INFO = 'http://84.237.50.63:8082/rest_api/v2/Users/';
    public const LOGIN_METHOD = 'web_cabinet.login';
    public const USER_INFO_METHOD = 'web_cabinet.user_info';

    public string $error;

    public function getProfile(string $name, string $password): ProfileDTO|bool
    {
        $response = Http::asForm()->post(
            self::USER_INFO,
            [
                'method1' => self::LOGIN_METHOD,
                'arg1' => json_encode([
                    'login' => $name,
                    'passwd' => $password
                ])
            ]
        );

        $result = json_decode($response->object()->result[0]);

        if (isset($result->error)) {
            return false;
        }

        return new ProfileDTO($result);
    }

    public function getWebCabinetUserInfo($suid): UserInfoDTO|bool
    {
        $response = Http::asForm()->post(
            self::USER_INFO,
            [
                'method1' => self::USER_INFO_METHOD,
                'arg1' => json_encode([
                    'suid' => $suid,
                ])
            ]
        );

        $result = json_decode($response->object()->result[0]);

        if (isset($result->error)) {
            return false;
        }

        return new UserInfoDTO($result);
    }

}


