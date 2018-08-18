<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserFormRequest extends FormRequest
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
     * Prepare request for validation
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'permission' =>  $this->input('permission') === 'true' ? true : false,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [
            'name'          =>  'required|string',
            'email'         =>  'required|email|unique:users,email,' . $this->route()->id,
            'permission'    =>  'required|boolean',
            'password'      =>  'nullable|confirmed|min:6',
        ];
    }
}
