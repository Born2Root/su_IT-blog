setTimeout(cli_write, 1);

var character = 0;
var up = true;
var lines = new Array("hallo wie gehts", "test", "lululu");
var line = Math.floor(Math.random() * lines.length);

function cli_write() {

	document.getElementById("subtitle").innerHTML = "- " + lines[line].substr(0, character) + " -";

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