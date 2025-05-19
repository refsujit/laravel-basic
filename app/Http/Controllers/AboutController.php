<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    // php artisan make:controller AboutController
    // Route::get('/',[AboutController::class, 'index']);
    // about.blade.php

    public function index(){
        $services = Service::all();
        // dd($services);
        // dd($id);
        $id = 123;
        $name = 'Ram';
        $subjects = ['WebTech', 'SAD', 'DBMS', 'CG'];
        $status = false;
        $msg = '<span>Hello <strong> World!!!</strong></span>';
        return view('frontend.about',compact('name','subjects','status','msg','id','services'));
    }

    public function test(){
        return "this is test function";
    }

}
