// JavaScript Document
//(y*pic_width+x)*4;坐标和具体值的转换关系
var c;//canvas
var ctx;//context
var imgdata;//汉字的图像
var imgactdata;//拓印的图像
var imgaction;//显示动画的图像
var imgmark=new Array();//每一笔的图像
var pic_width=0;//图片宽度
var pic_height=0;//图片长度
var img_i;
var timer1;//绘画线程
var img_n=1;//放大倍数

var _nl=0;//骨架的长度
var _cr=1;//当前半径
var _cx=0;//当前x坐标
var _cy=0//当前y坐标
var _startarray=new Array(26,5,15,18);
var _num=0;
var _skeleton=new Array("455555565556565556556555556","7070700707070707077070000000000000000");
//var _skeleton=new Array("655555655655565655565555554","0000000000000000707707070707070070707");
var _str;//存储骨架字符串
var _fle=0;
var _flag=1;
var _sum1;
var _sum2;

function test1()
{
	ctx.drawImage(imgdata,0,0,pic_width*img_n,pic_height*img_n);
	console.log("test");
}
function drawPoint(x,y)
{
	try{
	img_i=(y*pic_width+x)*4;
	if(img_i<imgaction.data.length)
	{
		/*for(var j=0;j<n;j++)
		{
			imgaction.data[i+0+4*n]=0;
			imgaction.data[i+1+4*n]=0;
			imgaction.data[i+2+4*n]=0;
			imgaction.data[i+3+4*n]=255;
		}
		i=i+4*n;*/
		imgaction.data[img_i+0]=0;
		imgaction.data[img_i+1]=0;
		imgaction.data[img_i+2]=0;
		imgaction.data[img_i+3]=255;
//		i=i+4;i=(x*pic_width+y)*4
	}
	ctx.putImageData(imgaction,0,0);}catch (e) {alert(e.message)} 
}
function cleandata()
{
	for(var i=0;i<imgaction.data.length;i=i+4)
	{
		imgaction.data[i+0]=255;
		imgaction.data[i+1]=255;
		imgaction.data[i+2]=255;
		imgaction.data[i+3]=255;
	}
	ctx.putImageData(imgaction,0,0);
}
function runAction()
{
//	alert("flag:"+_flag);
	switch(_flag)
	{
		case 1:
			_flag=Astart();
			break;
		case 2:
			_flag=Ostart();
			break;
		case 3:
			_flag=next();
			break;
		case 4:
			_flag=Ostart();
			break;
		case 5:
			stopAction();
			break;
	}
}
function Astart()
{
//	alert("jinlaile");
	_str=_skeleton[_num/2];
	_cx=_startarray[_num++];
	_cy=_startarray[_num++];
	_fle=0;
	Lwrite();
	
	if(_fle==1)
	{
//		alert("4");
		return 4;
	}
	else
	{
//		alert("3");
		return 3;
	}
}
function Ostart()
{
//	alert("Ostart");
	if(_startarray.length>=_num)
	{
		_str=_skeleton[_num/2];
		_cx=_startarray[_num++];
		_cy=_startarray[_num++];
		_nl=0;
	}
	else
	{
		return 5;
	}
	_fle=0;
	Lwrite();
	if(_fle==1)
	{
		return 4;
	}
	else
	{
		return 3;
	}
}
function next()
{
//	alert("next :"+_str+"x:"+_cx+"y:"+_cy);
	_fle=0;
	Lwrite();
	if(_fle==1)
	{
		return 4;
	}
	else
	{
		return 3;
	}
}
function getPixelData(x,y)
{
//	alert("getpixes");
	var ifblack=1;
	img_i=(y*pic_width+x)*4;
	if(img_i<imgactdata.data.length)
	{
//	alert(imgactdata.data[img_i]);
	if(imgactdata.data[img_i]>100)
	{
		ifblack=0;
	}
//	alert(ifblack);
	return ifblack;
	}
	return 0;
}
function learnR()
{
//	alert("learnR");
	var i;
	var j;
	sum1=0;
	sum2=0;
//	alert("sum2:"+sum2+"___sum1:"+sum1);
	for(i=-_cr;i<=_cr;i++)
	{
		for(j=-_cr;j<=_cr;j++)
		{
			//try{
			if(Math.sqrt(Math.pow(i,2)+Math.pow(j,2))<=_cr)
			{
				sum1++;
				if(getPixelData(_cx+i,_cy+j)==1)
				sum2++;
			}// }catch (e) {alert(e.message)}  
		}
	}
//	alert("sum2:"+sum2+"___sum1:"+sum1);
	if((sum2/sum1)>0.99)
	{
		return 1;
	}
	return 0;
}
function Lwrite()
{
//	alert("lwrite:___x:"+_cx+"___y:"+_cy);
	var i;
	var j;
	_cr=1;
	while(learnR()==1)
	{
		_cr++;
//		alert("cr:"+_cr);
	}
//	alert("cr:"+_cr);
	for(i=-_cr;i<=_cr;i++)
	{
		for(j=-_cr;j<_cr;j++)
		{
			if(Math.sqrt(Math.pow(i,2)+Math.pow(j,2))<=_cr)
			{
				if(getPixelData(_cx+i,_cy+j)==1)
				{
					drawPoint(_cx+i,_cy+j);
				}
			}
		}
	}
	ex();
}
function ex()
{
	//console.log("ex:___x:"+_cx+"___y:"+_cy+"___NL:"+_nl+"str.length:"+_str.length);
	if(_nl>_str.length)
	{
		_fle=1;
	}
	switch(_str[_nl])
	{
		case "0":
			_cx++;
			break;
		case "1":
			_cx++;
			_cy--;
			break;
		case "2":
			_cy--;
			break;
		case "3":
			_cx--;
			_cy--;
			break;
		case "4":
			_cx--;
			break;
		case "5":
			_cx--;
			_cy++;
			break;
		case "6":
			_cy++;
			break;
		case "7":
			_cx++;
			_cy++;
			break;
		default:
			break;
	}
//	alert("ex:___x:"+_cx+"___y:"+_cy);
	_nl++;
}


