<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    // 一覧画面表示
    public function index()
    {
        $movies = Movie::all();
        return view('movie', ['movieParam' => $movies]);
    }

    // 一覧画面表示（管理画面）
    public function adminindex()
    {
        $movies = Movie::all();
        return view('admin.movie', ['movieParam' => $movies]);
    }

    // 映画登録画面
    public function createmovie()
    {
        return view('admin.createmovie');
    }

    // 登録処理
    public function store(CreateMovieRequest $request)
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

    // 編集画面表示
    public function editmovie($id)
    {
        $movie=Movie::find($id);
        return view('admin.editmovie', compact('movie'));
    }

    // 更新処理
    public function updatemovie(UpdateMovieRequest $request,$id)
    {
        \DB::beginTransaction();
        try{
            $inputs = $request->validated();
            $movie=Movie::find($id);
            $movie->fill([
                'title'=>$inputs['title'],
                'image_url'=>$inputs['image_url'],
                'published_year'=>$inputs['published_year'],
                'is_showing'=>$inputs['is_showing'],
                'description'=>$inputs['description']
            ]);
            $movie->save();
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg','更新しました');
        return redirect()->route('admin.index');
    }
}