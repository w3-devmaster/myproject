<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AuthRequest;
use App\Http\Requests\Admin\RegisterRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        if(!Auth::guard('admins')->check()){

            return redirect()->route('admin.login-form');
        }

        return view('admin.index');
    }

    public function register_form() {
        return view('admin.register');
    }

    public function register(RegisterRequest $request){
        $request->merge([
            'password' => Hash::make($request->pass),
        ]);

        $admin = Admin::create($request->all());

        return redirect()->back()->with('message','เพิ่ม Admin : ' . $admin->name . ' เสร็จสิ้น');
    }

    public function login_form() {
        return view('admin.login');
    }

    public function auth(AuthRequest $request) {
        $creds = $request->only(['username','password']);

        if(!Auth::guard('admins')->attempt($creds)){
            return redirect()->back()->with('message','เข้าสู่ระบบล้มเหลว');
        }

        return redirect()->route('admin.index');
    }

    public function logout(){

        Auth::guard('admins')->logout();

        return redirect()->route('admin.login-form');
    }
}
