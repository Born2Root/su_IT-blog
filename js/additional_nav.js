//back button
document.getElementById("back").onclick = function () {
	window.history.back();
}

//onpage links
function onpage_link(event, link) {
	event.preventDefault();

	var path = link.href;
	var target = document.getElementById(path.substring(path.lastIndexOf("#") + 1));

	target.scrollIntoView({
		behavior: "smooth",
		block: "center"
	});
	window.history.pushState({
		path: path
	}, path, path);

	target.className = "mark";
	setTimeout(function () {
		target.className = "";
	}, 1500);
}