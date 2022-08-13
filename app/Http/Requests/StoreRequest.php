<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required | max:100',
            'body' => 'required | max:100',
            'enabled' => 'required | max:100',
            'image' => 'required | image | mimes:jpeg,png,jpg,gif,svg | max:2048',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.max' => 'Title must be less than 100 characters',
            'body.required' => 'Body is required',
            'enabled.required' => 'Enabled is required',
            'image.required' => 'Image is required',
            'image.image' => 'Image is not valid',
            'image.mimes' => 'Image is not valid',
            'image.max' => 'Image is not valid',
        ];
    }
}
