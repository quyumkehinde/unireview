<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $schools = School::where('status', '=', 0)->get(['id', 'name']);

        return view('static.home', [
            'schools' => json_encode($schools)
        ]);
    }
}
