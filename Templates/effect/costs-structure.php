<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Структура расходов</title>
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
<img src="/html/pics/icons/radiant.gif" alt="effect"/>
    Структура расходов
</p>

<div class="formdatagrid">
<h3>Диаграмма структуры расходов</h3>

<div id="datagrid">
<?php echo $chart1; ?>

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