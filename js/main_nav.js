// burger
document.getElementById("burger").onclick = function () {
	if (document.getElementById("menu").style.display == "block") {
		document.getElementById("menu").style.display = "none";
	} else {
		document.getElementById("menu").style.display = "block";
	}
}

//top
document.getElementById("top").onclick = function () {
	window.scrollTo(0, 0);

	var path = location.href.split("#")[0];
	window.history.pushState({
		path: path
	}, path, path);

}