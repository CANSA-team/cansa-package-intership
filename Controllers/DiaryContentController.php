<?php

namespace Cansa\Intership\Controllers;

use App\Http\Controllers\Controller;
use Cansa\Intership\Models\DiaryContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryContentController extends Controller
{
    public $data = array();
    public $weeks;

    //lấy view theo userType
    public static function getView()
    {
        $view = '';
        switch (Auth::user()->userType->usertype_name) {
            case 'Student':
                $view = 'package-intership::student.diary-content.content';
                break;
            case 'Admin':
                $view = 'package-intership::admin.diary-content.content';
                break;
            case 'Teacher':
            case 'Trainer':
                $view = 'package-intership::teacher-trainer.diary-content.content';
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
        if (!isset($request->content_id)) {
            return abort(404);
        }
        $contents = DiaryContent::getDiariesContents($request->content_id);
        return view(DiaryContentController::getView(), ['contents' => $contents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!isset($_GET['content_id'])) {
            return abort(404);
        }
        return view('package-intership::admin.diary-content.create_update');
        
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (!isset($request->content_id) || !isset($request->id)) {
            return abort(404);
        }
        $content = DiaryContent::getDiaryContentById($request->id);
        return view('package-intership::admin.diary-content.create_update', ['content' => $content]);
      
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
        DiaryContent::updateDiaryContent($request);
        return redirect()->route('diary-content', ['content_id' => $request->content_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        DiaryContent::deleteDiaryContent($request);
        return redirect()->route('diary-content', ['content_id' => $request->content_id]);
    }

    public function createDiaryContent(Request $request)
    {
        DiaryContent::insertDiaryContent($request);
        return redirect()->route('diary-content', ['content_id' => $request->content_id]);
    }

    //search diary content theo request
    public function search(Request $request)
    {
        $contents = DiaryContent::searchWeek($request);

        return view(DiaryContentController::getView(), ['contents' => $contents]);
    }

    //thay đổi status diary content
    public function changeStatus(Request $request)
    {
        DiaryContent::changeStatus($request);
    }
}
