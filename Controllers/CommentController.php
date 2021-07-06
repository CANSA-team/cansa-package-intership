<?php

namespace Cansa\Intership\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cansa\Intership\Models\DiaryContent;
use Cansa\Intership\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public $data = array();
    public $weeks;

    //lấy view theo userType
    public static function getView()
    {
        $view='';
        switch (Auth::user()->userType->usertype_name) {
            case 'Student':
                $view = 'package-intership::student.comments.comments';
                break;
            case 'Admin':
                $view = 'package-intership::admin.comments.comments';
                break;
            case 'Teacher':
            case 'Trainer':
                $view = 'package-intership::teacher-trainer.comments.comments';
                break;
        }
        return $view;
    }

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = Comment::getComments($request->content_id);
        $content = DiaryContent::getDiaryContentById($request->content_id);
        return view(CommentController::getView(), ['comments' => $comments,'content' => $content]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('package-intership::admin.comments.create_update');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (Auth::check()) {
            $comment = Comment::getCommentById($request->id);
            return view('package-intership::admin.comments.create_update', ['comment' => $comment]);
        } else {
            session()->flush();
            return redirect()->route('login.form');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Comment::updateComment($request);
        return redirect()->route('comment',['content_id'=>$request->content_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Comment::deleteComment($request);
        return redirect()->route('comment',['content_id'=>$request->content_id]);
    }

    //tạo ra 1 comment
    public function createComment(Request $request)
    {
        Comment::insertComment($request);
        return redirect()->route('comment',['content_id'=>$request->content_id]);
    }

    //search comment theo request
    public function search(Request $request)
    {
        $comments = Comment::searchComments($request);
        $content = DiaryContent::getDiaryContentById($request->content_id);
        return view(CommentController::getView(), ['comments' => $comments,'content' => $content]);
    }

    //thay đổi status comment
    public function changeStatus(Request $request){
        Comment::changeStatus($request);
    }
}
