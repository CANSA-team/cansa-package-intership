<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //tên bảng
    protected $table = 'comments';

    //khóa chính
    protected $primaryKey = 'id';

    //định dạng ngày tháng
    protected $dateFormat = 'd-m-Y';

    //các cột được phép thay đổi
    protected $fillable = [
        'user_id',
        'comment_content',
        'comment_rating',
        'comment_type',
        'comment_id',
        'status',
    ];

    //lấy tất cả comments (chưa join)
    static function getComments()
    {
        return Comment::all();
    }

    //lấy 1 comments theo id (id lấy từ request,chưa join)
    static function getCommentById($id)
    {
        return Comment::find($id);
    }

    //thêm 1 comment ($request lấy từ Request $request)
    static function insertDiaryContent($request)
    {
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->comment_content = $request->comment_content;
        $comment->comment_rating = $request->comment_rating;
        $comment->comment_type = $request->comment_type;
        $comment->comment_id = $request->comment_id;
        $comment->status = $request->status;
        $comment->save();
    }

    //cập nhật, chỉnh sửa 1 comment ($request lấy từ Request $request)
    static function updateComment($request)
    {
        $comment = Comment::getCommentById($request->id);
        $comment->user_id = $request->user_id;
        $comment->comment_content = $request->comment_content;
        $comment->comment_rating = $request->comment_rating;
        $comment->comment_type = $request->comment_type;
        $comment->comment_id = $request->comment_id;
        $comment->status = $request->status;
        $comment->save();
    }

    //xóa 1 comment ($request lấy từ Request $request, bao gồm comments có liên quan)
    static function deleteComment($request)
    {
        $comment = Comment::getCommentById($request->id);
        $comment->delete();
    }

    //lấy user liên quan đến comment
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }

    //lấy diary_content liên quan đến comment
    public function weeks()
    {
        return $this->hasOne(DiaryContent::class, 'diarycontent_id', 'comment_id');
    }
}
