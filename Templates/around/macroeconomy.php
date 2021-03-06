<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Макроэкономическое окружение</title>
<?php include_once('html/tiles/head-basic.html'); ?>
    <script type="text/javascript">
        $(document).ready(function() {

            clickSideblock(1);

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
<img src="/html/pics/icons/world.gif" alt="macro" />
Макроэкономическое окружение
</p>
<form action="/projects/around/save" method="post" class="formdatagrid">
<div id="datagrid">

<p class="row">
<span>
<input type="input" value="Показатель" class="side tophead" readonly="true"/>
<input type="input" value="Значение" class="tophead" readonly="true"/>
</span>
</p>
<p class="row">
<span>
<input type="input" value="Темп роста цен, %" class="side" readonly="true"/>
<input type="input" name="around.macro.prise_rise_tempo" value="<?php echo $data['prise_rise_tempo'] ?>" class="cell"/>
</span>
</p>
<p class="row">
<span>
<input type="input" value="Курс валюты" class="side" readonly="true"/>
<input type="input" name="around.macro.currency_rate" value="<?php echo $data['currency_rate'] ?>" class="cell"/>
</span>
</p>
<p class="row">
<span>
<input type="input" value="Ставка рефинансирования, %" class="side" readonly="true"/>
<input type="input" name="around.macro.refinance_rate" value="<?php echo $data['refinance_rate'] ?>" class="cell"/>
</span>
</p>
<p class="row">
<span>
<input type="input" value="НДС, %" class="side" readonly="true"/>
<input type="input" name="around.macro.nds_tax" value="<?php echo $data['nds_tax'] ?>" class="cell"/>
</span>
</p>
<p class="row">
<span>
<input type="input" value="Налог на прибыль, %" class="side" readonly="true"/>
<input type="input" name="around.macro.profit_tax" value="<?php echo $data['profit_tax'] ?>" class="cell"/>
</span>
</p>
<p class="row">
<span>
<input type="input" value="ФСЗН, %" class="side" readonly="true"/>
<input type="input" name="around.macro.fszn_tax" value="<?php echo $data['fszn_tax'] ?>" class="cell"/>
</span>
</p>
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