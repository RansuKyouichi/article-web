<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Backoffice\AdminAccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function details(PageRequest $request)
    {
        $admin = Auth::guard('admin')->user();

        $this->data['page_title'] = 'My Profile | AMS';
        $this->data['admin'] = $admin;
        $this->data['user'] = $admin;

        return view('backoffice.profile.details', $this->data);
    }

    public function edit(PageRequest $request)
    {
        $admin = Auth::guard('admin')->user();

        $this->data['page_title'] = 'Edit Profile | AMS';
        $this->data['admin'] = $admin;
        $this->data['user'] = $admin;

        return view('backoffice.profile.edit', $this->data);
    }

    public function update(AdminAccountRequest $request)
    {
        $admin = Auth::guard('admin')->user();

        DB::transaction(function () use ($request, $admin) {

            $admin->first_name = strtoupper($request->input('first_name'));
            $admin->last_name = strtoupper($request->input('last_name'));
            $admin->email = strtolower($request->input('email'));

            if ($request->filled('new_password')) {
                $admin->password = Hash::make(
                    $request->input('new_password')
                );
            }

            $admin->save();
        });

        return redirect()
            ->route('backoffice.profile.details')
            ->with('notification-status', 'success')
            ->with('notification-msg', 'Administrator profile successfully updated.');
    }
}