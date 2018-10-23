setInterval(tick, 5000);

function tick(){
    update();
}

function update(){
    // ajax
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    	    displayRoomData(this.responseText);
    	}
    };
    xhttp.open("GET", "/api/roomdata/"+room_id, true);
    xhttp.send();
}

function displayRoomData(data){
    var feelingSection = document.getElementById('feeling-section');
    var feelings = JSON.parse(data).room.feelings;
    var feelingsHtml = "";
    for(var i=0; i<feelings.length; i++){
        feelingsHtml += "<p>" + feelings[i].content + "</p>";
    }
    feelingSection.innerHTML = feelingsHtml;
    
    // from sketch.js
    onDataArrived(feelings);
}