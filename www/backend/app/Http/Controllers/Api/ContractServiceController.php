<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContractServiceRequest;
use App\Http\Resources\Api\ContractServiceCollection;
use App\Http\Resources\Api\ContractServiceResource;
use App\Http\Resources\Api\ServiceCollection;
use App\Models\Api\ContractService;
use App\Models\User;
use Illuminate\Http\Request;

class ContractServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ServiceCollection
     */
    public function index(): ContractServiceCollection
    {
        /** @var User $user */
        $user = auth()->user();

        return new ContractServiceCollection(
            ContractService::from('contract_service')
                ->where('contract_id', $user->contract->id)
                ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param ContractServiceRequest $request
     * @param int $id
     * @return ContractServiceResource
     */
    public function update(ContractServiceRequest $request, int $id): ContractServiceResource
    {
        $data = $request->validated();

        /** @var User $user */
        $user = auth()->user();

        \DB::table('contract_service')
            ->where('id', $id)
            ->where('contract_id', $user->contract->id)
            ->update(['status' => $data['isActive'] ? 1 : 0]);

        $contractService = ContractService::from('contract_service')
            ->where('id', $id)
            ->where('contract_id', $user->contract->id)
            ->first();

        return new ContractServiceResource($contractService);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
