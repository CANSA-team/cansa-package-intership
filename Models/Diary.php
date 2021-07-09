<?php

namespace Cansa\Intership\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    static function getDiaries()
    {
        switch (Auth::user()->userType->usertype_name) {
            case 'Student':
                $user_id = Auth::user()->user_id;
                $diaries = Diary::where('user_id', $user_id)->orderBy('diary_id', 'DESC')->paginate(10);
                break;
            default:
                $diaries = Diary::orderBy('diary_id', 'DESC')->paginate(10);
                break;
        }
        return $diaries;
    }

    //lấy 1 diary theo id (id lấy từ request,chưa join)
    static function getDiaryById($id)
    {
        return Diary::find($id);
    }

    //thêm 1 diary ($request lấy từ Request $request)
    static function insertDiary($request)
    {
        $request->validate([

            'diary_name' => 'required|min:1|max:255',
    
        ]);
        return Diary::create([
            'diary_name' => $request->diary_name,
            'user_id' => Auth::user()->user_id,
            'status' => 1,
        ]);
    }

    //cập nhật, chỉnh sửa 1 diary ($request lấy từ Request $request)
    static function updateDiary($request)
    {
        $request->validate([

            'diary_name' => 'required|min:1',
    
        ]);
        $diary = Diary::getDiaryById($request->diary_id);
        $diary->diary_name = $request->diary_name;
        $diary->user_id = Auth::user()->user_id;
        $diary->status = 1;
        $diary->save();
    }

    //xóa 1 diary ($request lấy từ Request $request,bao gồm weeks, diaries_contents, comments có liên quan)
    static function deleteDiary($request)
    {
        $diary = Diary::getDiaryById($request->diary_id);
        foreach ($diary->weeks as $week) {
            foreach ($week->diaryContents as $diary_content) {
                foreach ($diary_content->comments as $comment) {
                    $comment->delete();
                }
                $diary_content->delete();
            }
            $week->delete();
        }
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

    //xóa 1 diary ($request lấy từ Request $request,bao gồm weeks, diaries_contents, comments có liên quan)
    static function searchDiary($key)
    {
        switch (Auth::user()->userType->usertype_name) {
            case 'Student':
                $user_id = Auth::user()->user_id;
                $diary = Diary::select('diaries.*')->join('users', 'users.user_id', 'diaries.user_id')->where('diaries.diary_name', 'like', '%' . $key . '%')->where('diaries.user_id', '=', $user_id)->orderBy('diaries.diary_id', 'DESC')->paginate(10);
                break;
            default:
                $diary = Diary::select('diaries.*')->join('users', 'users.user_id', 'diaries.user_id')->where('diaries.diary_name', 'like', '%' . $key . '%')->orwhere('users.user_name', 'like', '%' . $key . '%')->orderBy('diaries.diary_id', 'DESC')->paginate(10);
                break;
        }
        return $diary;
    }

    //chỉnh status
    static function changeStatus($request)
    {
        $diary = Diary::getDiaryById($request->diary_id);
        $diary->status = $request->status;
        $diary->save();
    }
}
