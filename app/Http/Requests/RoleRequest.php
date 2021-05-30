<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'display_name' => 'required|max:255',
                    'name' => 'required|max:255|alphadash|unique:permissions,name',
                    'description' => 'sometimes|max:255',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'display_name' => 'required|max:255',
                    'description' => 'sometimes|max:255',
                ];
            }
            default:break;
        }
    }
}
