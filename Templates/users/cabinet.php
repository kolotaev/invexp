<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Кабинет пользователя</title>
<?php include_once('html/tiles/head-basic.html'); ?>
    <script type="text/javascript">
        function changeEmail(){
            var capture = '<div class="capture">E-mail</div>';
            var message = '<div class="message">Введите новый email</div>';

            $("body").append('<div id="veil"></div>');
            $("#info").append('<div class="warningbox"></div>');
            $("#info div.warningbox").append(capture);
            $("#info div.warningbox").append(message);
            $("#info div.warningbox .message").append('<div><br/><input type="input" id="newemail" name="newemail" /></div>');
            $("#info div.warningbox").append('<button class="okbutton"> OK </button>');
            $("#info div.warningbox").append('<button class="okbutton"> Отмена </button>');

            $("#newemail").focus(function() {
                $("div.wrong").remove();
            });
            $(".okbutton").eq(0).click(function () {
                $("div.wrong").remove();
                var email = $("#newemail").val();
                var match = /^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/.test(email);
                if (!match) { $("#info div.warningbox .message").append("<div class='wrong'>Это не email!</div>") }
                else {
                    $("td.inp-left").eq(1).load("/user/cabinet/newEmail", { newemail: email });
                    $("#info div.warningbox").remove();
                    $("#veil").remove();
                }
            });
            $(".okbutton").eq(1).click(function () {
                $("#info div.warningbox").remove();
                $("#veil").remove();
            });
        }
        function uploadFile() {
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('ol a').click(function(){
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
<img src="/html/pics/icons/usercabinet.gif" alt="cabinet" />  
Кабинет пользователя 
</p>
<div class="form">
<table class="cabinetinfotable">
<tr>
<td class="lab">Логин</td>
<td class="inp-left"><?php echo @$login; ?></td>
</tr>
<tr>
<td class="lab">E-mail</td>
<td class="inp-left"><?php echo @$email; ?></td>
</tr>
<tr>
<td class="lab">Проекты</td>
<td class="inp-left">
<ol>
    <?php
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
<tr>
<td class="lab">Файлы</td>
<td class="inp-left"><?php echo @$files; ?></td>
</tr>
</table>
    <form action="/projects/project/open" method="post">
        <input type='hidden' name='pid' value='' />
    </form>
    <div class="tools">
        <a href="#"><img src="/html/pics/actions/mail-action.gif" alt="change email" title="Изменить email" onclick="changeEmail()" /></a>
        <a href="/projects/project/newProjectForm"><img src="/html/pics/actions/newstar.gif" alt="new project" title="Создать проект"/></a>
        <a href="#"><img src="/html/pics/actions/uploadfile.gif" alt="upload file" title="Загрузить файл" onclick="uploadFile()"/></a>
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