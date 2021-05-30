<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            /* Basic Inforamtion */
            'name' => 'required|string|max:200',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:models,id',

        ];
    }

    public function messages()
    {
        return [];
    }
}
