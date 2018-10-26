// Main
const TEXT_SIZE_MAX = 300;
const TEXT_SIZE_MIN = 15;
const SPD_MAX = {x: 1, y: 1};
const SPD_MIN = {x: -1, y: -1};
const COLOR_MAX = {r: 230, g: 230, b: 230};
const COLOR_MIN = {r: 150, g: 150, b: 150};

var words = [];

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
    var canvas = createCanvas(window.innerWidth, window.innerHeight);
    canvas.parent('sketch');
    var navbar = document.getElementsByTagName('nav')[0];
    var sketch = document.getElementById('sketch');
    var emoji = document.getElementById('emoji');
    sketch.setAttribute('style', 'top: -'+ (emoji.offsetHeight+navbar.offsetHeight) +';');
    
    background(100);
    
    var wordsRaw = retreiveWordContentsFromFeelings(feelings_);
    console.log(wordsRaw.cnt);
    for(var i=0; i<wordsRaw.cnt.length; i++){
        var obj = new Word(
            createVector(random(width), random(height)), 
            createVector(random(SPD_MIN.x, SPD_MAX.y), random(SPD_MIN.x, SPD_MAX.y)), 
            wordsRaw.content[i], 
            color(random(COLOR_MIN.r, COLOR_MAX.r), random(COLOR_MIN.g, COLOR_MAX.g), random(COLOR_MIN.b, COLOR_MAX.b)),
            wordsRaw.cnt[i] / feelings_.length
        );
        words.push(obj);
    }
}

function Update(){
    for(var i=0; i<words.length; i++){
        words[i].Update();
    }
}

function Flip(){
    clear();
    background(0, 0, 0, 10);
}

function Draw(){
    for(var i=0; i<words.length; i++){
        words[i].Draw();
    }
}

// Class
class Word{
    constructor(position, spd, content, color, rate){
        this.position = position;
        this.spd = spd;
        this.content = content;
        this.color = color;
        this.rad = rate * HALF_PI;
        this.tSize = sin(this.rad) * TEXT_SIZE_MAX;
        if(this.tSize < TEXT_SIZE_MIN) this.tSize = TEXT_SIZE_MIN;
    }
    
    Update(){
        this.position.add(this.spd);
        if(this.position.x < 0 || this.position.x > width){
            this.spd.x *= -1;
        }
        if(this.position.y < 0 || this.position.y > height){
            this.spd.y *= -1;
        }
    }
    
    Draw(){
        fill(this.color);
        textSize(this.tSize);
        textAlign(CENTER);
        text(this.content, this.position.x, this.position.y);
    }
}

// Others
function retrieve(arr, key){
    var resArr = [];
    arr.forEach(function(e){
        resArr.push(e[key]);
    });
    
    return resArr;
}

function retreiveWordContentsFromFeelings(feelings){
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
    
    return wordsObj;
}