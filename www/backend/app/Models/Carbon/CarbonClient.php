<?php

namespace App\Models\Carbon;

use Illuminate\Support\Facades\Http;

class CarbonClient
{
    public const USER_INFO_URL = 'http://84.237.50.63:8082/rest_api/v2/Users/';
    public const CALLER_INFO_URL = 'http://84.237.50.63:8082/rest_api/v2/Abonents/';
    public const CALLER_BLOCKING_INFO_URL = 'http://84.237.50.63:8082/rest_api/v2/AbonentsBlock/';
    public const FINANCE_OPERATION_INFO_URL = 'http://84.237.50.63:8082/rest_api/v2/FinanceOperations/';
    public const LOGIN_METHOD = 'web_cabinet.login';
    public const USER_INFO_METHOD = 'web_cabinet.user_info';
    public const GET_METHOD = 'objects.get';
    public const SET_METHOD = 'set';
    public const SAVE_METHOD = 'save';
    public const FILTER_METHOD = 'objects.filter';
    public const RESET_PASSWORD_METHOD = 'web_cabinet.reset_password';
    public const SUBMIT_PASSWORD_METHOD = 'web_cabinet.submit_password';

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

    public function changeBlocking(int $carbonCallerId, ?string $startDate, ?string $endDate): BlockingInfoDTO|bool
    {
        $response = Http::asForm()->post(
            self::CALLER_INFO_URL,
            [
                'method1' => self::GET_METHOD,
                'arg1' => json_encode([
                    'id' => $carbonCallerId
                ]),
                'method2' => self::SET_METHOD,
                'arg2' => json_encode([
                    'own_disabled_start' => $startDate,
                    'own_disabled_end' => $endDate,
                ]),
                'method3' => self::SAVE_METHOD,
                'arg3' => '{}'
            ]
        );

        if (isset($response->object()->error)) {
            return false;
        }

        return new BlockingInfoDTO($response->object()->result);
    }

    public function getLastFinanceOperation(int $carbonCallerId, string $startDate, string $endDate): bool|LastFinanceOperationDTO
    {
        $response = Http::asForm()->post(
            self::FINANCE_OPERATION_INFO_URL,
            [
                'method1' => self::FILTER_METHOD,
                'arg1' => json_encode([
                    'abonent_id' => $carbonCallerId,
                    'storno' => 0,
                    'op_date__range' => [$startDate, $endDate]
                ])
            ]
        );

        if (isset($response->object()->error)) {
            return false;
        }

        return new LastFinanceOperationDTO($response->object()->result[0]);
    }

    public function getRestoreCode(string $login)
    {
        $response = Http::asForm()->post(
            self::USER_INFO_URL,
            [
                'method1' => self::RESET_PASSWORD_METHOD,
                'arg1' => json_encode([
                    'login' => $login,
                    'base_url' => ''
                ])
            ]
        );

        $result = json_decode($response->object()->result[0]);

        if (isset($result->error)) {
            return false;
        }

        return $result;
    }

    public function submitRestoreCode(string $token, string $carbonCallerId, string $password)
    {
        $response = Http::asForm()->post(
            self::USER_INFO_URL,
            [
                'method1' => self::SUBMIT_PASSWORD_METHOD,
                'arg1' => json_encode([
                    'token' => $token,
                    'uid' => $carbonCallerId,
                    'psw1' => $password,
                    'psw2' => $password,
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


