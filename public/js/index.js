// == main ==
setInterval(tick, 5000);
function tick(){
    getRooms();
}

function getRooms(){
    getGeo();
}

// == ajax ==
function updateDOM(jData, coords){
    displayRooms(jData);
    // updateForm(coords);
}

function displayRooms(jData){
    var rooms = JSON.parse(jData);
    console.log(rooms);
    var roomsSection = document.getElementById("rooms-section");
    
    var dom = "";
    for(var i=0; i<rooms.length; i++){
        dom += "<h2><a href=\"/" + rooms[i].id + "\">" + rooms[i].title + "</a>(" + Math.round(rooms[i].distance) + "m away)</h2>";
    }
    roomsSection.innerHTML = dom;
}

// function updateForm(coords){
//     var form = document.getElementById("create-room-form");
//     form.innerHTML+="<input type=\"hidden\" name=\"latitude\" value=\""+ coords.latitude +"\">";
//     form.innerHTML+="<input type=\"hidden\" name=\"longtitude\" value=\""+ coords.longitude +"\">";
// }

function sendAjax(coords){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    	    updateDOM(this.responseText, coords);
    	}
    };
    xhttp.open("GET", "/api/find/"+coords.latitude+"/"+coords.longitude, true);
    xhttp.send();
}

// == geo location ==
function success(pos) {
    var crd = pos.coords;
    
    sendAjax(crd);
}

var options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
};

function error(err) {
    console.log(`ERROR(${err.code}): ${err.message}`);
}

function getGeo(){
    navigator.geolocation.getCurrentPosition(success, error, options);
}

function getGeo_(cBack){
    navigator.geolocation.getCurrentPosition(cBack, error, options);
}