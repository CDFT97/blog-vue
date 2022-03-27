<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            //Ignora el email actual del usuario en cuestion que se esta editando
            'email' => [
                'required',
                 Rule::unique('users')->ignore($this->route('user')->id)
            ],
        ];
        //Si el campo password esta lleno se agrega al array de validaciones
        if($this->filled('password')):
            $rules['password'] = ['confirmed','min:6'];
        endif;

        return $rules;
    }
}
