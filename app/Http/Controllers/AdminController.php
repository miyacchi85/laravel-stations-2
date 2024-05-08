<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;

class AdminController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movie', ['movieParam' => $movies]);
    }

    public function createmovie()
    {
        return view('admin.createmovie');
    }

    public function store(MovieRequest $request)
    {
        $inputs = $request->all();

        \DB::beginTransaction();
        try{
            Movie::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg','登録しました');
        return redirect()->route('admin.index');
    }
}