<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'proName' => 'required|string'
            // 'unit_price'=>'required',
        ];
    }

    public function messages() {
        return [
            'proName.required' => 'Tên sp không được để trống!',
            // 'uni_price.required' => 'giá sp không được để trống!',
            
        ];
    }
}
