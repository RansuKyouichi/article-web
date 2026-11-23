<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\User;

use App\Laravel\Requests\PageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Laravel\Requests\Backoffice\UserAccountRequest;

use DB;

class UserAccountController extends Controller
{

    public function lists(PageRequest $request)
    {
        $this->data['page_title'] = 'User Management | AMS Admin Portal';
        $this->data['records'] = User::paginate(10);

        return view('backoffice.user_management.lists', $this->data);
    }

    public function create(PageRequest $request){

        $this->data['page_title'] = 'Create Account | AMS Admin Portal';

        return view('backoffice.user_management.create', $this->data);
    }


    public function show(PageRequest $request, $id)
    {
        $this->data['page_title'] = 'User Details | AMS Admin Portal';
        $this->data['record'] = User::findOrFail($id);

        return view('backoffice.user_management.show', $this->data);
    }


    public function edit(PageRequest $request, $id)
    {
        $this->data['page_title'] = 'Edit User | AMS Admin Portal';
        $this->data['record'] = User::findOrFail($id);

        return view('backoffice.user_management.edit', $this->data);
    }
    
    public function store(UserAccountRequest $request)
    {

        DB::beginTransaction();

        try {

            $user = new User();
            $user->first_name = strtoupper($request->input('first_name'));
            $user->last_name = strtoupper($request->input('last_name'));
            $user->email = strtolower($request->input('email'));

            if ($request->filled('password')) {
                $user->password = bcrypt($request->input('password'));
            }
            
            $user->save();

            DB::commit();

            session()->flash('notification-status', 'success');
            session()->flash('notification-msg', 'User account successfully created.');

            return redirect()->route('backoffice.users.lists');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', 'Unable to create user account. Please try again.');

            return redirect()->back()->withInput();
        }
    }

    public function update(UserAccountRequest $request, $id)
    {

        DB::beginTransaction();

        try {

            $user = User::findOrFail($id);

            $user->first_name = strtoupper($request->input('first_name'));
            $user->last_name = strtoupper($request->input('last_name'));
            $user->email = strtolower($request->input('email'));

            if ($request->filled('password')) {
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();

            DB::commit();

            session()->flash('notification-status', 'success');
            session()->flash('notification-msg', 'User account successfully updated.');

            return redirect()->route('backoffice.users.lists');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', 'Unable to update user account. Please try again.');

            return redirect()->back()->withInput();
        }
    }

    public function destroy(PageRequest $request, $id)
    {
        DB::beginTransaction();

        try {

            $user = User::findOrFail($id);
            $user->delete();

            DB::commit();

            session()->flash('notification-status', 'success');
            session()->flash('notification-msg', 'User account successfully deleted.');

            return redirect()->route('backoffice.users.lists');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', 'Unable to delete user account. Please try again.');

            return redirect()->back();
        }
    }
}