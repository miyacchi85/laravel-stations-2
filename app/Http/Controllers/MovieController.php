<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Support\Facades\DB;

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
        try {
            DB::beginTransaction();
            $inputs = $request->validated();
            $genre_check = Genre::where('name', $inputs['genre'])->first();

            $movie=new Movie;
            $movie->title=$inputs['title'];
            $movie->image_url=$inputs['image_url'];
            $movie->published_year=$inputs['published_year'];
            $movie->is_showing=$inputs['is_showing'];
            $movie->description=$inputs['description'];

            if (!$genre_check) {
            $genre=new Genre;
            $genre->name=$inputs['genre'];
            $genre->save();
            $movie->genre_id=$genre->id;        
            } else {
            $movie->genre_id=$genre_check->id;
            }
            
            $movie->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            abort(500);
        }
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
        try {
            DB::beginTransaction();
            $inputs = $request->validated();
            $genre_check = Genre::where('name', $inputs['genre'])->first();

            $movie=Movie::find($id);
            $movie->title=$inputs['title'];
            $movie->image_url=$inputs['image_url'];
            $movie->published_year=$inputs['published_year'];
            $movie->is_showing=$inputs['is_showing'];
            $movie->description=$inputs['description'];

            if (!$genre_check) {
            $genre=new Genre;
            $genre->name=$inputs['genre'];
            $genre->save();
            $movie->genre_id=$genre->id;        
            } else {
            $movie->genre_id=$genre_check->id;
            }
            
            $movie->save();
            DB::commit();
        }catch (\Throwable $e) {
            DB::rollBack();
            abort(500);
        }
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