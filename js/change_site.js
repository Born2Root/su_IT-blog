// small close icon
function back() {
	open("/index.php");
	setTimeout(add_listener, 500);
};


// browser back button
window.onpopstate = function () {
	open("/index.php");
	setTimeout(add_listener, 500);
};


function open(path) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("body").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", path + "?type=ajax", true);
	xhttp.send();

	window.history.pushState({
		path: path
	}, path, path);
}


function add_listener() {
	document.getElementById("id").addEventListener("click", function () {

		open("/script_to_rice_your_setup_1.php");
		document.title = "script_to_rice_your_setup_1";

	}, false);
}