document.getElementById("id").addEventListener("click", function () {

	open("test_article.php");
	document.title = "This is the new page title.";

}, false);

function back() {
	//window.history.back();
	open("index.php");
};


window.onpopstate = function () {
	//location.reload();
	open("index.php");
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