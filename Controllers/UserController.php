<?php

namespace Cansa\Intership\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cansa\Intership\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $data = array();
    public $weeks;
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('package-intership::auth.login');
    }

    //đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
         $credentials = $request->only('email', 'password');
        if (Auth::attempt(['user_email' => $credentials['email'], 'password' => $credentials['password']])) {
            return redirect()->route('profile');
        }
        return back()->withErrors(['status' => ['Email or password does not match']]);
    }

    //chuyển đến form đăng ký
    public function registration()
    {
        return view('package-intership::auth.register');
    }

    //hiển thị thông tin tài khoản
    public function profile()
    {
        return view('package-intership::auth.profile');
    }

    //đăng xuất
    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login.form');
    }

    //đăng ký user
    public function regist(Request $request)
    {
        $request->validate([
            'user_name' => 'required|min:1',
            'user_email' => 'required|email|unique:users,user_email',
            'password' => 'required|max:24|min:6',
            'password_repeat' => 'required_with:password|same:password|max:24|min:6'
        ]);
        return User::regist($request);
    }
}
