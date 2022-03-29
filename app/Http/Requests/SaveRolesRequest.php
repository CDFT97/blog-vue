<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
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

        //Validacion por defecto
        $rules = [
            'display_name' => 'required'
        ];

        if($this->method() !== 'PUT'):
            $rules['name'] = 'required|unique:roles';
        endif;

        return $rules;
    }

    public function messages()
    {
        return [
                'display_name.required' => 'The name field is required.',
                'display_name.unique' => 'The name has already been taken.',
                'name.required' => 'The identifier field is required.',
                'name.unique' => 'The identifier has already been taken.',
            ];
    }
}
