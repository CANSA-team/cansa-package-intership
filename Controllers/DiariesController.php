<?php

namespace Cansa\Intership\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cansa\Intership\Models\Diary;
use Illuminate\Support\Facades\Auth;

class DiariesController extends Controller
{
    public $data = array();
    public $weeks;

    //lấy view theo userType
    public static function getView()
    {
        $view = '';
        switch (Auth::user()->userType->usertype_name) {
            case 'Student':
                $view = 'package-intership::student.diaries.diaries';
                break;
            case 'Admin':
                $view = 'package-intership::admin.diaries.diaries';
                break;
            case 'Teacher':
            case 'Trainer':
                $view = 'package-intership::teacher-trainer.diaries.diaries';
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
    public function index()
    {      
        $diaries = Diary::getDiaries();
        return view(DiariesController::getView(), ['diaries' => $diaries]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        return view('package-intership::admin.diaries.create_update');   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $diary = Diary::getDiaryById($request->id);
        return view('package-intership::admin.diaries.create_update', ['diary' => $diary]);
    
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
        Diary::updateDiary($request);
        return redirect()->route('diaries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Diary::deleteDiary($request);
        return redirect()->route('diaries');
    }

    //tạo ra 1 diary
    public function createDiary(Request $request)
    {
        Diary::insertDiary($request);
        return redirect()->route('diaries');
    }

    //search diaries theo request
    public function search()
    {
        $search = $_GET['key'];
        $diaries = Diary::searchDiary($search);

        return view(DiariesController::getView(), ['diaries' => $diaries]);
    }

    //thay đổi status diary
    public function changeStatus(Request $request)
    {
        Diary::changeStatus($request);
    }
}
