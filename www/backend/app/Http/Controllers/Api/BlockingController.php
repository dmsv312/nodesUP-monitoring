<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BlockingResource;
use App\Models\Api\Blocking;
use App\Models\User;
use Exception;

class BlockingController extends Controller
{
    /**
     * Show Blocking for current user.
     */
    public function index(): BlockingResource
    {
        /** @var User $user */
        $user = auth()->user();
        return new BlockingResource($user->contract->blocking);
    }

    /**
     * Update specified Blocking - true/false.
     *
     * @param Blocking $blocking
     * @return BlockingResource
     * @throws Exception
     */
    public function update(Blocking $blocking): BlockingResource
    {
        //TODO - throw exception on save and add failed response
        if (!$blocking->changeBlocking()) {
            throw new Exception('Exception if something failed in Carbon');
        }
        return new BlockingResource($blocking);
    }
}
