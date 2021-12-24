<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="">
    @csrf
    <input type="text" name="title" value="{{$post->title}}">

    <input type="text" name="content" placeholder="Nội dung" value="{{$post->content}}">

    <select name="" id="" value="{{$post->user_id}}">
        @foreach(\App\Models\User::all() as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>

    <a href="{{route('posts.index')}}" type="button">Quay lại</a>
</form>
</body>
</html>
