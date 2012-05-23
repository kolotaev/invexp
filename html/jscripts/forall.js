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

    //Actions & behaviour of cells in DataGrid
    $("#datagrid input.cell").blur(function () {
        var this_cell = $(this);
        if (reviser(this_cell) == true) {
            ajaxSend(this_cell);
        }
    });
    $("#datagrid input.cell").keypress(function (e) {
        if (e.keyCode == 13) {
            var this_cell = $(this);
            if (reviser(this_cell) == true) {
                ajaxSend(this_cell);
            }
        }
    });
    // end

    // Decoration of cells in DataGrid
    $("#info #datagrid input.cell").focus(function () {
        $(this).css('background-color', '#fafafa');
    });
    $("#info #datagrid input.cell").blur(function () {
        $(this).css('background-color', 'white');
    });
    // end

});

// ------------------------------- End document ready -------------------------------------------- //

function reviser(cell) {
    var data = $(cell).val();
    var match1 = /^[1-9][0-9]*[,|\.]{0,1}[0-9]*$/.test(data);
    var match2 = /^[0]{0,1}[,|\.]{0,1}[0-9]*$/.test(data);
    if (!match1 && !match2 && data != '') {
        $(cell).attr('readonly', true);
        LightBoxInput("Неверный формат!", "Format", function () {
            $(cell).focus();
        });
        $(cell).val(data);
        return false;
    }
    else {
        return true;
    }
    //$(this).val(s);
}
// Ajax function!
function ajaxSend(caller) {
    var action = $(caller).parents('form').attr('action');
    var send_data = 'cell=' + $(caller).attr('name') + '&data=' + $(caller).attr('value');
    $.ajax({
        url:action,
        data:send_data,
        dataType:"json",
        success:function (data) {
            $('#datagrid input[name="' + data.caller.cell + '"]').attr('name', data.caller.cell).val(data.caller.value);
            if (data.dependent != undefined){
                $('#datagrid input[name="' + data.dependent.cell + '"]').attr('name', data.dependent.cell).val(data.dependent.value);
            }
        }
    });

}
//end
// Clicks Sideblock menu on page load/reload (if needed)
function clickSideblock(num) {
    $('#firstpane div.menu_body').eq(num).css("display", "block").addClass('vis');
    $('#firstpane p.menu_head').eq(num).css({backgroundImage:"url(/html/pics/menu-minus.gif)"});
}
// end

// LightBox for all kind of warnings
function LightBox(msg, capt, callback) {
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
        if (callback != undefined) {
            callback();
        }
    });
}
// end

// LightBox for input of warnings
function LightBoxInput(msg, capt, callback) {
    capt = capt || 'Ошибка!';
    var capture = '<div class="capture">' + capt + '</div>';
    var message = '<div class="message">' + msg + '</div>';
    $('input.cell').attr('readonly', true);
    $("body").append('<div id="veil"></div>');
    $("#info").append('<div class="warningbox"></div>');
    $("#info div.warningbox").append(capture);
    $("#info div.warningbox").append(message);
    $("#info div.message").prepend('<div><img src="/html/pics/icons/error2.gif" /></div>');
    $("#info div.warningbox").append('<button class="okbutton"> OK </button>');
    $("#info div .okbutton").focus();
    $(".okbutton").click(function () {
        $("#info div.warningbox").remove();
        $("#veil").remove();
        $('input.cell').attr('readonly', false);
        if (callback != undefined) {
            callback();
        }
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

