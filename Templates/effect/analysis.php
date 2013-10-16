<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Анализ эффективности проекта</title>
<?php include_once('html/tiles/head-basic.html'); ?>
    <script type="text/javascript">
        $(document).ready(function() {

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
<img src="/html/pics/icons/radiant.gif" alt="effect" />
    Анализ проекта
</p>
    <form action="#" method="post" class="formdatagrid">
        <div id="datagrid">

<div class="analysis">
    <?php
    if ($is_effective)
        echo "Результат: проект эффективен.";
    else
        echo "Результат: проект неэффективен."
    ?>
</div>
            <p class="row">
<span>
<input type="input" value="ЧДД" class="side" readonly="true"/>
<input type="input"  value="<?php echo $data['npv'] ?>" readonly="true" class="xcell"/>
</span>
            </p>
            <p class="row">
<span>
<input type="input" value="Срок окупаемости, пер." class="side" readonly="true"/>
<input type="input"  value="<?php echo $data['pp'] ?>" readonly="true" class="xcell"/>
</span>
            </p>
            <p class="row">
<span>
<input type="input" value="Индекс рентабельности, %" class="side" readonly="true"/>
<input type="input"  value="<?php echo $data['pi'] ?>" readonly="true" class="xcell"/>
</span>
            </p>
            <p class="row">
<span>
<input type="input" value="ВНД, %" class="side" readonly="true"/>
<input type="input"  value="<?php echo $data['vnd'] ?>" readonly="true" class="xcell"/>
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