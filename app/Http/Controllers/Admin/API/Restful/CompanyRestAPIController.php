<?php

namespace App\Http\Controllers\Admin\API\Restful;

use App\Models\Admin\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Cache;
use App\Contracts\CompanyRepositoryInterface;
use App\Http\Resources\Admin\Company\CompanyCollection;
use App\Http\Resources\Admin\Company\CompanyResource;

class CompanyRestAPIController extends Controller
{

    protected $companyRepositoryInterface;

    public function __construct(CompanyRepositoryInterface $companyRepositoryInterface)
    {
        $this->companyRepositoryInterface = $companyRepositoryInterface;
        $this->authorizeResource(Company::class, 'company');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CompanyCollection(Company::with('category')->latest()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = $this->companyRepositoryInterface->storeCompany($request);
        return response()->json($company, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @param  \App\Models\Admin\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $this->companyRepositoryInterface->updateCompany($request, $company);
        return response()->json($company, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $deleted_item = $company;
        $company->delete();
        return response()->json($deleted_item, 200);
    }
}
