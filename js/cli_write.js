//ajax
var lines = "";

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {

		var response = this.responseText.split("\n");
		lines = [response];
		lines = lines[0];
	}
};
xhttp.open("GET", "lines.txt", true);
xhttp.send();


//cli write
var line = 0;
var character = 0;
var up = true;

setTimeout(function () {
	line = Math.floor(Math.random() * lines.length);
	cli_write();
}, 3000);

function cli_write() {

	document.getElementById("subtitle").innerHTML = "- " + lines[line].substr(0, character);

	if (up == true) {
		character += 1;
	} else {
		character -= 1;
	}

	if (character == lines[line].length + 5) {
		up = !up;
	} else if (character == -3) {
		up = !up;

		var old_line = line;
		while (line == old_line) {
			line = Math.floor(Math.random() * lines.length);
		}
	}

	setTimeout(cli_write, 100);
}