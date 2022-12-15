<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\RateCollection;
use App\Models\Api\Rate;


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

}
