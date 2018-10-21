function getRooms(){
    getGeo();
    // sendAjax({latitude: 100, longitude:10});
}

// ajax
function displayRooms(data){
    console.log(data);
}

function sendAjax(coords){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    	    displayRooms(this.responseText);
    	}
    };
    xhttp.open("GET", "https://0354c80f51ed43858e2388c9b8d44975.vfs.cloud9.us-east-2.amazonaws.com/api/find/"+coords.latitude+"/"+coords.longitude, true);
    xhttp.send();
}

// geo location stuffs
function success(pos) {
    var crd = pos.coords;
    
    sendAjax(crd);
        
    // alert('Your current position is:');
    // alert(`Latitude : ${crd.latitude}`);
    // alert(`Longitude: ${crd.longitude}`);
    // alert(`More or less ${crd.accuracy} meters.`);
    
    // var roomsSection = document.getElementById("rooms-section");
    // roomsSection.innerHTML = "<h1>what</h1>";
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