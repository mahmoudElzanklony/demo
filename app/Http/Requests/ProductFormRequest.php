<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'properties'=>'required|array',
            'properties.*.id' => 'filled|integer|exists:product_properties,id',
            'properties.*.name' => 'required|string',
            'properties.*.answer' => 'required|string',
            'wholesale'=>'required|array',
            'wholesale.*.id' => 'filled|integer|exists:product_wholesales,id',
            'wholesale.*.quantity' => 'required|integer|min:1',
            'wholesale.*.price' => 'required|integer|min:1',
        ];
    }
}
