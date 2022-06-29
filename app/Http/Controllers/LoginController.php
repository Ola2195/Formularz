<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Permission;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('/login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt(['login' => $request->login, 'password' => $request->password], $request->get('remember'))) {
            try{
                $isAdmin = auth()->user()->id;
                $is_admin = false;
                if($isAdmin == 1) {
                    $is_admin = true;
                }
                $request->session()->put('isadmin', $is_admin);
                return redirect()->intended('users/table');
            }
            catch(Exception $e) {
                return back()->with('failed', 'Invalid email or password.')
                    ->withInput($request->only('email'));
            }
        }

        return back()->with('failed', 'Invalid email or password.')
            ->withInput($request->only('email'));
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        return redirect('form');
    }

    // public function haslo() {
    //     $admin = new Admins;
    //     $admin->login = "admin1";
    //     $admin->password = Hash::make("zaq1@WSX");
    //     $admin->save();
    //     return redirect('users')->with('success', 'Admin is successfully saved');
    // }
}
