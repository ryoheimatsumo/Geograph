<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
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
        <div class="container">
            <h1 class="text-center">Title: {{$room->title}}</h1>
            <h2 class="text-center">{{$room->descroption}}</h2>
            
            <!-- New Feeling Form -->
            <hr>
            <h2>How are you feeling?</h2>
            <div class="input-group-text" id="feeling-input" contenteditable="true">Feeling</div>
            <button class="btn btn-primary" onclick="go()">post</button>
            
            <!-- Feelings Section -->
            <hr>
            <h2>Feelings</h2>
            <div id="feeling-section"></div>
        </div>
    </body>
</html>