<?php

namespace App\Contracts;

use App\Models\Admin\Company;
use App\Http\Requests\CompanyRequest;

interface CompanyRepositoryInterface
{
    public function indexCompany();

    public function createCompany();

    public function storeCompany(CompanyRequest $request);

    public function showCompany(Company $Company);

    public function editCompany(Company $Company);

    public function updateCompany(CompanyRequest $request, Company $Company);

    public function destroyCompany(Company $Company);
}
