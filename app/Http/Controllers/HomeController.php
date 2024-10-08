<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('pages/manage/home');
    }

}
