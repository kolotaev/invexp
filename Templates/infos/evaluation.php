<!DOCTYPE html PUBLIC  "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Оценка - Информация</title>
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
Оценка инвестиций
</p>

<div class="textmessage">
<p>
Для оценки эффективности инвестиций в проекты используются следующие основные показатели.
</p>


<p class="bigtopmargin">
<i>NPV, чистый приведенный доход</i><br />
Чистый приведенный доход – это один из важнейших 
показателей расчета эффективности инвестиционного проекта, 
используемый в инвестиционном анализе. Вычисляется как разница 
между дисконтированной стоимостью денежных поступлений от 
инвестиционного проекта и дисконтированными затратами на проект (инвестиции). Вычисляется по формуле:
</p>
<p class="textlast"><img src="/html/pics/formula/npv.gif" alt="npv" /></p>
<p class="formula-explain">
CF<sub>t</sub> – поток денежных поступлений от проекта в период t;<br />
I<sub>t</sub>  – затраты в инвестиционный проект в период t;<br />    
r – ставка дисконтирования (иногда ее называют барьерной ставкой);<br />
n  –  сумма числа периодов.
</p>


<p class="bigtopmargin">
<i>PI, индекс доходности</i><br />
Индекс доходности  оказывает относительную доходность инвестиционного проекта на 
единицу вложений. Формула вычисления показателя:
</p>
<p class="textlast"><img src="/html/pics/formula/pi.gif" alt="pi" /></p>
<p class="formula-explain">
NPV – поток денежных поступлений от инвестиционного проекта;<br />       
C – затраты в инвестиционный проект в период t;<br />
</p>


<p class="bigtopmargin">
<i>DPI, дисконтированный индекс доходности</i><br />
Показатель вычисляется делением всех дисконтированных по времени доходов от инвестиций на все
дисконтированные вложения в проект. Формула для вычисления показателя:
</p>
<p class="textlast"><img src="/html/pics/formula/dpi.gif" alt="dpi" /></p>
<p class="formula-explain">
CF<sub>t</sub> – поток денежных поступлений от проекта в период t;<br />
I<sub>t</sub>  – затраты в инвестиционный проект в период t;<br />
r – ставка дисконтирования;<br />
n – сумма числа периодов. 
</p>


<p class="bigtopmargin">
<i>IRR, внутренняя норма доходности</i><br />
Это ставка дисконтирования (IRR = r) при которой NPV = 0 
или, другими словами, ставка при которой дисконтированные затраты 
равны дисконтированным доходам. Внутренняя норма доходности показывает 
ожидаемую норму доходности по проекту. Одно из достоинств этого показателя 
заключается в возможности сравнить инвестиционные проекты различной продолжительности и 
масштаба. Инвестиционный проект считается приемлемым, 
если IRR &gt; r (ставки дисконтирования). Показатель IRR вычисляется по приведенной ниже формуле:
</p>
<p class="textlast"><img src="/html/pics/formula/irr.gif" alt="irr" /></p>
<p class="formula-explain">
CF<sub>t</sub> – поток денежных поступлений от проекта в период t;<br />
I<sub>t</sub>  – затраты в инвестиционный проект в период  t;<br />
r – ставка дисконтирования (иногда ее называют барьерной ставкой);<br />
n – сумма числа периодов.
</p>


<p class="bigtopmargin">
<i>PP, период окупаемости</i><br />
Период окупаемости показывает время  в течение которого доходы от 
вложений в инвестиционный проект сравняются с затратами в него. 
Используется с показателями NPV и IRR для оценки эффективности 
инвестиционных проектов. Рассчитывается по формуле:
</p>
<p class="textlast"><img src="/html/pics/formula/pp.gif" alt="pp" /></p>
<p class="formula-explain">
Т<sub>ок</sub>  –  срок окупаемости затрат в проект (инвестиций);<br />
CF<sub>t</sub>  – поток денежных поступлений от проекта в период t;<br />
I<sub>o</sub>  – первоначальные затраты;<br />
n – сумма количества  периодов.
</p>


<p class="textlast">
<a href="/info/howto" > Следующая статья -&gt; </a>
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