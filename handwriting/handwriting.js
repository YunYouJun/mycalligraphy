var canvasWidth =Math.min(800,Math.min($(window).height()-140 , $(window).width() - 20 ));
var canvasHeight = canvasWidth;

var strokeColor = "black";
var isMouseDown = false;
var lastLoc = {x:0,y:0};
var lastTimestamp = 0;
var lastLineWidth = -1;

var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");

var bgcanvas = document.getElementById("bgcanvas");
var bgcontext = bgcanvas.getContext("2d");

var Ccanvas = document.getElementById("CharacterCanvas");
var Ccontext = bgcanvas.getContext("2d");


var device;

canvas.width = canvasWidth;
canvas.height = canvasHeight;

bgcanvas.width = canvasWidth;
bgcanvas.height = canvasHeight;

Ccanvas.width = canvasWidth;
Ccanvas.height = canvasHeight;

$("#controller").css("width",canvasWidth+"px");
drawGrid();

$("#clear_btn").click(
    function(e){
        context.clearRect( 0 , 0 , canvasWidth, canvasHeight );
        drawGrid();
    }
    );
$(".color_btn").click(
    function(e){
        $(".color_btn").removeClass("color_btn_selected");
        $(this).addClass("color_btn_selected");
        if($(this).is('#ColorPick')){
            //strokeColor = $('#ColorPick').val();
        }else{
            strokeColor = $(this).css("background-color");
        }
        console.log($(this).css("background-color"));
    }
    );

function beginStroke(point){
    if($('.color_btn_selected').val()){
        strokeColor = $('.color_btn_selected').val();
    }
    isMouseDown = true;
    //console.log("mouse down!")
    lastLoc = windowToCanvas(point.x, point.y);
    lastTimestamp = new Date().getTime();
}
function endStroke(){
    isMouseDown = false;
}
function moveStroke(point,device){

    var curLoc = windowToCanvas( point.x , point.y );
    var curTimestamp = new Date().getTime();
    var s = calcDistance( curLoc , lastLoc );
    var t = curTimestamp - lastTimestamp;

    var lineWidth = calcLineWidth( t , s ,device);

    //draw
    context.beginPath();
    context.moveTo( lastLoc.x , lastLoc.y );
    context.lineTo( curLoc.x , curLoc.y );

    context.strokeStyle = strokeColor;
    context.lineWidth = lineWidth;
    context.lineCap = "round";
    context.lineJoin = "round";
    context.stroke();

    lastLoc = curLoc;
    lastTimestamp = curTimestamp;
    lastLineWidth = lineWidth;
}

canvas.onmousedown = function(e){
    e.preventDefault();
    beginStroke( {x: e.clientX , y: e.clientY} );
};
canvas.onmouseup = function(e){
    e.preventDefault();
    endStroke();
};
canvas.onmouseout = function(e){
    e.preventDefault();
    endStroke();
};
canvas.onmousemove = function(e){
    e.preventDefault();
    if( isMouseDown ){
        moveStroke({x: e.clientX , y: e.clientY},'pc');
    }
};

canvas.addEventListener('touchstart',function(e){
    e.preventDefault();
    touch = e.touches[0];
    beginStroke( {x: touch.pageX , y: touch.pageY} );
});
canvas.addEventListener('touchmove',function(e){
    e.preventDefault();
    if( isMouseDown ){
        touch = e.touches[0];
        moveStroke({x: touch.pageX , y: touch.pageY},'phone');
    }
});
canvas.addEventListener('touchend',function(e){
    e.preventDefault();
    endStroke();
});

var maxLineWidth = canvasWidth/22;
var minLineWidth = 1;
var maxStrokeV = 10;
var minStrokeV = 0.1;
var rate = 2;
function calcLineWidth( t , s ,device){

    var v = s / t;

    var resultLineWidth;
    if( v <= minStrokeV )
        resultLineWidth = maxLineWidth;
    else if ( v >= maxStrokeV )
        resultLineWidth = minLineWidth;
    else if(device=='pc'){
        resultLineWidth = maxLineWidth - (v-minStrokeV)/(maxStrokeV-minStrokeV)*(maxLineWidth-minLineWidth)*rate;
    }
    else if(device=='phone'){
     // var rate = 2*Math.cos((v-minStrokeV)/(maxStrokeV-minStrokeV)*Math.PI/2)+1;
     resultLineWidth = maxLineWidth - (v-minStrokeV)/(maxStrokeV-minStrokeV)*(maxLineWidth-minLineWidth)*rate;
 }

    if( lastLineWidth == -1 ){
        return resultLineWidth;
    }
    if (resultLineWidth<=0) {
        resultLineWidth = minLineWidth;
    }
    //return resultLineWidth*1/3 + lastLineWidth*2/3;
    return Math.sqrt(resultLineWidth*resultLineWidth*1/3 + lastLineWidth*lastLineWidth*2/3);
}

function calcDistance( loc1 , loc2 ){

    return Math.sqrt( (loc1.x - loc2.x)*(loc1.x - loc2.x) + (loc1.y - loc2.y)*(loc1.y - loc2.y) );
}

