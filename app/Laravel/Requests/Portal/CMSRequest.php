<?php

namespace App\Laravel\Requests\Portal;

use App\Laravel\Requests\RequestManager;

class CMSRequest extends RequestManager
{
    public function rules()
    {
        return [
            'code' => 'required|in:home,about,contact,articles',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Page code is required.',
            'code.in' => 'Invalid page code.',

            'title.required' => 'Page title is required.',
            'title.string' => 'Page title must be a string.',
            'title.max' => 'Page title must not exceed 255 characters.',

            'content.string' => 'Page content must be a string.',
        ];
    }
}