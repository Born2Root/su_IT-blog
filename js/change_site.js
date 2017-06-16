document.getElementById("id").addEventListener("click", function () {

	open("test_article.html");
	document.title = "This is the new page title.";

}, false);

function back() {
	//window.history.back();
	open("main.html");
	// php anpassen, siehe internet
};

window.onpopstate = function () {
	location.reload();
};


function open(path) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("body").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", path, true);
	xhttp.send();

	window.history.pushState({
		path: path
	}, path, path);
}