window.onscroll = function () {

	var tagcloud = document.getElementById("tagcloud");
	var body = document.getElementById("body");

	if (window.pageYOffset > document.getElementById("banner").clientHeight) {
		tagcloud.className = "fixed-cloud";
		body.className = "fix-body";
	} else {
		tagcloud.className = "";
		body.className = "";
	}

};