<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <script type="text/javascript" src="{{secure_asset('js/index.js')}}"></script>
        <script type="text/javascript">getRooms();</script>
        <script type="text/javascript">
            var lat_ = 0;
            var long_ = 0;
            getGeo_(cBack_);
            function cBack_(pos){
                lat_ = pos.coords.latitude;
                long_ = pos.coords.longitude;
            }
            
            function go(){
                var xhttp_ = new XMLHttpRequest();
                xhttp_.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                        getRooms();
                    }
                };
                var title = document.getElementById("room-input-title").innerText;
                var description = document.getElementById("room-input-description").innerText;
                xhttp_.open("GET", "/room/create/"+title+"/"+description+"/"+lat_+"/"+long_, true);
                xhttp_.send();
            }
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">PUTIPUTI</a>
        </nav>
        <div class="container">
            <hr>
            <h2>New Room</h2>
            <label>Where are you?</label>
            <div class="input-group-text" id="room-input-title" contenteditable="true">Room 1</div>
            <label>What do you wanna do?</label>
            <div class="input-group-text" id="room-input-description" contenteditable="true">Description 1</div>
            <button class="btn btn-info" onclick="go()">create</button>
            
            <hr>
            <h2>Join</h2>
            
            <div id="rooms-section" class="row"></div>
        </div>
    </body>
</html>