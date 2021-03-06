<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>How To - Информация</title>
<?php include_once('html/tiles/head-basic.html'); ?>
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
<img src="/html/pics/icons/page.gif" alt="infopage" />
Как пользоваться приложением 
</p>

<div class="textmessage">
    <p>
    Приложение «InvExp» реализует клиент-серверную технологию и является web-приложением. 
    Это значит, что оно доступно клиентам, на рабочем месте которых установлена любая 
    операционная система (Windows, Linux, MacOS, FreeBSD или любая другая)с web-обозревателем 
    (Microsoft Internet Explorer, Mozilla Fire Fox, Opera, Google Chrome, Safari или любой другой).
    </p>
    <p>
    Пользователь вводит url-адрес приложения в браузере и заходит на главную страницу приложения. 
    Далее пользователь проходит процесс регистрации (если еще не зарегистрирован) в системе, для чего 
        выбирает в главном меню пункт «Вход – Регистрация» и вводит данные: логин, пароль и адрес 
        электронного почтового ящика.
    При последующей работе с приложением пользователь может вводить только свой логин и пароль и 
        попадать на страницу последнего рабочего проекта.
    </p>
    <p>
    Пользователь может зайти в свой «кабинет» для того, чтобы выполнить следующие действия:
        <ul>
    <li>просмотреть личную информацию;</li>
    <li>изменить e-mail;</li>
    <li>просмотреть список рабочих проектов;</li>
    <li>создать новый проект.</li>
        </ul>
    </p>
    При создании нового проекта пользователь указывает период расчета,
    название проекта, валюту для проекта.
    Далее пользователь заполняет исходные данные по каждому периоду в следующих модулях:
    <p>
        Пользователь может зайти в свой «кабинет» для того, чтобы выполнить следующие действия:
    <ul>
        <li>Окружение (макро- и микроэкономическое)</li>
    <li>Доходы (от реализации продукции/услуг)</li>
    <li>Расходы (на приобретение материалов,  аренду, рекламу и проч.)</li>
    </ul>
    </p>
    <p>
    Далее пользователь переходит в модуль «Эффект», где может просмотреть информацию об эффективности проекта
    (рентабельность продаж, рентабельность продукции, срок окупаемости проекта, NPV и другие).
    В модуле «Инфо» пользователь может просмотреть теоретическую информацию об инвестициях и самом приложении.
    </p>
    <p class="textlast">
<a href="/info/author" > Следующая статья -&gt; </a>
</p>
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