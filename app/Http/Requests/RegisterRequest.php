<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:258',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|unique:users,mobile|digits:10',
            'password' => 'required|string|min:8',
        ];
    }

    /**
     * Get the custom error messages.
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'mobile.required' => 'Mobile is required!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 8 characters.',
            'email.unique' => 'The email has already been taken.',
            'mobile.unique' => 'The Mobile has already been taken.',
            'mobile.digits' => 'Mobile number must be exactly 10 digits.',
        ];
    }
}
