<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Рентабельность основных показателей</title>
<? include_once('html/tiles/head-basic.html'); ?>
    <script type="text/javascript">
        $(document).ready(function() {

            clickSideblock(4);

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
<img src="/html/pics/icons/classify.gif" alt="effect" />
    Рентабельность
</p>

<div class="formdatagrid">
<h3>Продукция - Продажи</h3>
<div id="datagrid">
<? echo $chart1; ?>
<table>
<tr>
<td>
<? echo <<<EOD
<p class="row">
<span>
<input type="input" value="Период" class="period tophead" readonly />
<input type="input" value="Сумма расходов" class="tophead" />
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
</td>
<td>
<? echo <<<EOD

<p class="row">
<span>
<input type="input" value="Период" class="period tophead" readonly />
<input type="input" value="Сумма расходов" class="tophead" />
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
</td></tr></table>
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