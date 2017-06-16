document.getElementById("id").addEventListener("click", function () {


	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("body").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "test_article.html", true);
	xhttp.send();


	history.pushState({
		path: "test_article.html"
	}, 'title', "test_article.html");

}, false);