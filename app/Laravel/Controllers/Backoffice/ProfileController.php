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
        DB::beginTransaction();

        try {

            $user = auth('admin')->user();

            $user->first_name = strtoupper($request->input('first_name'));
            $user->last_name = strtoupper($request->input('last_name'));
            $user->email = strtolower($request->input('email'));

            if ($request->filled('password')) {
                $user->password = Hash::make(
                    $request->input('password')
                );
            }

            $user->save();

            DB::commit();

            session()->flash('notification-status', 'success');
            session()->flash('notification-msg', 'Profile updated successfully.');

            return redirect()->route('backoffice.profile.details');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', 'Unable to update account. Please try again.');

            return redirect()->back()->withInput();
        }
    }
}