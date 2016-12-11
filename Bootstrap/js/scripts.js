$(document).ready(function() {

	$("#panel").css("right","-300px");
 
	$("li.mechanika").click(function(){
		$("#panel").animate({right: "0px"}, 500 );
		$(this).addClass("zamknij"); 
		return false;
	});

	$("li.omnie").click(function () {
	    $("#mainpage").load("text.txt", function () {
	        alert("Strona zosta³a pomyœlnie za³adowana");
	});
	});


});
