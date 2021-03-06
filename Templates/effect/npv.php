<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ЧДД - ВНД</title>
    <?php include_once('html/tiles/head-basic.html'); ?>
    <script type="text/javascript">
        $(document).ready(function () {

            clickSideblock(4);

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
<img src="/html/pics/icons/classify.gif" alt="effect"/>
    Показатели ЧДД и ВНД
</p>

<div class="formdatagrid">
<h3>Чистый дисконтированный доход и</h3>
<h3>Внутренняя норма доходности</h3>

<div id="datagrid">
<p>
<?php echo $chart1; ?>
<span class="table-heading1">Чистый дисконтированный доход</sub></span>
<?php echo <<<EOD
<p class="row">
<span>
<input type="input" value="Период" class="period tophead" readonly="true"/>
<input type="input" value="Величина" class="tophead" readonly="true"/>
</span>
</p>
EOD;
for ($i = 1; $i < $n + 1; $i++) {
echo <<<EOD
<p class="row">
<span>
<input type="input" class="period" value="$i" readonly="true"/>
<input type="input" class="xcell" value={$NPV[$i]} readonly="true"/>
</span>
</p>
EOD;
} ?>
</p>
    <p>
        <?php echo $chart2; ?>
        <span class="table-heading1">Внутренняя норма доходности, %</sub></span>
        <?php echo <<<EOD
<p class="row">
<span>
<input type="input" value="Период" class="period tophead" readonly="true"/>
<input type="input" value="Величина" class="tophead" readonly="true"/>
</span>
</p>
EOD;
        for ($i = 1; $i < $n + 1; $i++) {
            echo <<<EOD
<p class="row">
<span>
<input type="input" class="period" value="$i" readonly="true"/>
<input type="input" class="xcell" value={$VND[$i]} readonly="true"/>
</span>
</p>
EOD;
        } ?>
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