<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryContent extends Model
{
    //tên bảng
    protected $table = 'diaries_contents';

    //khóa chính
    protected $primaryKey = 'diarycontent_id';

    //định dạng ngày tháng
    protected $dateFormat = 'd-m-Y';

    //các cột được phép thay đổi
    protected $fillable = [
        'diarycontent_weekday', 
        'diarycontent_work',
        'diarycontent_content',
        'diarycontent_note',
        'week_id',
        'status',
    ];

    //lấy tất cả diaries_contents (chưa join)
    static function getDiariesContents(){
        return Week::all();
    }
    
    //lấy 1 diary_content theo id (id lấy từ request,chưa join)
    static function getDiaryContentById($id){
        return Week::find($id);
    }

    //thêm 1 diary_content ($request lấy từ Request $request)
    static function insertDiaryContent($request){
        $diary_content = new DiaryContent();
        $diary_content->diarycontent_weekday = $request->diarycontent_weekday;
        $diary_content->diarycontent_work = $request->diarycontent_work;
        $diary_content->diarycontent_content = $request->diarycontent_content;
        $diary_content->diarycontent_note = $request->diarycontent_note;
        $diary_content->week_id = $request->week_id;
        $diary_content->status = $request->status;
        $diary_content->save();
    }

    //cập nhật, chỉnh sửa 1 diary_content ($request lấy từ Request $request)
    static function updateDiaryContent($request){
        $diary_content = DiaryContent::getDiaryContentById($request->diarycontent_id);
        $diary_content->diarycontent_weekday = $request->diarycontent_weekday;
        $diary_content->diarycontent_work = $request->diarycontent_work;
        $diary_content->diarycontent_content = $request->diarycontent_content;
        $diary_content->diarycontent_note = $request->diarycontent_note;
        $diary_content->week_id = $request->week_id;
        $diary_content->status = $request->status;
        $diary_content->save();
    }

    //xóa 1 diary_content ($request lấy từ Request $request, bao gồm comments có liên quan)
    static function deleteDiaryContent($request){
        $diary_content = DiaryContent::getDiaryContentById($request->diarycontent_id);
        $comments = $diary_content->comments();
        foreach ($comments as $comment){
            $comment->delete();
        }
        $diary_content->delete();
    }

    //lấy comments liên quan đến diary_content
    public function comments()
    {
        return $this->hasMany(Comments::class, 'comment_id', 'diarycontent_id');
    }

    //lấy week liên quan đến diary_content
    public function weeks()
    {
        return $this->hasOne(Week::class, 'week_id', 'week_id');
    }
}
