<?php

namespace Cansa\Intership\Models;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    //tên bảng
    protected $table = 'user_types';
    
    //khóa chính
    protected $primaryKey = 'usertype_id';
    
    //định dạng ngày tháng
    protected $dateFormat = 'd-m-Y';

    //các cột được phép thay đổi
    protected $fillable = [
        'usertype_name', 
        'status',
    ];

    //lấy tất cả user_type (chưa join)
    static function getUserTypes(){
        
        return UserType::all();
    }
    
    //lấy 1 user_type theo id (id lấy từ request,chưa join)
    static function getUserTypeById($id){
        return UserType::find($id);
    }

    //thêm 1 user_type ($request lấy từ Request $request)
    static function insertUserType($request){
        $user_type = new UserType();
        $user_type->usertype_name = $request->usertype_name;
        $user_type->status = $request->status;
        $user_type->save();
    }

    //cập nhật, chỉnh sửa 1 user_type ($request lấy từ Request $request)
    static function updateUserType($request){
        $user_type = UserType::getUserTypeById($request->usertype_id);
        $user_type->usertype_name = $request->usertype_name;
        $user_type->status = $request->status;
        $user_type->save();
    }

    //xóa 1 user_type ($request lấy từ Request $request,bao gồm weeks, diaries_contents, comments có liên quan)
    static function deleteUserType($request){
        $user_type = UserType::getUserTypeById($request->usertype_id);
        $user_type->delete();
    }

    //lấy users liên quan đến user_type
    public function users()
    {
        return $this->hasMany(User::class, 'usertype_id', 'usertype_id');
    }
}
