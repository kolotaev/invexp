<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Настройки проекта</title>
<? include_once('html/tiles/head-basic.html'); ?>
<script type="text/javascript">
$(document).ready(function() {

    var periods_ok = true;

	$(".form").submit(function() {
		if (!periods_ok) return false;
	});

	$("#nperiods").blur(function () {
        periods_ok = false;
        nperiods = $(this).val();
		var match = /^[0-9]+$/.test(nperiods);
		if (nperiods == '' || nperiods == 0) { $(".nperiodsaddon").text("Вводите количество");  }
		else if (!match) { $(".nperiodsaddon").text("Вводите цифры"); }
			else { $(".nperiodsaddon").text(""); periods_ok = true; }
	});

    $("#curr1 [value='<? echo $data['currency1'] ?>']").attr("selected", "selected");
    $("#curr2 [value='<? echo $data['currency2'] ?>']").attr("selected", "selected");

    // clicks the sideblock menu
    clickSideblock(0);
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
<img src="/html/pics/icons/tool.gif" alt="prefs" />
Настройки проекта
</p>
<form action="/projects/project/updateProject" method="post" class="form">

<table class="common">
<tr>
<td class="lab"><label for="nperiods">Число периодов</label></td>
<td class="inp"><input type="input" id="nperiods" value="<?echo $data['periods']?>" name="nperiods" maxlength="2" /></td>
<td class="nperiodsaddon warn"></td>
</tr>
<tr>
<td class="lab"><label for="curr1">Основная валюта</label></td>
<td class="inp">
    <select id="curr1" name="curr1">
        <option value="th-rub">Тыс. руб.</option>
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
        <option value="dollar">Dollar ($)</option>
        <option value="euro">Euro</option>
        <option value="rub">Руб.</option>
    </select>
</td>
<td class="curr2addon warn"></td>
</tr>
<tr>
<td class="lab"><label for="description">Описание проекта</label></td>

<td class="inp"><textarea rows="5" cols="5" id="description" name="description">
<? echo $data['description'] ?>
</textarea></td>
<td class="descriptionaddon warn"></td>
</tr>

</table>
<div class="lastrow">
<input type="submit" class="send" value="Сохранить"/>
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