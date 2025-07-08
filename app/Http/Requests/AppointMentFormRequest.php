<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointMentFormRequest extends FormRequest
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
            'info'=>'required|string',
            'room_type'=>'required|string',
            'transfer_type'=>'required',
            'date'=>'required',
            'payment_type'=>'required',
        ];
    }
}
