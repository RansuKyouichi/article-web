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

        $this->data['page_title'] = 'My Profile | AMS User Portal';
        $this->data['user'] = $user;

        return view('portal.profile.details', $this->data);
    }

    public function edit(PageRequest $request)
    {
        $user = Auth::guard('web')->user();

        $this->data['page_title'] = 'Edit Profile | AMS User Portal';
        $this->data['user'] = $user;

        return view('portal.profile.edit', $this->data);
    }

    public function update(UserAccountRequest $request)
    {
        DB::beginTransaction();

        try {

            $user = auth('web')->user();

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

            return redirect()->route('portal.profile.details');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', 'Unable to update account. Please try again.');

            return redirect()->back()->withInput();
        }
    }
}