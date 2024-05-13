<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>editmovie</title>
</head>
<body>
    <h1>映画編集画面</h1>
    @if ($errors->any())
      <div>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form action="update" method="POST">
    @method('PATCH')
    @csrf
        <div>
            <label for="title">映画タイトル:</label>
            <input type="text" name="title" id="title" value="{{ $movie->title}}">
        </div>

        <div>
            <label for="image_url">画像URL:</label>
            <input type="text" name="image_url" id="image_url" value="{{ $movie->image_url}}">
        </div>

        <div>
            <label for="published_year">公開年:</label>
            <input type="number" name="published_year" id="published_year" value="{{ $movie->published_year}}">
        </div>

        <div>
            <label for="is_showing">公開中である:</label>
            <input type="hidden" name="is_showing" id="is_showing" value="0">
            <input type="checkbox" name="is_showing" id="is_showing" value="1" {{ $movie->is_showing ? 'checked' : '' }}>
        </div>

        <div>
            <label for="description">概要:</label>
            <textarea name="description" id="description">{{ $movie->description}}</textarea>
        </div>

        <div>
            <button type="submit">変更する</button>
            <a href="{{route('admin.index')}}">戻る</a>
        </div>
    </form>    
</body>
</html>