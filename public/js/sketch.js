// Main
var frame_ = 0;
var words_ = [];

function setup(){
    Init();
}

function draw(){
    Update();
    Flip();
    Draw();
}

// Sketch Sequence
function Init(){
    frame_ = 0;
    words_ = [];
    
    createCanvas(640, 480);
    background(100);
}

function Update(){
    frame_++;
}

function Flip(){
    background(100);
}

function Draw(){
    text(frame_, width/2, height/2);
}

// Class
class Word{
    constructor(position, content, color){
        this.position = position;
        this.content = content;
        this.color = color;
        this.counter = 1;
    }
    
    Update(){
        
    }
    
    Draw(){
        fill(this.color);
        fontSize(14);
        text(this.content, this.position.x, this.position.y);
    }
}

// Others
function onDataArrived(data){
    words_ = retrieve(data, 'content');
}

function retrieve(arr, key){
    var resArr = [];
    arr.forEach(function(e){
        resArr.push(e[key]);
    });
    
    return resArr;
}