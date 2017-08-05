$('p img').css('width','auto');
$('p img').css('height','70px');
var i = 0;
$("p img").click(function(){
	if(i%2==0){
		$(this).animate({
			height:"300px"
		});
		i++;
	}else{
		$(this).animate({
			height:'70px'
		});
		i++;
	}
});