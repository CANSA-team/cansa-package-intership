<?php namespace Cansa\Intership\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL,
    Route,
    Redirect;
use Foostart\Sample\Models\Samples;
use Cansa\Intership\Models\Users;
use Cansa\Intership\Models\UserType;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $data = array();
    public $weeks;
    public function __construct() {
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->flush();
        return view('package-intership::auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['user_email'=>$credentials['email'],'password'=>$credentials['password']])) {
            $user = Auth::getUser();
            $userType = UserType::getUserTypeById($user->usertype_id);
            $request->session()->put('user_detail', $user);
            $request->session()->put('user_type', $userType);
            return redirect()->route('profile');
        }
  
        return view('package-intership::auth.login');
    }

    public function registration()
    {
        return view('package-intership::auth.register');
    }

    public function profile()
    {
        return view('package-intership::admin.profile');
    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect()->route('login.form');
    }
}