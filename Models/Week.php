<?php

namespace Cansa\Intership\Models;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    //tên bảng
    protected $table = 'weeks';

    //khóa chính
    protected $primaryKey = 'week_id';

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
    static function getWeeks($diary_id)
    {
        $week = Week::where('diary_id', $diary_id)->orderBy('week_id', 'DESC')->paginate(10);
        return $week;
    }

    //lấy 1 week theo id (id lấy từ request,chưa join)
    static function getWeekById($id)
    {
        return Week::find($id);
    }

    //thêm 1 week ($request lấy từ Request $request)
    static function insertWeek($request)
    {
        $request->validate([
            'week_weekdays' => 'required|min:1|max:255',
            'diary_id' => 'required|min:1',
        ]);
        $week = new Week();
        $week->week_weekdays = $request->week_weekdays;
        $week->status_check = 0;
        $week->status = 1;
        $week->start_date = $request->start_date;
        $week->end_date = $request->end_date;
        $week->diary_id = $request->diary_id;
        $week->save();
    }

    //cập nhật, chỉnh sửa 1 week ($request lấy từ Request $request)
    static function updateWeek($request)
    {
        $request->validate([
            'week_weekdays' => 'required|min:1',
            'diary_id' => 'required|min:1',
        ]);
        $week = Week::getWeekById($request->week_id);
        $week->week_weekdays = $request->week_weekdays;
        $week->status_check = 0;
        $week->status = 1;
        $week->start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        $week->end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
        $week->diary_id = $request->diary_id;
        $week->save();
    }

    //xóa 1 week ($request lấy từ Request $request, bao gồm diaries_contents, comments có liên quan)
    static function deleteWeek($request)
    {
        $week = Week::getWeekById($request->week_id);
        foreach ($week->diaryContents as $diary_content) {
            foreach ($diary_content->comments as $comment) {
                $comment->delete();
            }
            $diary_content->delete();
        }
        $week->delete();
    }

    //lấy diaries_contents liên quan đến week
    public function diaryContents()
    {
        return $this->hasMany(DiaryContent::class, 'weeks_id', 'week_id');
    }

    //lấy diary liên quan đến week
    public function diaries()
    {
        return $this->belongsTo(Diary::class, 'diary_id', 'diary_id');
    }

    static function searchWeek($request)
    {
        $key = $request->key;
        $diary_id = $request->diary_id;

        $week = Week::where('weeks.week_weekdays', 'like', '%' . $key . '%')->where('weeks.diary_id', '=', $diary_id)->orderBy('weeks.week_id', 'DESC')->paginate(10);

        return $week;
    }

    //chỉnh status
    static function changeStatus($request)
    {
        $week = Week::getWeekById($request->week_id);
        $week->status = $request->status;
        $week->save();
    }

    //chỉnh status
    static function changeStatusCheck($request)
    {
        $week = Week::getWeekById($request->week_id);
        $week->status_check = $request->status_check;
        $week->save();
    }
}
