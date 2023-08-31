<?php

namespace Ayat\Crud\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // return [
        //     'entry_by' => 'regex:/^[a-zA-Z0-9 ]+$/',
        //     'name' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:255',
        //     'phone' => 'required|regex:/^[0-9]+$/|max:10',
        //     'email' => 'required|email|max:50'
        // ];

        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ];
    }



    public function messages()
    {
        return [
            'name.required' => 'The Buyer is required and cannot be empty.',
            'name.regex' => 'The Buyer allows only text, spaces and numbers, not more than 20 characters.',
            'name.max' => 'The Buyer allows not more than 20 characters.',

            'phone.required' => 'The Phone is required and cannot be empty. only numbers, and 880 will be automatically prepended.',
            'phone.regex' => 'The Phone allows only numbers, not more than 10 characters. only numbers, and 880 will be automatically prepended.',
            'phone.max' => 'The Phone allows not more than 10 characters. only numbers, and 880 will be automatically prepended.',

            'email.required' => 'The Email is required and cannot be empty.',
            'email.regex' => 'The Email allows only valid email address, not more than 50 characters.',
            'email.max' => 'The Email allows not more than 50 characters.',
        ];
    }
}
