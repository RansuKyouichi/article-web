<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Requests\PageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function details(PageRequest $request)
    {
        $this->data['page_title'] = 'My Profile | AMS';
        $this->data['user'] = Auth::user();

        return view('portal.profile.details', $this->data);
    }

    public function edit(PageRequest $request)
    {
        $this->data['page_title'] = 'Edit Profile | AMS';
        $this->data['user'] = Auth::user();

        return view('portal.profile.edit', $this->data);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => strtolower($validated['email']),
        ]);

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'Your profile has been updated.');

        return redirect()->route('portal.profile.details');
    }
}