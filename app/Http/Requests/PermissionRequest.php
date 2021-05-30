<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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

        if ($this->input('permission_type') == 'basic') {
            $roles = [
                'display_name' => 'required|max:255',
                'name' => 'required|max:255|alphadash|unique:permissions,name',
                'description' => 'sometimes|max:255',

            ];
        } else if ($this->input('permission_type') == 'crud') {
            $roles = [
                'resource' => 'required|min:3|max:100|alpha'

            ];
        } else {
            $roles = [
                'display_name' => 'required|max:255',
                'description' => 'sometimes|max:255',
            ];
        }

        return $roles;
    }
}
