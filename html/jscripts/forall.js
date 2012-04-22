$(document).ready(function() {

// Remove search  'go!'
$(".field").focus(function(){
 $(this).css("color","black").attr("value", "");
});
$(".field").blur(function(){
 $(this).css("color","rgb(170,170,170)").attr("value", "go!");
});
// end


// Accordeon menu
$("#firstpane p.menu_head").click(function()
  {
  $(this).siblings('.menu_head').css({backgroundImage:"url(/html/pics/menu-plus.gif)"});
  $(this).css({backgroundImage:"url(/html/pics/menu-minus.gif)"})
         .next("div.menu_body")
		 .toggleClass('vis')
         .slideToggle(300)
         .siblings("div.menu_body")
         .slideUp("slow");
  $('body').find("div.menu_body").not($(this).next("div.menu_body")).removeClass('vis');		 
  if ($(this).next("div.menu_body").hasClass('vis')) {$(this).css({backgroundImage:"url(/html/pics/menu-minus.gif)"});}
  else {$(this).css({backgroundImage:"url(/html/pics/menu-plus.gif)"});}
  });
// end                                

});

//   NO-jQUERY SCRIPTS HERE 
// Ajax
/*
function ajaxgo() {
	$(#info").load("call");
}*/
//end

/*  click emultion
<script type="text/javascript">
$(document).ready(function() {
$(".menu_head[id='mhm']").click();
});
</script>
*/
