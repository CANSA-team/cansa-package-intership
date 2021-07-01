<?php

namespace Cansa\Intership\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    //tên bảng
    protected $table = 'users';

    //khóa chính
    protected $primaryKey = 'user_id';

    //định dạng ngày tháng
    protected $dateFormat = 'd-m-Y';

    //các cột được phép thay đổi
    protected $fillable = [
        'user_name',
        'user_email',
        'usertype_id',
        'status',
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
        $user = new User();
        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->usertype_id = $request->usertype_id;
        $user->status = $request->status;
        $user->user_password = Hash::make($request->user_password);
        $user->faculty_id = $request->faculty_id;
        $user->save();
    }

    //cập nhật, chỉnh sửa 1 user ($request lấy từ Request $request)
    static function updateUser($request)
    {
        $user = User::getUserById($request->user_id);
        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->usertype_id = $request->usertype_id;
        $user->status = $request->status;
        $user->user_password = Hash::make($request->user_password);
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
}
