<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Admin;
use App\Laravel\Requests\PageRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Laravel\Requests\Backoffice\LoginRequest;
use App\Laravel\Requests\Backoffice\RegisterRequest;

use DB;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        //
    }

    public function login(PageRequest $request){
        $this->data['page_title'] = 'Login | AMS';
        return view('backoffice.auth.login', $this->data);
    }

    public function register(PageRequest $request){
        $this->data['page_title'] = 'Register | AMS';
        return view('backoffice.auth.register', $this->data);
    }

    public function forgot_password(PageRequest $request){
        $this->data['page_title'] = 'Forgot-Password | AMS';
        return view('backoffice.auth.forgot_password', $this->data);
    }

    public function store(RegisterRequest $request){
        DB::beginTransaction();

        try {

            $user = new Admin();
            $user->first_name = strtoupper($request->input('first_name'));
            $user->last_name = strtoupper($request->input('last_name'));
            $user->email = strtolower($request->input('email'));
            $user->password = $request->input('password');
            $user->save();

            DB::commit();

            session()->flash('notification-status', 'success');
            session()->flash('notification-msg', 'Successfully registered. Please login to continue!');

            return redirect()->route('backoffice.auth.login');

        } catch (\Exception $e) {

            DB::rollback();

            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', 'Server error. Please try again later.');

            return redirect()->back()->withInput();
        }
    }


    public function authenticate(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        if (!auth('admin')->attempt($credentials, $request->boolean('remember'))) {

            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Invalid credentials. Please try again!'
                ]);

        }

        $request->session()->regenerate();

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'Successfully logged in. Welcome!');

        return redirect()->route('backoffice.dashboard');
    }

    public function logout(Request $request){
        auth('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'You have successfully logged out.');

        return redirect()->route('backoffice.auth.login');
    }
}
