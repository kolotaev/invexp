<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Показатели эффективности проекта</title>
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
<img src="/html/pics/icons/classify.gif" alt="effect" />
    Эффективность проекта
</p>
    <form action="#" method="post" class="formdatagrid">
        <div id="datagrid">

            <p class="row">
<span>
<input type="input" value="Показатель" class="side tophead" readonly="true"/>
<input type="input" value="Значение" class="tophead" readonly="true"/>
</span>
            </p>
            <p class="row">
<span>
<input type="input" value="Заемные средства" class="side" readonly="true"/>
<input type="input"  value="<?php echo $data['credit_money'] ?>" readonly="true" class="xcell"/>
</span>
            </p>
            <p class="row">
<span>
<input type="input" value="Собственные средства" class="side" readonly="true"/>
<input type="input"  value="<?php echo $data['own_money'] ?>" readonly="true" class="xcell"/>
</span>
            </p>
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
            <p class="row">
<span>
<input type="input" value="Рентабельность активов, %" class="side" readonly="true"/>
<input type="input"  value="<?php echo $data['Ractives'] ?>" readonly="true" class="xcell"/>
</span>
        </p>
            <p class="row">
<span>
<input type="input" value="Рентабельность продаж, %" class="side" readonly="true"/>
<input type="input"  value="<?php echo $data['Rsales'] ?>" readonly="true" class="xcell"/>
</span>
            </p>
            <p class="row">
<span>
<input type="input" value="Рентабельность продукции, %" class="side" readonly="true"/>
<input type="input"  value="<?php echo $data['Rproduction'] ?>" readonly="true" class="xcell"/>
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