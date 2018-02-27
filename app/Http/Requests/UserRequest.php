<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class UserRequest extends FormRequest
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
        $request = Request::all();
        $rules = [];
        switch ($request['_action']) {
            case "crear" :
                $rules = [
                    'name' => 'required'
                    ,'email' => 'required|unique:users,email'
                    ,'password' => 'required'
                ];
                break;
            case "editar" :
                $rules = [
                    'name' => 'required'
                    ,'email' => 'required'
                    ,'role' => 'required'
                ];
                break;
        }
        return $rules;
    }
}
