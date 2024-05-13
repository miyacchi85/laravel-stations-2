<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>adminmovie</title>
</head>
<body>
    <h1>管理者画面</h1>    
    <table>
        <thead>
            <tr>
                <th>映画タイトル</th>
                <th>画像URL</th>
                <th>公開年</th>
                <th>上映中かどうか</th>
                <th>概要</th>
                <th>登録日時</th>
                <th>更新日時</th>
                <th>編集</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movieParam as $movie)
            <tr>
                <td>{{ $movie->title }} </td>
                <td>{{ $movie->image_url }}</td>
                <td>{{ $movie->published_year }}</td>
                <td>{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->created_at }}</td>
                <td>{{ $movie->updated_at }}</td>
                <td><a href="{{route('edit', $movie)}}">編集</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>