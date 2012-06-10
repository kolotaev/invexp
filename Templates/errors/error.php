<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ошибка!</title>
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
<img src="/html/pics/icons/error.gif" alt="error" /> 
Произошла ошибка!
</p>

<div class="errormessage">
<p>
Извините, но произошла ошибка. Надеемся, что скоро мы ее исправим :)
</p>
<div class="textmessage">
Техническая информация: <br />
<pre>
<? echo $errormessage; ?>
</pre>
</div>
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