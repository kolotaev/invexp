<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Оплата труда</title>
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
<img src="/html/pics/icons/hand.gif" alt="hands" />
    Оплата труда
</p>
<form action="/projects/costs/save" method="post" class="formdatagrid">
<div id="datagrid">

<? echo <<<EOD
<p class="row">
<span>
<input type="input" value="Период" class="period tophead" readonly="true"/>
<input type="input" value="ФОТ" class="tophead" readonly="true"/>
</span>
</p>
EOD;
for($i=1; $i<=$n; $i++){
echo <<<EOD
<p class="row">
<span>
<input type="input" class="period" value="$i" readonly="true"/>
<input type="input" name="costs.payment.$i" value="{$data[$i]}" class="cell"/>
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