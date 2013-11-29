$(function() {
	//Currently selected script/code type
	var lang = "";
	
	/*
		Get currently selected code body
	*/
	function getDOMBody(l) {
		//Get language provided, or currently selected language if not provided.
		l = l || lang;
		return $(".codeviewer-body[data-lang='"+l+"']");
	}
	
	/*
		Get currently selected code body's line counter(Number list("NoList"))
	*/
	function getNoList() {
		return getDOMBody().find(".codeviewer-no p");
	}
	
	/*
		- Hover Effect
	*/
	$(".codeviewer-code p").hover(function() {
		//Get line number
		line = $(this).index();
		//Highlight corresponding number
		getNoList().eq(line).css("color", "white");
		getDOMBody().find(".codeviewer-code p").eq(line).css("background", "rgba(150,150,150,0.1)");
	},
	function() { //Mouseout
		//Get line number
		line = $(this).index()
		//Highlight corresponding number
		getNoList().eq(line).css("color", "silver");
		getDOMBody().find(".codeviewer-code p").eq(line).css("background", "transparent");
	});
	
	/*
		- Change Language
		Choose the language to display
	*/
	$(".codeviewer-header li").click(function() {
		//Get requested language
		lang = $(this).attr("data-lang");
		//Set new language
		$(".codeviewer").attr("data-selected", lang);
		//Hide all codes
		$(".codeviewer-body").css("display", "none");
		//Display selected code
		$(".codeviewer-body[data-lang='"+lang+"']").css("display", "block");
	});
	
	/*
		- Result
		NOT IN USE. This will open a new window with the code(s) in action.
		
	*/
	$(".codeviewer-result").click(function() {
		//open("result.html");
	});
});
