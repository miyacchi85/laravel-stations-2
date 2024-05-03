<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class AdminController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movie', ['movieParam' => $movies]);
    }
}