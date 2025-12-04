<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Later we will load projects, skills, study history from DB
        return view('home');
    }
}
