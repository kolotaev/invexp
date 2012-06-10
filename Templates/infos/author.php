<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>О приложении</title>
<? include_once('html/tiles/head-basic.html'); ?>
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
<img src="/html/pics/icons/page.gif" alt="infopage" /> 
О приложении InvExp
</p>

<div class="textmessage">

<div class="left-about">
InvExp - это:
</div> 
<div class="right-about">
Программа для оценки инвестиционных проектов с возможностью построения полного
финансового плана действующего предприятия, программа,
предназначенная для оценки инвестиционных проектов различных отраслей, масштабов и направленности. 
</div>        

<div class="left-about">
Позволяет:
</div> 
<div class="right-about">
<p>
Описать и провести оценку эффективности нескольких инвестиционных 
решений, построить укрупненный финансовый план действующего предприятия, 
ценить состояние предприятия с учетом инвестиционных проектов.
</p>
<p>
Модель позволяет провести оценку состояния предприятия с 
учетом инвестиционных проектов по следующим направлениям:
Эффективность инвестиций (капитальных вложений).
</p>
<p>
По каждому инвестиционному проекту рассчитывается набор 
показателей: простой и дисконтированный срок окупаемости, NPV, IRR, MIRR, NPVR, 
максимальная ставка кредитования. Также определяются показатели эффективности по 
выбранной группе инвестиционных проектов.
</p> 
</div>

<div class="left-about">
Source:
</div> 
<div class="right-about">
<p>
Вы можете принять участие в разработке приложения, 
став участником проекта на <b>GitHub</b> <a href="https://github.com/invexp/invexp"> здесь </a>, 
либо просто начать его использовать,
скачав и установив InvExp на своем локальном LAMP, WAMP сервере.
</p>
<p>
<img src="/html/pics/icons/github-icon.jpg" alt="github" /> 
<a href="https://github.com/invexp/invexp/zipball/master"> Скачать приложение </a>
</p>

</div> 


<div class="left-about">
Автор:
</div> 
<div class="right-about">
<p>
<i>Егор Колотаев &copy;</i>
</p>
<p>
Email: <a href="mailto:ekolotaev@gmail.com?subject=Make InvExp better">ekolotaev@gmail.com</a>
</p>
</div>                         


<p class="textlast">
<a href="/info/invest" > Следующая статья -&gt; </a>
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

<? include_once('html/tiles/footer.html'); ?>
</body>
</html>