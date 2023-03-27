<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PromisePayResource;
use App\Models\Api\PromisePay;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class PromisePayController extends Controller
{
    /**
     * Show Blocking for current user.
     */
    public function index(): PromisePayResource
    {
        /** @var User $user */
        $user = auth()->user();
        return new PromisePayResource($user->contract->promisePay);
    }

    /**
     * @param PromisePay $promisePay
     * @return Application|ResponseFactory|Response
     */
    public function update(PromisePay $promisePay): Response|Application|ResponseFactory
    {
        $result = $promisePay->addPromisePay();

        if (!$result) {
            return response(
                ['error' => 'Cant add promise pay'],
                500
            );
        }
        return response(
            ['result' => $result],
            200
        );
    }
}
