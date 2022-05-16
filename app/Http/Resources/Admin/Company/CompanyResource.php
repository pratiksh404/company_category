<?php

namespace App\Http\Resources\Admin\Company;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Category\CategoryResource;

class CompanyResource extends JsonResource
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
            'type' => 'companies',
            'id' => (string) $this->id,
            'attributes' => parent::toArray($request),
            'relationship' => [
                'category' => $this->category,
            ],
            'links' => [
                'self' => adminShowRoute('company', $this->id),
            ],
        ];
    }
}
