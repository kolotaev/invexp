<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Аренда и оборудование</title>
<? include_once('html/tiles/head-basic.html'); ?>
    <script type="text/javascript">
        $(document).ready(function() {

            clickSideblock(3);

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
<img src="/html/pics/icons/factory.gif" alt="rent" />
    Аренда и оборудование
</p>

<div id="datagrid">
<table><tr><td><form>zekjhf</form></td><td><form>ejwhk</form></td></tr></table>
<? echo <<<EOD
<p class="row">
<span>
<input type="input" value="Период" class="period tophead" readonly />
<input type="input" value="Стоимость аренды" class="tophead" readonly />
<input type="input" value="Оборудование" class="tophead" readonly />
</span>
</p>
EOD;
for($i=1; $i<$n+1; $i++){
echo <<<EOD
<p class="row">
<span>
<input type="input" class="period" value="$i" readonly/>
<input type="input" class="cell"/>
<input type="input" class="cell"/>
</span>
</p>
EOD;
} ?>

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