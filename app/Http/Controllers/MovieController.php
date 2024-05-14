<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    // 一覧画面表示
    public function index(Request $request)
    {    
        $keyword = $request->input('keyword');
        $is_showing = $request->input('is_showing');

        $movies = Movie::query()
            ->when(isset($keyword), function($query) use ($keyword) {
                return $query->where(function($query) use ($keyword) {
                    $query->where('description', 'like', "%{$keyword}%")->orWhere('title', 'like', "%{$keyword}%");
                });
            })->when(isset($is_showing), function($query) use ($is_showing) {
                return $query->where('is_showing', $is_showing);
            })->paginate(20);
        
        return view('movie', ['movies' => $movies]);
    }

    // 一覧画面表示（管理画面）
    public function adminindex()
    {
        $movies = Movie::all();
        return view('adminmovie', ['movieParam' => $movies]);
    }

    // 映画登録画面
    public function createmovie()
    {
        return view('createmovie');
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
        return view('editmovie', compact('movie'));
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

    // 削除
    public function destroymovie($id)
    {
        $movie=Movie::find($id);
        if($movie) {
            $movie->delete();
            return redirect()->route('admin.index');
        } else {
            return abort(404);
        }
    }
}