<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo "- $project_name -" ?></title>
<?php include_once('html/tiles/head-basic.html'); ?>
    <style type="text/css">
        .form a img {
            margin: 20px;
        }
    </style>
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
<img src="/html/pics/icons/propeller.gif" alt="preface" />
<?php echo "\" $project_name  \"" ?>
</p>
<div class="form">
<div class="lastrow">
    <p>
    <a href="/projects/project/showPrefs"><img src="/html/pics/icons/tool-big.gif" alt="preface" title="Настройки" /></a>
    <a href="/projects/around"><img src="/html/pics/icons/world-big.gif" alt="preface" title="Окружение" /></a>
    <a href="/projects/income"><img src="/html/pics/icons/income-big.gif" alt="preface" title="Доходы" /></a>
    </p>
    <p>
    <a href="/projects/costs"><img src="/html/pics/icons/outcome-big.gif" alt="preface" title="Расходы" /></a>
    <a href="/projects/effect"><img src="/html/pics/icons/effect-big.gif" alt="preface" title="Эффект" /></a>
    </p>
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

<?php include_once('html/tiles/footer.html'); ?>
</body>
</html>