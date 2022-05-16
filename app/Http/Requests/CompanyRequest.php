<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:3000',
            'description' => 'nullable|string|max:3000',
            'status' => 'sometimes|boolean',
        ];
    }
}
