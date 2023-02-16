<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\RateCollection;
use App\Http\Resources\Api\RateResource;
use App\Models\Api\Rate;
use App\Models\User;


class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): RateCollection
    {
        return new RateCollection(Rate::all());
    }

    public function getRateByUser(): RateResource
    {
        /** @var User $user */
        $user = auth()->user();
        return new RateResource($user->contract->rate);
    }

}
