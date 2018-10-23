<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <script type="text/javascript" src="{{secure_asset('js/index.js')}}"></script>
        <script type="text/javascript">getRooms();</script>
    </head>
    <body>
        <h1>GeoGraph</h1>
        
        <hr>
        <h2>Available Rooms</h2>
        <div id="rooms-section"></div>
        
        <hr>
        <h2>Create One</h2>
        {!! Form::open(array('url' => URL::to('/room/create', array(), true), 'id' =>'create-room-form')) !!}
        {!! Form::token() !!}
        <label>Title</label>
        {!! Form::text('title') !!}<br>
        <label>Description</label>
        {!! Form::text('description') !!}<br>
        {!! Form::submit('Create!!') !!}
        {!! Form::close() !!}
    </body>
</html>