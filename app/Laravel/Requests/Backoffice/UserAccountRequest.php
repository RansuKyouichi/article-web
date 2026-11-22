<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;

use Illuminate\Validation\Rule;

class UserAccountRequest extends RequestManager
{
    public function rules()
    {

        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->route('user')),
            ],
        ];

        if ($this->isMethod('POST')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        } else {
            $rules['password'] = 'nullable|string|min:8|confirmed';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required.',
            'last_name.required' => 'Last Name is required.',

            'email.required' => 'Email Address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',

            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ];
    }
}
