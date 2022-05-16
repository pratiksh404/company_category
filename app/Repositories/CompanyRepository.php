<?php

namespace App\Repositories;

use App\Models\Admin\Company;
use App\Models\Admin\Category;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use App\Contracts\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    // Company Index
    public function indexCompany()
    {
        $companies = config('adminetic.caching', true)
            ? (Cache::has('companies') ? Cache::get('companies') : Cache::rememberForever('companies', function () {
                return Company::latest()->get();
            }))
            : Company::latest()->get();
        return compact('companies');
    }

    // Company Create
    public function createCompany()
    {
        $categories = Cache::get('categories', Category::latest()->get());
        return compact('categories');
    }

    // Company Store
    public function storeCompany(CompanyRequest $request)
    {
        $company = Company::create($request->validated());
        $this->uploadImage($company);
    }

    // Company Show
    public function showCompany(Company $company)
    {
        return compact('company');
    }

    // Company Edit
    public function editCompany(Company $company)
    {
        $categories = Cache::get('categories', Category::latest()->get());
        return compact('company', 'categories');
    }

    // Company Update
    public function updateCompany(CompanyRequest $request, Company $company)
    {
        $company->update($request->validated());
        $this->uploadImage($company);
    }

    // Company Destroy
    public function destroyCompany(Company $company)
    {
        isset($company->image) ? deleteImage($company->image) : '';
        $company->delete();
    }

    // Image Upload
    protected function uploadImage(Company $company)
    {
        if (request()->has('image')) {
            $company->update([
                'image' => request()->image->store('website/company', 'public'),
            ]);
            $image = Image::make(request()->file('image')->getRealPath());
            $image->save(public_path('storage/' . $company->getRawOriginal('image')));
        }
    }
}
