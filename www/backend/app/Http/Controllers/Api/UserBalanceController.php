<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BalanceResource;
use App\Models\User;

class UserBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): BalanceResource
    {
        /** @var User $user */
        $user = auth()->user();

        return new BalanceResource($user->contract->balance);
    }
}
