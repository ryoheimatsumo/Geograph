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
        <h1>GeoGraph</h1>
        
        <hr>
        <h2>Join</h2>
        <div id="rooms-section"></div>
        
        <hr>
        <h2>Create</h2>
        <label>Title</label>
        <div class="input-group-text" id="room-input-title" contenteditable="true">Room 1</div>
        <label>Description</label>
        <div class="input-group-text" id="room-input-description" contenteditable="true">Description 1</div>
        <button class="btn btn-primary" onclick="go()">create</button>
    </body>
</html>