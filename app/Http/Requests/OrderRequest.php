<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'=> 'required|integer'
            // 'product_id' => 'required|array',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'user_id.required' => 'The user_id field is required',
    //         // 'product_id.required' => 'The product_id field is required'
    //     ];
    // }
}
