document.getElementById("top").onclick = function () {
	window.scroll({
		top: 0,
		left: 0,
		behavior: "smooth"
	});
	//console.log(location.href.split("#")[0]);
	var path = location.href.split("#")[0];
	window.history.pushState({
		path: path
	}, path, path);

}

document.getElementById("back").onclick = function () {
	window.history.back();
}

document.getElementById("burger").onclick = function () {
	if (document.getElementById("menu").style.display == "block") {
		document.getElementById("menu").style.display = "none";
	} else {
		document.getElementById("menu").style.display = "block";
	}
}

function onpage_link(event, link) {
	event.preventDefault();
	//console.log(link.href.substring(link.href.lastIndexOf("#") + 1));
	document.getElementById(link.href.substring(link.href.lastIndexOf("#") + 1)).scrollIntoView({
		behavior: "smooth",
		block: "center"
	});

	var path = link.href;
	window.history.pushState({
		path: path
	}, path, path);

	document.getElementById(link.href.substring(link.href.lastIndexOf("#") + 1)).className += "mark";
}