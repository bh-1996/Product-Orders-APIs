<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateOrderRequest extends FormRequest
{
    public function authorize()
    {
        // dd('Authorize method reached'); // Debugging line
        return true;
    }

    public function rules()
    {
        // dd('Rules method reached'); // Debugging line
        return [
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // dd('Validation failed'); // Debugging line
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422));
    }
}
