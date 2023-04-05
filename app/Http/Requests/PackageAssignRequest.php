<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageAssignRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'package_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'package_id.required' => 'The package field is required.'
        ];
    }
}
