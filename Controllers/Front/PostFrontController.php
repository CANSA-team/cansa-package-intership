<?php namespace Cansa\Intership\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Sample\Models\Samples;

class PostFrontController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index()
    {

        // $obj_sample = new Samples();
        // $samples = $obj_sample->get_samples();
        // $this->data = array(
        //     'request' => $request,
        //     'samples' => $samples
        // );
        
        return view('package-intership::admin.index');
    }

}