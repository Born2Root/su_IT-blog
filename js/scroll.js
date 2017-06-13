function scroll() {

	var tagcloud = document.getElementById("tagcloud");

	if (window.pageYOffset > document.getElementById("banner").clientHeight) {
		tagcloud.className = "fix-cloud";
	} else {
		tagcloud.className = "";
	}

}