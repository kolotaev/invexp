<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Новый проект</title>
<?php include_once('html/tiles/head-basic.html'); ?>
<script>
$(document).ready(function() {

    var pname;
    var periods_ok;

	$(".form").submit(function() {
		if (pname == '' || !periods_ok) return false;
	});

	$("#pname").blur(function() {
        pname = $(this).val();
		if (pname == '') { $(".pnameaddon").text("Введите название"); }
		else { $(".pnameaddon").text(""); }
	});

	$("#nperiods").blur(function () {
        periods_ok = false;
        nperiods = $(this).val();
		var match = /^[0-9]+$/.test(nperiods);
		if (nperiods == '' || nperiods == 0) { $(".nperiodsaddon").text("Вводите количество");  }
		else if (!match) { $(".nperiodsaddon").text("Вводите цифры"); }
			else { $(".nperiodsaddon").text(""); periods_ok = true; }
	});
});
</script>
</head>

<body>
<!-- Wrapper till footer -->
<div id="wrapper">
<?php include_once('html/tiles/header.html'); ?>
<!-- Container for side and main -->
<div id="container">
<?php include_once('html/tiles/sideblock.html'); ?>

<!-- Main area. The top level -->

<div id="main">
<!-- Block for calculations and info --> 
<!-- INSERT DATA HERE -->
<div id="info">
<p class="title">
<img src="/html/pics/icons/pie.gif" alt="new-project" />
Новый проект
</p>
<form action="/projects/project/createProject" method="post" class="form">

<table class="common">
<tr>
<td class="lab"><label for="pname">Название</label></td>
<td class="inp"><input type="input" id="pname" name="pname" /></td>
<td class="pnameaddon warn"></td>
</tr>
<tr>
<td class="lab"><label for="nperiods">Число периодов</label></td>
<td class="inp"><input type="input" id="nperiods" name="nperiods" maxlength="2" /></td>
<td class="nperiodsaddon warn"></td>
</tr>
<tr>
<td class="lab"><label for="curr1">Основная валюта</label></td>
<td class="inp">
    <select id="curr1" name="curr1">
        <option selected value="th-rub">Тыс. руб.</option>
        <option value="rub">Руб.</option>
        <option value="dollar">Dollar ($)</option>
        <option value="euro">Euro</option>
    </select>
</td>
<td class="curr1addon warn"></td>
</tr>
<tr>
<td class="lab"><label for="curr2">Иностранная валюта</label></td>
<td class="inp">
    <select id="curr2" name="curr2">\
        <option selected value="dollar">Dollar ($)</option>
        <option value="euro">Euro</option>
        <option value="rub">Руб.</option>
    </select>
</td>
<td class="curr2addon warn"></td>
</tr>
<tr>
<td class="lab"><label for="description">Описание проекта</label></td>

<td class="inp"><textarea rows="5" cols="5" id="description" name="description"></textarea></td>
<td class="descriptionaddon warn"></td>
</tr>

</table>
<div class="lastrow">
<input type="submit" class="send" value="Создать"/>
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

<?php include_once('html/tiles/footer.html'); ?>
</body>
</html>