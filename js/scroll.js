window.onscroll = function () {

	if (window.innerWidth > 767) {
		var menu = document.getElementById("menu");
		var logo = document.getElementById("logo");

		if (window.pageYOffset > document.getElementById("banner").clientHeight) {
			menu.className = "fixed_menu";

			logo.style.position = "fixed";
			logo.style.height = "60px";
			logo.style.top = "0px";
		} else {
			menu.className = "";

			logo.style.position = "absolute";
			logo.style.height = "150px";
			logo.style.top = "10px";
		}
	}

};