window.onscroll = function () {

	var menu = document.getElementById("menu");

	if (window.pageYOffset > document.getElementById("banner").clientHeight) {
		menu.className = "fixed-menu";
	} else {
		menu.className = "";
	}

};