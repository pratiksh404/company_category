<?php

namespace App\Http\Resources\Admin\Company;

use App\Http\Resources\Admin\Company\CompanyResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return CompanyResource::collection($this->collection);
    }
}
