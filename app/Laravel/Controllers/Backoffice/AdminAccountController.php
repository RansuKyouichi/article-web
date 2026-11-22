<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Admin;
use App\Laravel\Requests\PageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Laravel\Requests\Backoffice\AdminAccountRequest;

use DB;

class AdminAccountController extends Controller
{

    public function lists(PageRequest $request)
    {
        $this->data['page_title'] = 'Admin Management';
        $this->data['records'] = Admin::paginate(10);

        return view('backoffice.admin_management.lists', $this->data);
    }

    public function show(PageRequest $request, $id)
    {
        $this->data['page_title'] = 'User Details | AMS';
        $this->data['record'] = Admin::findOrFail($id);

        return view('backoffice.admin_management.show', $this->data);
    }

    public function edit(PageRequest $request, $id)
    {
        $this->data['page_title'] = 'Edit User | AMS';
        $this->data['record'] = Admin::findOrFail($id);

        return view('backoffice.admin_management.edit', $this->data);
    }

    public function update(AdminAccountRequest $request, $id)
    {

        DB::beginTransaction();

        try {

            $admin = Admin::findOrFail($id);

            $admin->first_name = strtoupper($request->input('first_name'));
            $admin->last_name = strtoupper($request->input('last_name'));
            $admin->email = strtolower($request->input('email'));

            if ($request->filled('password')) {
                $admin->password = bcrypt($request->input('password'));
            }

            $admin->save();

            DB::commit();

            session()->flash('notification-status', 'success');
            session()->flash('notification-msg', 'Admin account successfully updated.');

            return redirect()->route('backoffice.admin_management.lists');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', 'Unable to update admin account. Please try again.');

            return redirect()->back()->withInput();
        }
    }

    public function destroy(PageRequest $request, $id)
    {
        DB::beginTransaction();

        try {

            $admin = Admin::findOrFail($id);
            $admin->delete();

            DB::commit();

            session()->flash('notification-status', 'success');
            session()->flash('notification-msg', 'Admin account successfully deleted.');

            return redirect()->route('backoffice.admins.lists');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', 'Unable to delete admin account. Please try again.');

            return redirect()->back();
        }
    }
}