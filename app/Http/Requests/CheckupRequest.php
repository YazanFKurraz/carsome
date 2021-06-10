<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class CheckupRequest extends FormRequest
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
            'external' => 'required|numeric|max:5|min:1',
            'wheels' => 'required|numeric|max:5|min:1',
            'engine' => 'required|numeric|max:5|min:1',
            'internal' => 'required|numeric|max:5|min:1'
        ];
    }
}
