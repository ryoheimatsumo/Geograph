<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <script>
            room_id = {{$room->id}};
        </script>
        <script type="text/javascript" src="{{secure_asset('js/room.js')}}"></script>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Title: {{$room->title}}</h1>
            <h2 class="text-center">{{$room->descroption}}</h2>
            
            <!-- New Feeling Form -->
            <hr>
            <h2>How are you feeling?</h2>
            {!! Form::open(array('route' => 'feeling.create')) !!}
            {!! Form::token() !!}
            <label>Content</label>
            {!! Form::text('content') !!}<br>
            {{Form::hidden('room_id', $room->id)}}
            {!! Form::submit('Post!!') !!}
            {!! Form::close() !!}
            
            <!-- Feelings Section -->
            <hr>
            <h2>Feelings</h2>
            <div id="feeling-section"></div>
        </div>
    </body>
</html>