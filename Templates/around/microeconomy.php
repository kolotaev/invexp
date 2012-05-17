<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Микроэкономическое окружение</title>
<? include_once('html/tiles/head-basic.html'); ?>
    <script type="text/javascript">
        $(document).ready(function() {

            clickSideblock(1);

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
<img src="/html/pics/icons/radiant.gif" alt="micro" />
Микроэкономическое окружение
</p>
<form action="/usr" method="post" class="formdatagrid">
<div id="datagrid">

<p class="row">
<span>
<input type="input" value="Показатель" class="side tophead" readonly />
<input type="input" value="Значение" class="tophead" readonly />
</span>
</p>
<p class="row">
<span>
<input type="input" value="Амортизация" class="side" readonly/>
<input type="input" name="amortization" value="" class="cell"/>
</span>
</p>
<p class="row">
<span>
<input type="input" value="Кредит (сумма)" class="side" readonly/>
<input type="input" name="credit_volume" value="" class="cell"/>
</span>
</p>
<p class="row">
<span>
<input type="input" value="% по кредиту" class="side" readonly/>
<input type="input" name="credit_rate" value="" class="cell"/>
</span>
</p>
<p class="row">
<span>
<input type="input" value="Период кредитования" class="side" readonly/>
<input type="input" name="credit_term" value="" class="cell"/>
</span>
</p>
<p class="row">
<span>
<input type="input" value="Собственные средства" class="side" readonly/>
<input type="input" name="own_money" value="" class="cell"/>
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

<? include_once('html/tiles/footer.html'); ?>
</body>
</html>