// setInterval(tick, 5000);

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

var color;
function displayRoomData(data){
    var feelingSection = document.getElementById('feeling-section');
    var feelings = JSON.parse(data).room.feelings;
    var feelingsHtml = "";
    for(var i=0; i<feelings.length; i++){
        // feelingsHtml += "<p>" + feelings[i].content + "</p>";
    }
    feelingSection.innerHTML = feelingsHtml;
    
    //retrieve word contents to wordsObj
    var words = retrieve(feelings, 'content').sort();
    var wordsObj = {
        cnt: [],
        content: []
    };
    var index = 0; var c = 1;
    for(var i=0; i<words.length; i++){
        if(i>0 && words[i] != words[i-1]){
            index++;
            c = 1;
        }
        wordsObj.cnt[index] = c++;
        wordsObj.content[index] = words[i];
    }
    
    // remove previous
    var wCloud = document.getElementsByClassName('wordcloud');
    for(var i=0; i<wCloud.length; i++){
        wCloud[i].remove();
    }
    
    // d3-cloud
    var frequency_list = [];
    var offset = 10;
    var max_ = 150;
    for(var i=0; i<wordsObj.cnt.length; i++){
        frequency_list[i] = {
            "text": wordsObj.content[i],
            "size": (wordsObj.cnt[i]*offset >= max_) ? (max_-1) : wordsObj.cnt[i]*offset
        };
    }
    console.log({list: frequency_list});

    color = d3.scale.linear()
        .domain([0,1,2,3,4,5,6,10,15,20,100])
        .range(["#0000ff", "#ff1493", "#ffd700", "#7cfc00", "#8a2be2", "#a52a2a", "#8b008b", "#000000", "#00ffff", "#ff0000", "#330", "#220"]);

    d3.layout.cloud().size([800, 300])
        .words(frequency_list)
        .rotate(0)
        .fontSize(function(d) { return d.size; })
        .on("end", draw)
        .start();
    
    // var svgtagWCloud = document.getElementsByTagName('svg');
    // svgtagWCloud.setAttribute('style', 'width: 100%;');
}

function draw(words) {
    d3.select("body").append("div").attr("class", "container")
        .append("svg")
        .attr("width", 850)
        .attr("height", 350)
        .attr("class", "wordcloud")
        .append("g")
        // without the transform, words words would get cutoff to the left and top, they would
        // appear outside of the SVG area
        .attr("transform", "translate(320,200)")
        .selectAll("text")
        .data(words)
        .enter().append("text")
        .style("font-size", function(d) { return d.size + "px"; })
        .style("fill", function(d, i) { return color(i); })
        .attr("transform", function(d) {
            return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
        })
        .text(function(d) { return d.text; });
}

function retrieve(arr, key_){
    var res = [];
    for(var i=0; i<arr.length; i++){
        res.push(arr[i][key_]);
    }
    
    return res;
}