<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyRequest;
use App\Http\Resources\Api\CompanyCollection;
use App\Http\Resources\Api\CompanyResource;
use App\Models\Api\Company;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): CompanyCollection
    {
        return new CompanyCollection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyRequest $request
     * @return CompanyResource
     */
    public function store(CompanyRequest $request): CompanyResource
    {
        $company = Company::create($request->validated());

        return new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return CompanyResource
     */
    public function show(Company $company): CompanyResource
    {
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyRequest $request
     * @param Company $company
     * @return CompanyResource
     */
    public function update(CompanyRequest $request, Company $company): CompanyResource
    {
        $company->update($request->validated());
        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return Response
     */
    public function destroy(Company $company): Response
    {
        $company->delete();
        return response()->noContent();
    }
}
