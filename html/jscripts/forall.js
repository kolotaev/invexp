// ------------------------------- Begin document ready -------------------------------------------- //
$(document).ready(function () {

// Remove search  'go!'
    $(".field").focus(function () {
        $(this).css("color", "black").attr("value", "");
    });
    $(".field").blur(function () {
        $(this).css("color", "rgb(170,170,170)").attr("value", "go!");
    });
// end


// Accordeon menu
    $("#firstpane p.menu_head").click(function () {
        $(this).siblings('.menu_head').css({backgroundImage:"url(/html/pics/menu-plus.gif)"});
        $(this).css({backgroundImage:"url(/html/pics/menu-minus.gif)"})
            .next("div.menu_body")
            .toggleClass('vis')
            .slideToggle(300)
            .siblings("div.menu_body")
            .slideUp("slow");
        $('body').find("div.menu_body").not($(this).next("div.menu_body")).removeClass('vis');
        if ($(this).next("div.menu_body").hasClass('vis')) {
            $(this).css({backgroundImage:"url(/html/pics/menu-minus.gif)"});
        }
        else {
            $(this).css({backgroundImage:"url(/html/pics/menu-plus.gif)"});
        }
    });
// end

});

// ------------------------------- End document ready -------------------------------------------- //

// Clicks Sideblock menu on page load/reload (if needed)
function clickSideblock(num){
    $('#firstpane div.menu_body').eq(num).css("display", "block").addClass('vis');
    $('#firstpane p.menu_head').eq(num).css({backgroundImage:"url(/html/pics/menu-minus.gif)"});
}
// end

// LightBox for all kind of warnings
function LightBox(msg, capt) {
    capt = capt || 'Ошибка!';
    var capture = '<div class="capture">' + capt + '</div>';
    var message = '<div class="message">' + msg + '</div>';

    $("body").append('<div id="veil"></div>');
    $("#info").append('<div class="warningbox"></div>');
    $("#info div.warningbox").append(capture);
    $("#info div.warningbox").append(message);
    $("#info div.warningbox").append('<button class="okbutton"> OK </button>');
    $(".okbutton").click(function () {
        $("#info div.warningbox").remove();
        $("#veil").remove();
    });
}
// end

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

 /*
 var d = $("div.menu_body").eq(num).hasClass('vis');
 if (!d) {
 $('#firstpane p.menu_head').eq(num).click();
 }
 */