function windowToCanvas( x , y ){
    var bbox = canvas.getBoundingClientRect();
    return {x:Math.round(x-bbox.left) , y:Math.round(y-bbox.top)};
}
function drawGrid(){

    bgcontext.save();

    bgcontext.strokeStyle = "rgb(230,11,9)";

    bgcontext.beginPath();
    bgcontext.moveTo( 3 , 3 );
    bgcontext.lineTo( canvasWidth - 3 , 3 );
    bgcontext.lineTo( canvasWidth - 3 , canvasHeight - 3 );
    bgcontext.lineTo( 3 , canvasHeight - 3 );
    bgcontext.closePath();
    bgcontext.lineWidth = 6;
    bgcontext.stroke();

    bgcontext.beginPath();
    bgcontext.lineWidth = 3;
    // context.moveTo(0,0)
    // context.lineTo(canvasWidth,canvasHeight)
    drawDashLine(bgcontext,0,0,canvasWidth,canvasHeight,12);
    // context.moveTo(canvasWidth,0)
    // context.lineTo(0,canvasHeight)
    drawDashLine(bgcontext,canvasWidth,0,0,canvasHeight,12);
    // context.moveTo(canvasWidth/2,0)
    // context.lineTo(canvasWidth/2,canvasHeight)
    drawDashLine(bgcontext,canvasWidth/2,0,canvasWidth/2,canvasHeight,12);
    // context.moveTo(0,canvasHeight/2)
    // context.lineTo(canvasWidth,canvasHeight/2)
    drawDashLine(bgcontext,0,canvasHeight/2,canvasWidth,canvasHeight/2,12);
    // context.stroke()

    bgcontext.restore();
}

function getBeveling(x,y)  
{  
    return Math.sqrt(Math.pow(x,2)+Math.pow(y,2));  
}  

function drawDashLine(context,x1,y1,x2,y2,dashLen)  
{  
    dashLen = dashLen === undefined ? 5 : dashLen;  
    //得到斜边的总长度  
    var beveling = getBeveling(x2-x1,y2-y1);  
    //计算有多少个线段  
    var num = Math.floor(beveling/dashLen);  

    for(var i = 0 ; i < num; i++)  
    {  
        context[i%2 === 0 ? 'moveTo' : 'lineTo'](x1+(x2-x1)/num*i,y1+(y2-y1)/num*i);  
    }  
    context.stroke();  
}  

function CreateCharacter(){
    Ccontext.clearRect( 0 , 0 , canvasWidth, canvasHeight );
    drawGrid();

    var mycharacter = $('#inputCharacter').val();
    var fontsize = canvasWidth - 72;
    //设置字体样式
    Ccontext.font = fontsize + "px " + fontname;
    //设置字体填充颜色
    Ccontext.fillStyle = 'rgba(100,100,100,0.4)';
    Ccontext.fillText(mycharacter, 36,canvasHeight-108);
}

function CalculateScore(){
    var TraceData = context.getImageData(0,0,canvas.width,canvas.height);
    var CharacterData = Ccontext.getImageData(0,0,canvas.width,canvas.height);
    // context.putImageData(TraceData,0,0);
    var InNumber= 0;
    var OutNumber=0; 
    var TraceDataNumber =0;
    var CharacterDataNumber =0;
    for (var i=0;i<TraceData.data.length;i+=4)
    {
        if (CharacterData.data[i+3]>0) {
            CharacterDataNumber++;
        }
        if(TraceData.data[i+3]>0&&CharacterData.data[i+3]>0){
            InNumber++;
        }
        if(TraceData.data[i+3]>0&&CharacterData.data[i+3]==0){
            OutNumber++;
        }
    }
    var InRatio = 2.5-(InNumber+OutNumber)/CharacterDataNumber;
    // alert(InNumber+" "+OutNumber+" "+TraceDataNumber+" "+CharacterDataNumber);
    var score = Math.ceil(((InRatio*InNumber+(-1)*OutNumber)/CharacterDataNumber)*100);
    var scoreText = "先临摹哦！";
    if(score>100){
        scoreText="100!<br>太棒啦！";
        score = 100;
    }else if(score<=0){
        scoreText="<h1>先临摹!<br>莫捣乱~</h1>";
    }else{
        scoreText = score;
    }
    $('#ScoreText').html(scoreText);
    $('#ScoreShow').modal('show');
    return score;
}
$('#CalScoreBtn').click(function(){
    var score = CalculateScore();
    if(score>0){
        $.ajax({
         type: "GET",
         url: "../doAction.php",
         data: {act:'TraceRecord',tsCharacter:$('#inputCharacter').val(),score:score,fontfamily:fontname},
         dataType: "json",
         success: function(data){
                    alert("success");
                  }
        });
    }
});

$('#MyLineWidth').val(Math.round(maxLineWidth));

function changeLineWidth(){
    maxLineWidth = $('#MyLineWidth').val();
}