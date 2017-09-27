window.onscroll = function () {

	if (document.body.scrollWidth > 767) {
		var menu = document.getElementById("menu");
		var logo = document.getElementById("logo");

		if (window.pageYOffset > document.getElementById("banner").clientHeight) {
			menu.className = "fixed-menu";

			logo.style.position = "fixed";
			logo.style.height = "60px";
			logo.style.top = "0px";
		} else {
			menu.className = "";

			logo.style.position = "absolute";
			logo.style.height = "100px";
			logo.style.top = "10px";
		}
	}

};