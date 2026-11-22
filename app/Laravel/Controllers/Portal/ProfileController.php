<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Models\User;
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Portal\UserAccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function details(PageRequest $request)
    {
        $user = Auth::guard('web')->user();

        $this->data['page_title'] = 'My Profile | AMS';
        $this->data['user'] = $user;

        return view('portal.profile.details', $this->data);
    }

    public function edit(PageRequest $request)
    {
        $user = Auth::guard('web')->user();

        $this->data['page_title'] = 'Edit Profile | AMS';
        $this->data['user'] = $user;

        return view('portal.profile.edit', $this->data);
    }

    public function update(UserAccountRequest $request)
    {
        $user = Auth::guard('web')->user();

        DB::transaction(function () use ($request, $user) {

            $user->first_name = strtoupper($request->input('first_name'));
            $user->last_name = strtoupper($request->input('last_name'));
            $user->email = strtolower($request->input('email'));

            if ($request->filled('new_password')) {
                $user->password = Hash::make(
                    $request->input('new_password')
                );
            }

            $user->save();
        });

        return redirect()
            ->route('portal.profile.details')
            ->with('notification-status', 'success')
            ->with('notification-msg', 'Profile successfully updated.');
    }
}