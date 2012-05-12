<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Открыть проект</title>
<? include_once('html/tiles/head-basic.html'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.form a').click(function(){
                var y = $(this).parent().children("span").html();
                $('form input').attr("value", y);
                $("form").submit();
            });
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
<img src="/html/pics/icons/propeller.gif" alt="open" />
Открыть проект
</p>
<div class="form">
<form action="/projects/project/open" method="post">
<table class="cabinetinfotable">
<tr>
<td class="inp lab">Проекты</td>
</tr>
<tr>
<td class="inp-left" style="padding-left: 50px">
<ol>
    <?
    if (empty($projects)) echo "Проектов пока нет";
    else {
        foreach ($projects as $key => $pr){
            $pr_id = $project_ids[$key];
            echo "<li><a href='#'>$pr</a></br><span style='display: none;'>$pr_id</span></li>";
        }
        echo "<input type='hidden' name='pid' value='' />" ;
    }
    ?>
</ol>
</td>
</tr>
</table>
</form>
    <div class="tools">
        <a href="/projects/project/newProjectForm"><img src="/html/pics/actions/newstar.gif" title="Создать проект" alt="new project" /></a>
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