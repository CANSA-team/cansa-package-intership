<?php

namespace Cansa\Intership\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cansa\Intership\Models\Week;
use Illuminate\Support\Facades\Auth;

class WeeksController extends Controller
{
    public $data = array();
    public $weeks;

    //lấy đường dẫn file theo từng userType
    public static function getView()
    {
        $view = '';
        switch (Auth::user()->userType->usertype_name) {
            case 'Student':
                $view = 'package-intership::student.weeks.weeks';
                break;
            case 'Admin':
                $view = 'package-intership::admin.weeks.weeks';
                break;
            case 'Teacher':
            case 'Trainer':
                $view = 'package-intership::teacher-trainer.weeks.weeks';
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
        $weeks = Week::getWeeks($request->diary_id);
        return view(WeeksController::getView(), ['weeks' => $weeks]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('package-intership::admin.weeks.create_update');
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
            $week = Week::getWeekById($request->id);
            return view('package-intership::admin.weeks.create_update', ['week' => $week]);
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
        Week::updateWeek($request);
        return redirect()->route('weeks', ['diary_id' => $request->diary_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Week::deleteWeek($request);
        return redirect()->route('weeks', ['diary_id' => $request->diary_id]);
    }

    //tạo ra 1 week từ request
    public function createWeek(Request $request)
    {
        Week::insertWeek($request);
        return redirect()->route('weeks', ['diary_id' => $request->diary_id]);
    }

    //search week theo request
    public function search(Request $request)
    {
        $weeks = Week::searchWeek($request);
        return view(WeeksController::getView(), ['weeks' => $weeks]);
    }

    //thay đổi status của week
    public function changeStatus(Request $request)
    {
        Week::changeStatus($request);
    }

    //thay đổi status check của week
    public function changeStatusCheck(Request $request)
    {
        Week::changeStatusCheck($request);
    }
}
