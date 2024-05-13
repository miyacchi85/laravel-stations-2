<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画登録</title>
</head>
<body>
    <h1>映画登録画面</h1>
    @if ($errors->any())
      <div>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form action="store" method="POST">
        @csrf
        <div>
            <div>
                <label for="title">映画タイトル:</label>
                <input type="text" name="title" required>
            </div>

            <div>
                <label for="image_url">画像URL:</label>
                <input type="text" name="image_url" required>
            </div>

            <div>
                <label for="published_year">公開年:</label>
                <input type="number" name="published_year" required>
            </div>

            <div>
                <label for="is_showing">公開中である:</label>
                <input type="hidden" name="is_showing" value="0">
                <input type="checkbox" name="is_showing" value="1">
            </div>

            <div>
                <label for="description">概要:</label>
                <textarea name="description" cols="30" rows="10" required></textarea>
            </div>

            <div>
                <button type="submit">新規登録</button>
            </div>
        </div>
    </form>    
</body>
</html>