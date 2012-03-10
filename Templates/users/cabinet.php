<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Кабинет пользователя</title>
<? include_once('html/tiles/head-basic.html'); ?>
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
<img src="/html/pics/icons/usercabinet.gif" alt="cabinet" />  
Кабинет пользователя 
</p>
<div class="form">

<table class="cabinetinfotable">
<tr>
<td class="lab">Логин</td>
<td class="inp">????????</td>
</tr>
<tr>
<td class="lab">E-mail</td>
<td class="inp">???????</td>
</tr>
<tr>
<td class="lab">Проекты</td>
<td class="inp">
<ol>
<li>????</li>
<li>????</li>
</ol>
</td>
</tr>
<tr>
<td class="lab">Файлы</td>
<td class="inp">???????</td>
</tr>
</table>
</div>

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