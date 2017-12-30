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
	window.scroll({
		top: 0,
		left: 0,
		behavior: "smooth"
	});
	window.scrollTo(0, 0);

	var path = location.href.split("#")[0];
	window.history.pushState({
		path: path
	}, path, path);

}