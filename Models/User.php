<?php

namespace Cansa\Intership\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    //tên bảng
    protected $table = 'users';

    //khóa chính
    protected $primaryKey = 'user_id';

    //các cột được phép thay đổi
    protected $fillable = [
        'user_name',
        'user_email',
        'usertype_id',
        'status',
        'group_id',
        'user_password',
        'faculty_id'
    ];

    public function getAuthPassword()
    {
        return $this->user_password;
    }

    //lấy tất cả user (chưa join)
    static function getUsers()
    {
        return User::all();
    }

    //lấy 1 user theo id (id lấy từ request,chưa join)
    static function getUserById($id)
    {
        return User::find($id);
    }

    //thêm 1 user ($request lấy từ Request $request)
    static function insertUser($request)
    {
        return User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'usertype_id' => 4,
            'user_password' => bcrypt($request->password),
            'faculty_id' => 1,
            'group_id' => 1,
            'status' => 1,
        ]);
    }

    //cập nhật, chỉnh sửa 1 user ($request lấy từ Request $request)
    static function updateUser($request)
    {
        $user = User::getUserById($request->user_id);
        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->usertype_id = $request->usertype_id;
        $user->status = $request->status;
        $user->user_password = $request->user_password;
        $user->faculty_id = $request->faculty_id;
        $user->save();
    }

    //xóa 1 user ($request lấy từ Request $request)
    static function deleteUser($request)
    {
        $user = User::getUserById($request->user_id);

        $diaries = $user->diaries();
        foreach ($diaries as $diary) {
            $weeks = $diary->weeks();
            foreach ($weeks as $week) {
                $diaries_contents = $week->diaries();
                foreach ($diaries_contents as $diary_content) {
                    $comments = $diary_content->comments();
                    foreach ($comments as $comment) {
                        $comment->delete();
                    }
                    $diaries_contents->delete();
                }
                $week->delete();
            }
            $diary->delete();
        }
        $user->delete();
    }

    //lấy diaries liên quan đến user
    public function diaries()
    {
        return $this->hasMany(Diary::class, 'user_id', 'user_id');
    }

    //lấy user_type liên quan đến user
    public function userType()
    {
        return $this->hasOne(UserType::class, 'usertype_id', 'usertype_id');
    }

    //đăng nhập
    public static function login($request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['user_email' => $credentials['email'], 'password' => $credentials['password']])) {
            $user = Auth::getUser();
            $userType = UserType::getUserTypeById($user->usertype_id);
            $request->session()->put('user_detail', $user);
            $request->session()->put('user_type', $userType);
            return redirect()->route('profile');
        }

        return view('package-intership::auth.login');
    }

    //đăng xuất
    public static function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login.form');
    }

    //đăng ký
    public static function regist($request)
    {
        if (!session()->has('user_detail')) {
            if ($request->password == $request->password_repeat) {
                $request->validate([
                    'user_name' => 'required',
                    'user_email' => 'required',
                    'password' => 'required',
                ]);

                User::insertUser($request);
                return redirect()->route('profile');
            }
        }
    }
}
