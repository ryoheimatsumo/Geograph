<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="{{secure_asset('css/room.css')}}" type="text/css" />
        <script src="{{secure_asset('js/d3.v3.min.js')}}"></script>
        <script src="{{secure_asset('js/d3.layout.cloud.js')}}"></script>
        <script>
            room_id = {{$room->id}};
        </script>
        <script type="text/javascript" src="{{secure_asset('js/room.js')}}"></script>
        <script type="text/javascript">tick();</script>
        <script type="text/javascript">
            function go(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                        tick();
                    }
                };
                var f = document.getElementById("feeling-input").innerText;
                xhttp.open("GET", "/feeling/create/"+{{$room->id}}+"/"+f, true);
                xhttp.send();
            }
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">PUTIPUTI</a>
        </nav>
        <div class="container">
            <h1 id="room-title" class="text-center mt-3">#{{$room->title}}</h1>
            <h3 id="room-desc" class="text-center">{{$room->descroption}}</h3>
            
            <!-- New Feeling Form -->
            <hr>
            <h2 class="text-center">How do you feel?</h2>
            <div class="row">
                <div class="input-group-text col-10" id="feeling-input" contenteditable="true">post your feelings(´;ω;｀)</div>
                <button class="btn btn-info col-2" onclick="go()">post</button>
            </div>
            
            <!-- Feelings Section -->
            <hr>
            <h2 class="feelings">#your feelings</h2>
            <div id="feeling-section"></div>
        </div>
    </body>
</html>