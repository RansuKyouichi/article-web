<?php

namespace App\Laravel\Requests\Portal;

use App\Laravel\Requests\RequestManager;

class LoginRequest extends RequestManager
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email Address is required.',
            'email.email' => 'Please enter a valid email address.',

            'password.required' => 'Password is required.',
        ];
    }
}