<? 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");// дата в прошлом
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // всегда модифицируется
header("Cache-Control: no-store, no-cache, must-revalidate");// HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");// HTTP/1.0 
?>
<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Регистрация пользователя</title>
<? include_once('html/tiles/head-basic.html'); ?>
<script>
$(document).ready(function() {

	a = b = c = d = 0;
	
	$("#upass2").attr("disabled", true);
	
	$(".form").submit(function() {
		if ((a+b+c+d) != 4) return false;  
	});
	
	$("#ulogin").blur(function() {
		ulogin = $(this).val();
		if (ulogin == '') { a=0; $(".uloginaddon").text("Введите логин"); }
		else { a=1; $(".uloginaddon").text(""); }
	});
	
	$("#upass").keyup(function () {
		upass = $(this).val();
		if (upass == '') { b=0; $(".upassaddon").text("Введите пароль"); $("#upass2").attr("disabled", true); }
		else { b=1; $("#upass2").attr("disabled", false); $(".upassaddon").text(""); }
	});	

	$("#upass2").keyup(function () {
		upass2 = $(this).val();
		if (upass2 == '') { c=0; $(".upass2addon").text("Повторите пароль"); }
		else if ( upass2 != $("#upass").val() ) { c=0; $(".upass2addon").text("Повторили неверно!"); }
			else { c=1; $(".upass2addon").text(""); }
	});	

	$("#umail").blur(function () {
		umail = $(this).val();
		var match = /^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/.test(umail);
		if (umail == '') { d=0;  $(".umailaddon").text("Введите e-mail"); }
		else if (!match) { d=0; $(".umailaddon").text("Неверный формат e-mail"); }
			else { d=1; $(".umailaddon").text(""); }
	});		

});
</script>
</head>

<body>
<!-- Wrapper till footer -->
<div id="wrapper">
<? include_once('html/tiles/header.html'); ?>
<!-- Container for side and main -->
<div id="container">
<? include_once('html/tiles/sideblock.html'); ?>

<!-- Main area. The top level -->

<div id="main">
<!-- Block for calculations and info --> 
<!-- INSERT DATA HERE -->
<div id="info">
<p class="title">
<img src="/html/pics/icons/register.gif" alt="register" /> 
Зарегистрируйтесь в приложении
</p>
<form action="/user/register/checklogin" method="get" class="form">

<table class="common">
<tr>
<td class="lab"><label for="ulogin">Логин</label></td>
<td class="inp"><input type="input" id="ulogin" name="ulogin" /></td>
<td class="uloginaddon warn"></td> 
</tr>
<tr>
<td class="lab"><label for="upass">Пароль</label></td>
<td class="inp"><input type="password" id="upass" name="upass" /></td>
<td class="upassaddon warn"></td> 
</tr>
<tr>
<td class="lab"><label for="upass2">Повторите пароль</label></td>
<td class="inp"><input type="password" id="upass2" name="upass2" /></td>
<td class="upass2addon warn"></td> 
</tr>
<tr>
<td class="lab"><label for="umail">E-mail</label></td>
<td class="inp"><input type="input" id="umail" name="umail" /></td>
<td class="umailaddon warn"></td> 
</tr>

</table>
<div class="lastrow">
<input type="submit" class="send" value="Зарегистрироваться"/>
</div>
</form>

</div>
<!-- END Block for calculations & info -->
</div>  
<!-- END Main area. The top level -->
</div>
<!-- END Container for side and main -->
</div>
<!-- END Wrapper till footer -->

<? include_once('html/tiles/footer.html'); ?>
</body>
</html>