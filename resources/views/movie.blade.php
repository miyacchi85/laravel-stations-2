<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>movie</title>
</head>
<body>
    <ul>
        @foreach ($movieParam as $movie)
            <li>タイトル: {{ $movie->title }} 画像URL: {{ $movie->image_url }}</li>
        @endforeach
    </ul>
</body>
</html>