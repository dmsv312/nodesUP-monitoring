<?php

namespace App\Models\Carbon;

use Illuminate\Support\Facades\Http;

class CarbonClient
{
    public const USER_INFO_URL = 'http://84.237.50.63:8082/rest_api/v2/Users/';
    public const LOGIN_METHOD = 'web_cabinet.login';
    public const USER_INFO_METHOD = 'web_cabinet.user_info';

    public const USER_SERVICES_INFO_METHOD = 'web_cabinet.get_usluga_list';

    public string $error;

    public function getProfile(string $name, string $password): ProfileDTO|bool
    {
        $response = Http::asForm()->post(
            self::USER_INFO_URL,
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
            self::USER_INFO_URL,
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

    public function getWebCabinetAllServicesInfo($suid)
    {
        $response = Http::asForm()->post(
            self::USER_INFO_URL,
            [
                'method1' => self::USER_SERVICES_INFO_METHOD,
                'arg1' => json_encode([
                    'suid' => $suid,
                    'get_user_uslugas_all' => 1
                ])
            ]
        );

        $result = json_decode($response->object()->result[0]);

        if (isset($result->error)) {
            return false;
        }

        return $result;
    }

}


