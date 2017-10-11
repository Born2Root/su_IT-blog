//back button
document.getElementById("back").onclick = function () {
	window.history.back();
}

//onpage links
function onpage_link(event, link) {
	event.preventDefault();

	var target = document.getElementById(link.href.substring(link.href.lastIndexOf("#") + 1));
	//console.log(link.href.substring(link.href.lastIndexOf("#") + 1));
	target.scrollIntoView({
		behavior: "smooth",
		block: "center"
	});

	var path = link.href;
	window.history.pushState({
		path: path
	}, path, path);

	target.className = "mark";

	setTimeout(function () {
		target.className = "";
	}, 2000);
}