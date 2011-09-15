<html>
<head>
<title>Does my train have WiFi?</title>
<style>
body {
font-family: Helvetica, Arial, Verdana, sans-serif;
margin-top: 5%;
text-align:center;
}
.dateinput {
font-size:24px;
text-align:center;
color:#888888;
}
.datetext {
width:55px;
}
.yeartext {
width:70px;
}
.hide {
display:none;
}
</style>
</head>

<body>
<h1>Does my train have WiFi?</h1>
<p>Please enter the date and time:</p>
<form action="/test" method="post" id="dateform">
<span class="dateinput"><input type="text" id="day" name="day" value="DD" class="dateinput datetext"/>/<input type="text" name="day" id="month" value="MM" class="dateinput datetext"/>/<input type="text" id="year" name="year" value="11" class="dateinput yeartext" disabled/> AT <input id="hour" type="text" name="day" value="HH" class="dateinput datetext"/>:<input type="text" name="day" value="MM" id="minute" class="dateinput datetext"/> ON ROUTE <select name="to" id="to" class="dateinput"><option value="dc">Dublin - Cork</option><option value="cd">Cork - Dublin</option></select></span><input type="submit" class="hide"/></form>
<h1 id="response"></h1>
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.datetext').focus(function(){
		if(isNaN( $(this).val() )){
			$(this).val('');
			$(this).css('color','#000000');
		}
	});
	$("#dateform").submit(function(){
		var day = $('#day').val();
		var month = $('#month').val();
		var year = $('#year').val();
		var hour = $('#hour').val();
		var minute = $('#minute').val();
		var route = $('#to').val();
		var query = "day="+day+"&month="+month+"&year="+year+"&hour="+hour+"&minute="+minute+"&route="+route;
		$.get('http://orchestratest/awesome/does_train_have_wifi',query,function(data){
			$("#response").html(data);
		});
		return false;
	});
});
</script>
</html>
