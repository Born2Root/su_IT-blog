document.getElementById("top").onclick = function () {
	window.scroll({
		top: 0,
		left: 0,
		behavior: "smooth"
	});

}

document.getElementById("back").onclick = function () {
	window.history.back();
}