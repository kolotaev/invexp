$(document).ready(function() {

$(window).resize(HideSearch);
$(window).load(HideSearch);
FallMenu();
MaxSearch();
AddEmptyDiv();
});

// hides search field when width<900px
function HideSearch(){
var i;
i =$("body").width(); 
if (i<900) { $(".search").css("display","none"); }
if (i>=900) { $(".search").css("display","block"); }  
}

// drop-down-menu hack for IE
function FallMenu(){
	jsHover = function() {
	var hEls = document.getElementById("menu").getElementsByTagName("li");
	for (var i=0, len=hEls.length; i<len; i++) {
	hEls[i].onmouseover=function() { this.className+=" jshover"; }
	hEls[i].onmouseout=function() { this.className=this.className.replace(" jshover", ""); }
	}
	}
	if (window.attachEvent && navigator.userAgent.indexOf("Opera")==-1) window.attachEvent("onload", jsHover);
}  

function MaxSearch() {
$(".field").attr("maxlength",15);
}

function AddEmptyDiv() {
$("#main").before("<div class='clearfix'> </div>");
$(".clearfix").css("float", "left").css("height", "300px");
}