<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Расходы на материалы</title>
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
<img src="/html/pics/icons/puzzle.gif" alt="products" />
    Расходы на материалы
</p>
<form action="/usr" method="post" class="formdatagrid">
<div id="datagrid">

<? echo <<<EOD
<p class="row">
<span>
<input type="input" value="Период" class="period tophead" readonly />
<input type="input" value="Стоимость" class="tophead" readonly />
</span>
</p>
EOD;
for($i=1; $i<$n+1; $i++){
echo <<<EOD
<p class="row">
<span>
<input type="input" class="period" value="$i" readonly/>
<input type="input" class="cell"/>
</span>
</p>
EOD;
} ?>

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