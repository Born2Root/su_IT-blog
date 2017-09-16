document.getElementById("burger").onclick = function () {
	if (document.getElementById("menu").style.display == "block") {
		document.getElementById("menu").style.display = "none";
	} else {
		document.getElementById("menu").style.display = "block";
	}
}