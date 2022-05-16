<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Controllers\Controller;
use App\Contracts\CompanyRepositoryInterface;

class CompanyController extends Controller
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
        return view('admin.company.index', $this->companyRepositoryInterface->indexCompany());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create', $this->companyRepositoryInterface->createCompany());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $this->companyRepositoryInterface->storeCompany($request);
        return redirect(adminRedirectRoute('company'))->withSuccess('Company Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('admin.company.show', $this->companyRepositoryInterface->showCompany($company));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', $this->companyRepositoryInterface->editCompany($company));
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
        return redirect(adminRedirectRoute('company'))->withInfo('Company Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $this->companyRepositoryInterface->destroyCompany($company);
        return redirect(adminRedirectRoute('company'))->withFail('Company Deleted Successfully.');
    }
}
