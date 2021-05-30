<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarDetailsRequest extends FormRequest
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
            'car_id'=>'required|exists:models,id',
            'manufactured' => 'required|numeric|max:2022|min:1950',
            'seat' => 'required|numeric|max:10|min:1',
            'registration_type' => 'required|numeric',
            'engine_capacity' => 'required|numeric',
            'fuel_type' => 'required|string|in:Soler,petrol',
            'transmission' => 'required|string|in:normal,automatic',
            'color' => 'required|string',
            'current-mileage' => 'required|numeric',
        ];
    }
}
