<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <h1>{{$room->title}}</h1>
        <h1>{{$room->descroption}}</h1>
        @foreach($feelings as $feeling)
        <p>{{$feeling->id}}</p>
        <p>{{$feeling->content}}</p><br>
        @endforeach
    </body>
</html>