<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MyHome extends Controller
{
    public function index() {
        $data = ['a', 'b', 'c', 'd', 'e', 'f'];

        $db_data = Movie::all();

        return view('layouts.myhomepage', compact('data', 'db_data'));
    }
}
