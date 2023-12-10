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
{{--    @foreach($posts as $post)--}}
{{--        This is post title {{$post->title}} <br> <br>--}}
{{--        This is post description {{$post->description}}--}}
{{--    @endforeach--}}

    <form action="{{route('post.upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input name="file" type="file" accept=".xls, .xlsx, .csv">
        <button type="submit">Upload</button>
    </form>


    @if(session('success'))
        {{ session('success') }}
    @endif
</body>
</html>
