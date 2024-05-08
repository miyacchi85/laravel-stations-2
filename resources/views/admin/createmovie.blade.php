<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>adminmovie</title>
</head>
<body>
    <h1>映画登録画面</h1>

    <form method="POST" action="{{ route('store') }}">
        @csrf
        <label for="title">映画タイトル:</label>
        <input type="text" name="title" id="title" required>

        <label for="image_url">画像URL:</label>
        <input type="text" name="image_url" id="image_url" required>

        <label for="published_year">公開年:</label>
        <input type="number" name="published_year" id="published_year" required>

        <label for="is_showing">公開中である:</label>
        <input type="hidden" name="is_showing" id="is_showing" value="0">
        <input type="checkbox" name="is_showing" id="is_showing" value="1">

        <label for="description">概要:</label>
        <textarea name="description" id="description" required></textarea>

        <button type="submit">新規登録</button>
    </form>    
</body>
</html>