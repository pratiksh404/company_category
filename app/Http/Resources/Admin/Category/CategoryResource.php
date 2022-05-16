<?php

namespace App\Http\Resources\Admin\Category;

use App\Http\Resources\Admin\Company\CompanyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'categories',
            'id' => (string) $this->id,
            'attributes' => parent::toArray($request),
            'relationship' => [
                'companies' => CompanyResource::collection($this->companies),
            ],
            'links' => [
                'self' => adminShowRoute('category', $this->id),
            ],
        ];
    }
}
