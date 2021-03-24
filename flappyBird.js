var cvs = document.getElementById("canvas");
var ctx = cvs.getContext("2d");

var bird = new Image();
var background = new Image();
var floor = new Image();
var pipeTop = new Image();
var pipeDown = new Image();

bird.src = "images/bird.png";
background.src = "images/background.png";
floor.src = "images/floor.png";
pipeTop.src = "images/pipeTop.png";
pipeDown.src = "images/pipeDown.png";

var gap = 85;
var constant;

var bX = 10;
var bY = 150;

var gravity = 1.5;

var score = 0;

// sounds

var fly = new Audio();
var scor = new Audio();

scor.src = "sounds/score.mp3";

//press on keys

document.addEventListener("keydown",moveUp);

function moveUp(){
    bY -= 25;
    fly.play();
}

// pipe locations

var pipe = [];

pipe[0] = {
    x : cvs.width,
    y : 0
};

// draw images

function draw(){
    
    ctx.drawImage(background,0,0);
    
    
    for(var i = 0; i < pipe.length; i++){
        
        constant = pipeTop.height+gap;
        ctx.drawImage(pipeTop,pipe[i].x,pipe[i].y);
        ctx.drawImage(pipeDown,pipe[i].x,pipe[i].y+constant);
             
        pipe[i].x--;
        
        if( pipe[i].x == 125 ){
            pipe.push({
                x : cvs.width,
                y : Math.floor(Math.random()*pipeTop.height)-pipeTop.height
            }); 
        }
        
        if( bX + bird.width >= pipe[i].x && bX <= pipe[i].x + pipeTop.width && (bY <= pipe[i].y + pipeTop.height || bY+bird.height >= pipe[i].y+constant) || bY + bird.height >=  cvs.height - floor.height){
            location.reload(); // restart game
        }
        
        if(pipe[i].x == 5){
            score++;
            scor.play();
        }

    }

    ctx.drawImage(floor,0,cvs.height - floor.height);
    
    ctx.drawImage(bird,bX,bY);
    
    bY += gravity;
    
    ctx.fillStyle = "#000";
    ctx.font = "20px Verdana";
    ctx.fillText("Score : "+score,10,cvs.height-20);
    
    requestAnimationFrame(draw);
    
}

draw();
























