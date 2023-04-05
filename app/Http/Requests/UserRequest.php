<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    protected $id;
    public function __construct(Request $request)
    {
        $this->id =  $request->route()->user;
    }

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email,' . $this->request->get('id'),
            'password' => 'bail|required_without:id',
        ];
        return $rules;
    }

    public function messages()
    {
        return[
            'password.required_without'=>'The password field is required.'
        ];
    }
}
