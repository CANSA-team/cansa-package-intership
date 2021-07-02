<?php

namespace Cansa\Intership\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL,
    Route,
    Redirect;
use Foostart\Sample\Models\Samples;
use Cansa\Intership\Models\Diary;
use Cansa\Intership\Models\User;
use Cansa\Intership\Models\UserType;
use Illuminate\Support\Facades\Auth;

class DiariesController extends Controller
{
    public $data = array();
    public $weeks;
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
        if (session()->has('user_detail')) {
            $diaries = Diary::getDiaries();
            return view('package-intership::admin.diaries.diaries',['diaries'=>$diaries]);
        } else {
            session()->flush();
            return view('package-intership::auth.login');
        }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        return view('package-intership::admin.diaries.create_update',['diary'=>$diary]);
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

    public function createDiary(Request $request)
    {
        Diary::insertDiary($request);
        return redirect()->route('diaries');
    }
}
