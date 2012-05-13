<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Макроэкономическое окружение</title>
<? include_once('html/tiles/head-basic.html'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            clickSideblock(1);

            var f = $('#datagrid p.row span').length;
            var w;
              if(f>5)  w = 100 + f*3;
            w = w + '%';
            $('body').css('width', w);
            //window.alert(f);
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
<img src="/html/pics/icons/world.gif" alt="macro" />
Макроэкономическое окружение
</p>
<form action="#" method="post" class="formdatagrid">
<div id="datagrid">
<p class="row">
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>
<span class="cell"><input type="input" /></span>

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