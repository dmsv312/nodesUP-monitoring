<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserProfileResource;
use App\Models\User;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UserProfileResource
     */
    public function index(): UserProfileResource
    {
        /** @var User $user */
        $user = auth()->user();
        return new UserProfileResource($user->userProfile);
    }

}
