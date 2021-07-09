<?php
namespace Cansa\Intership\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    //tên bảng
    protected $table = 'comments';

    //khóa chính
    protected $primaryKey = 'comment_id';


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
    static function getComments($content_id)
    {
        $comments = Comment::where('comment_type', $content_id)->orderBy('comment_id', 'DESC')->paginate(10);
        return $comments;
    }

    //lấy 1 comments theo id (id lấy từ request,chưa join)
    static function getCommentById($id)
    {
        return Comment::find($id);
    }

    //thêm 1 comment ($request lấy từ Request $request)
    static function insertComment($request)
    {
        $request->validate([

            'comment_content' => 'required|min:1',
    
    
            'content_id' => 'required|min:1',
    
        ]);
        $comment = new Comment();
        $comment->user_id = Auth::user()->user_id;
        $comment->comment_content = $request->comment_content;
        $comment->comment_rating = $request->comment_rating;
        $comment->comment_type = $request->content_id;
        $comment->status = 1;
        $comment->save();
    }

    //cập nhật, chỉnh sửa 1 comment ($request lấy từ Request $request)
    static function updateComment($request)
    {
        $request->validate([

            'comment_content' => 'required|min:1|max:255',
    
    
            'content_id' => 'required|min:1',
    
        ]);
        $comment = Comment::getCommentById($request->id);
        $comment->comment_content = $request->comment_content;
        $comment->comment_rating = $request->comment_rating;
        $comment->comment_type = $request->content_id;
        $comment->status = 1;
        $comment->save();
    }

    //xóa 1 comment ($request lấy từ Request $request, bao gồm comments có liên quan)
    static function deleteComment($request)
    {
        $comment = Comment::getCommentById($request->comment_id);
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
    
    //search comments gần giống key
    static function searchComments($request)
    {
        $key = $request->key;
        $content_id = $request->content_id;
        $comments = Comment::select('comments.*')->join('users', 'users.user_id', 'comments.user_id')->where('users.user_name', 'like', '%' . $key . '%')->where('comments.comment_type', '=', $content_id)->orderBy('comments.comment_id', 'DESC')->paginate(10);
        return $comments;
    }

    //chỉnh status
    static function changeStatus($request){
        $comment = Comment::getCommentById($request->id);
        $comment->status = $request->status;
        $comment->save();
    }
}
