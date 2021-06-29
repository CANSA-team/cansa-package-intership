<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    //tên bảng
    protected $table = 'weeks';

    //khóa chính
    protected $primaryKey = 'week_id';

    //định dạng ngày tháng
    protected $dateFormat = 'd-m-Y';

    //các cột được phép thay đổi
    protected $fillable = [
        'week_weekdays', 
        'status_check',
        'status',
        'start_date',
        'end_date',
        'diary_id',
    ];

    //lấy tất cả week (chưa join)
    static function getWeeks(){
        return Week::all();
    }
    
    //lấy 1 week theo id (id lấy từ request,chưa join)
    static function getWeekById($id){
        return Week::find($id);
    }

    //thêm 1 week ($request lấy từ Request $request)
    static function insertWeek($request){
        $week = new Week();
        $week->week_weekdays = $request->week_weekdays;
        $week->status_check = $request->status_check;
        $week->status = $request->status;
        $week->start_date = $request->start_date;
        $week->end_date = $request->end_date;
        $week->diary_id = $request->diary_id;
        $week->save();
    }

    //cập nhật, chỉnh sửa 1 week ($request lấy từ Request $request)
    static function updateWeek($request){
        $week = Week::getWeekById($request->week_id);
        $week->week_weekdays = $request->week_weekdays;
        $week->status_check = $request->status_check;
        $week->status = $request->status;
        $week->start_date = $request->start_date;
        $week->end_date = $request->end_date;
        $week->diary_id = $request->diary_id;
        $week->save();
    }

    //xóa 1 week ($request lấy từ Request $request, bao gồm diaries_contents, comments có liên quan)
    static function deleteWeek($request){
        $week = Week::getWeekById($request->week_id);
        $diaries_contents = $week->diaries();
            foreach ($diaries_contents as $diary_content){
                $comments = $diary_content->comments();
                foreach ($comments as $comment){
                    $comment->delete();
                }
                $diaries_contents->delete();
            }
        $week->delete();
    }

    //lấy diaries_contents liên quan đến week
    public function diariesContents()
    {
        return $this->hasMany(DiaryContent::class, 'week_id', 'week_id');
    }

    //lấy diary liên quan đến week
    public function diaries()
    {
        return $this->hasOne(Diary::class, 'diary_id', 'diary_id');
    }
}
