<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Войти в приложение</title>
<? include_once('html/tiles/head-basic.html'); ?>
<script>
$(document).ready(function() {
	$(".form").submit(function() {
		login = $("#ulogin").val();
		pass = $("#upass").val();
		if ( (login == '') | (pass == '')) return false;
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
<img src="/html/pics/icons/enter.gif" alt="enter" />  
Войдите в приложение
</p>
<form action="/user/login/checkLogin" method="post" class="form">

<table class="entercommon">
<tr>
<td class="lab"><label for="ulogin">Ваш логин</label></td>
<td class="inp"><input type="input" id="ulogin"/></td>
</tr>
<tr>
<td class="lab"><label for="upass">Ваш пароль</label></td>
<td class="inp"><input type="password" id="upass"/></td>
</tr>
</table>

<div class="lastrow">
<input type="submit" class="send" value="Войти"/>
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