<?php

namespace Cansa\Intership\Models;

use Illuminate\Database\Eloquent\Model;

class DiaryContent extends Model
{
    //tên bảng
    protected $table = 'diaries_contents';

    //khóa chính
    protected $primaryKey = 'diarycontent_id';


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
    static function getDiariesContents($weeks_id)
    {
        $content = DiaryContent::where('weeks_id', $weeks_id)->orderBy('diarycontent_id', 'DESC')->paginate(10);
        return $content;
    }

    //lấy 1 diary_content theo id (id lấy từ request,chưa join)
    static function getDiaryContentById($id)
    {
        return DiaryContent::find($id);
    }
    // Search diary
    static function searchWeek($request)
    {
        $key = $request->key;
        $content_id = $request->content_id;

        $week = DiaryContent::where('diaries_contents.diarycontent_weekday', 'like', '%' . $key . '%')->where('diaries_contents.weeks_id', '=', $content_id)->orderBy('diaries_contents.diarycontent_id', 'DESC')->paginate(10);

        return $week;
    }
    //thêm 1 diary_content ($request lấy từ Request $request)
    static function insertDiaryContent($request)
    {
        $request->validate([

            'diarycontent_weekday' => 'required|min:1',
            'diarycontent_work' => 'required|min:1',
            'diarycontent_content' => 'required|min:1',
            'diarycontent_note' => 'required|min:1',

        ], [
            'diarycontent_weekday.required' => 'The Diary Content Weekday field is required.',
            'diarycontent_work.required' => 'The Diary Content Work field is required.',
            'diarycontent_content.required' => 'The Diary Content Note field is required.',
            'diarycontent_note.required' => 'The Diary Content Content field is required.',
        ]);
        $diary_content = new DiaryContent();
        $diary_content->diarycontent_weekday = $request->diarycontent_weekday;
        $diary_content->diarycontent_work = $request->diarycontent_work;
        $diary_content->diarycontent_content = $request->diarycontent_content;
        $diary_content->diarycontent_note = $request->diarycontent_note;
        $diary_content->weeks_id = $request->content_id;
        $diary_content->status = 1;
        $diary_content->save();
    }

    //cập nhật, chỉnh sửa 1 diary_content ($request lấy từ Request $request)
    static function updateDiaryContent($request)
    {
        $request->validate([

            'diarycontent_weekday' => 'required|min:1|max:255',
            'diarycontent_work' => 'required|min:1',
            'diarycontent_content' => 'required|min:1',
            'diarycontent_note' => 'required|min:1',
            'content_id' => 'required|min:1',

        ], [
            'diarycontent_weekday.required' => 'The Diary Content Weekday field is required.',
            'diarycontent_work.required' => 'The Diary Content Work field is required.',
            'diarycontent_content.required' => 'The Diary Content Note field is required.',
            'diarycontent_note.required' => 'The Diary Content Content field is required.',
        ]);
        $diary_content = DiaryContent::getDiaryContentById($request->diarycontent_id);
        $diary_content->diarycontent_weekday = $request->diarycontent_weekday;
        $diary_content->diarycontent_work = $request->diarycontent_work;
        $diary_content->diarycontent_content = $request->diarycontent_content;
        $diary_content->diarycontent_note = $request->diarycontent_note;
        $diary_content->weeks_id = $request->content_id;
        $diary_content->status = 1;
        $diary_content->save();
    }

    //xóa 1 diary_content ($request lấy từ Request $request, bao gồm comments có liên quan)
    static function deleteDiaryContent($request)
    {
        $diary_content = DiaryContent::getDiaryContentById($request->diarycontent_id);
        foreach ($diary_content->comments as $comment) {
            $comment->delete();
        }
        $diary_content->delete();
    }

    //lấy comments liên quan đến diary_content
    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_type', 'diarycontent_id');
    }

    //lấy week liên quan đến diary_content
    public function weeks()
    {
        return $this->hasOne(Week::class, 'week_id', 'week_id');
    }

    //chỉnh status
    static function changeStatus($request)
    {
        $diary_content = DiaryContent::getDiaryContentById($request->diarycontent_id);
        $diary_content->status = $request->status;
        $diary_content->save();
    }
}