function startAction()
{

	_num=0;
	img_i=0;
	img_n=1;
	imgaction=ctx.createImageData(pic_width*img_n,pic_height*img_n);	
	_flag=1;
	timer1=setInterval(runAction,50);
	
}
function stopAction()
{
	clearInterval(timer1);
//	cleandata();
}
function cleanCanvas()
{
	ctx.clearRect(0,0,pic_width,pic_height);
/*	ctx.fillStyle="#FFFFFF";  
    ctx.beginPath();  
    ctx.fillRect(0,0,c.width,c.height);  
    ctx.closePath();*/
}

function initallvalue()
{

var pic_width=0;//图片宽度
var pic_height=0;//图片长度
var img_i;
var timer1;//绘画线程
var img_n=1;//放大倍数

var _nl=0;//骨架的长度
var _cr=1;//当前半径
var _cx=0;//当前x坐标
var _cy=0//当前y坐标
var _startarray=new Array(26,5,15,18);
var _num=0;
var _skeleton=new Array("455555565556565556556555556","7070700707070707077070000000000000000");
var _str;//存储骨架字符串
var _fle=0;
var _flag=1;

	c=document.getElementById('canvas');
	ctx=c.getContext('2d');
	imgdata=new Image();
	imgdata.src="binary.jpg";
	pic_width=56;
	pic_height=36;
	ctx.drawImage(imgdata,0,0);
	 try {
		imgactdata=ctx.getImageData(0,0,pic_width,pic_height);
/*		for (var i=0;i<imgactdata.data.length;i+=4)
  {
  imgactdata.data[i]=255-imgactdata.data[i];
  imgactdata.data[i+1]=255-imgactdata.data[i+1];
  imgactdata.data[i+2]=255-imgactdata.data[i+2];
  imgactdata.data[i+3]=255;
  }*/
//	ctx.putImageData(imgactdata,0,0);
		cleanCanvas();
	     }catch (e) {alert(e.message)}  
	
}


function test2()
{
	//ctx.putImageData(imgactdata,0,0);
	ctx.drawImage(imgdata,0,0);
}
function test5()
{
	imgaction=ctx.createImageData(56,36);
	var i;
	var j;
	for(i=1;i<56;i++)
	{
		for(j=1;j<36;j++)
		{
			if(getPixelData(i,j)==1)
				{
					//alert("getuin");
					img_i=(j*pic_width+i)*4;
					imgaction.data[img_i+0]=imgactdata.data[img_i+0];
					imgaction.data[img_i+1]=imgactdata.data[img_i+1];
					imgaction.data[img_i+2]=imgactdata.data[img_i+2];
					imgaction.data[img_i+3]=imgactdata.data[img_i+3];
					ctx.putImageData(imgaction,0,0);
				}
/*			img_i=(i*pic_width+j)*4;
			imgaction.data[img_i+0]=imgactdata.data[img_i+0];
			imgaction.data[img_i+1]=imgactdata.data[img_i+1];
			imgaction.data[img_i+2]=imgactdata.data[img_i+2];
			imgaction.data[img_i+3]=imgactdata.data[img_i+3];
			ctx.putImageData(imgaction,0,0);*/
		}
	}
}
function test6()
{
	alert("wid"+pic_width+"hei"+pic_height);
	 try {


           imgactdata=ctx.getImageData(0,0,pic_width,pic_height);

       
	
	alert("1");
/*	for (var i=0;i<imgactdata.data.length;i+=4)
  {
  imgactdata.data[i]=255-imgactdata.data[i];
  imgactdata.data[i+1]=255-imgactdata.data[i+1];
  imgactdata.data[i+2]=255-imgactdata.data[i+2];
  imgactdata.data[i+3]=255;
  }*/
	ctx.putImageData(imgactdata,0,0);
	alert("2");
	 }

        catch (e) {alert(e.message)}  
}