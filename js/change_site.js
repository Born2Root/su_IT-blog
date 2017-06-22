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

function add_listener() {
	var amount_posts = 0;

	while (document.getElementById("post_" + amount_posts) != null) {
		amount_posts += 1;

	}

	//console.log(amount_posts);

	for (var i = 0; i < amount_posts; i++) {

		document.getElementById("post_" + i).addEventListener("click", function () {

			open(this.getAttribute("title"));
			document.title = this.getAttribute("title");

		}, false);

	}

}

function open(path) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("body").innerHTML = this.responseText;
			document.body.scrollTop = 0;
			//document.documentElement.scrollTop = 0; // Firefox and IE
		}
	};
	xhttp.open("GET", path + "?type=ajax", true);
	xhttp.send();

	window.history.pushState({
		path: path
	}, path, path);

}