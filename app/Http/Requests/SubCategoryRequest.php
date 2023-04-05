<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'name' => 'required|max:255|string',
            'prompt' => 'required|string',
            'long_form_prompt' => 'required_if:is_long_form,1',
            'image' => 'file|mimes:png,jpg',
            'category_id' => 'required|integer',
            'items.types.*' => 'required',
            'items.labels.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'long_form_prompt.required_if' => 'The long form prompt field is required.',
            'category_id.required' => 'The category field is required.',
            'items.types.*.required' => 'This type is required.',
            'items.labels.*.required' => 'This label is required.',
        ];
    }
}
