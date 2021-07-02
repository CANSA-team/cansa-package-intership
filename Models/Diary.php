<?php

namespace Cansa\Intership\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    //tên bảng
    protected $table = 'diaries';
    
    //khóa chính
    protected $primaryKey = 'diary_id';

    //các cột được phép thay đổi
    protected $fillable = [
        'diary_name', 
        'user_id',
        'status',
    ];

    //lấy tất cả diary (chưa join)
    static function getDiaries(){
        
        return Diary::all();
    }
    
    //lấy 1 diary theo id (id lấy từ request,chưa join)
    static function getDiaryById($id){
        return Diary::find($id);
    }

    //thêm 1 diary ($request lấy từ Request $request)
    static function insertDiary($request){
        return Diary::create([
            'diary_name' => $request->diary_name,
            'user_id' => session()->get('user_detail')->user_id,
            'status' => 1,
        ]);
    }

    //cập nhật, chỉnh sửa 1 diary ($request lấy từ Request $request)
    static function updateDiary($request){
        $diary = Diary::getDiaryById($request->diary_id);
        $diary->diary_name = $request->diary_name;
        $diary->user_id = session()->get('user_detail')->user_id;
        $diary->status = 1;
        $diary->save();
    }

    //xóa 1 diary ($request lấy từ Request $request,bao gồm weeks, diaries_contents, comments có liên quan)
    static function deleteDiary($request){
        $diary = Diary::getDiaryById($request->diary_id);
        $diary->delete();
    }

    //lấy week liên quan đến diary
    public function weeks()
    {
        return $this->hasMany(Week::class, 'diary_id', 'diary_id');
    }

    //lấy user liên quan đến diary
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
