var canvas = document.getElementById("cloud_canvas");
var context = canvas.getContext("2d");

var text_height = 30;
var amount = 3;

var tags = [{
	text: "Software",
	x: 65,
	y: 50
}, {
	text: "Linux",
	x: 200,
	y: 90
}, {
	text: "Memes",
	x: 350,
	y: 70
}, {
	text: "Blender",
	x: 450,
	y: 40
}, {
	text: "Scripts",
	x: 500,
	y: 90
}, {
	text: "Tutorials",
	x: 600,
	y: 40
}, {
	text: "Projects",
	x: 700,
	y: 75
}, {
	text: "Website",
	x: 900,
	y: 30
}, {
	text: "Plans",
	x: 900,
	y: 90
}, {
	text: "Various",
	x: 1200,
	y: 60
}];

window.addEventListener("click", click, false);
window.addEventListener('resize', resizeCanvas, false);

resizeCanvas();

function redraw() {

	context.strokeStyle = "#367b44";
	context.lineWidth = 3;

	context.textAlign = "center";
	context.font = "30px Georgia";


	// draws connections	
	tags.forEach(function (entry) {

		context.beginPath();
		var result = nearest(entry);

		// [amount] connections per tag
		for (i = 0; i < amount; i++) {

			var x_to = result[i].x;
			var y_to = result[i].y - 10;

			context.moveTo(entry.x, entry.y - 10);
			context.lineTo(x_to, y_to);

		}
		context.stroke();

	});


	// draws tags	
	tags.forEach(function (entry) {

		var x = entry.x - 5 - context.measureText(entry.text).width / 2;
		var y = entry.y - text_height + 5;

		context.fillStyle = "#ffffff";
		// x, y, x, y
		context.fillRect(x, y, context.measureText(entry.text).width + 10, text_height);
		context.fillStyle = "#000000";
		// x, y
		context.fillText(entry.text, entry.x, entry.y);

	});
}

function resizeCanvas() {
	canvas.width = window.innerWidth - (window.innerWidth * 0.3);
	redraw();
}

function getMousePos(canvas, evt) {
	var rect = canvas.getBoundingClientRect();
	return {
		x: evt.clientX - rect.left,
		y: evt.clientY - rect.top
	};
}

function click(e) {
	var pos = getMousePos(canvas, e);

	tags.forEach(function (entry) {

		var x = entry.x - 5 - context.measureText(entry.text).width / 2;
		var y = entry.y - text_height + 5;

		if (pos.x >= x && pos.x <= x + context.measureText(entry.text).width + 10 && pos.y >= y && pos.y <= y + text_height + 5) {
			alert("link clicked: " + entry.text);
		}
	});

}

function nearest(tag) {

	var x = 0;
	var y = 0;
	var diff_best = [];
	for (i = 0; i < amount; i++) {
		diff_best.push({
			x: 0,
			y: 0,
			diff: 1000
		});
	}

	tags.forEach(function (entry) {

		if (entry.text != tag.text) {

			var diff = Math.abs(entry.x - tag.x) + Math.abs(entry.y - tag.y);

			if (diff < diff_best[diff_best.length - 1].diff) {

				diff_best[diff_best.length - 1] = {
					x: entry.x,
					y: entry.y,
					diff: diff
				};

				diff_best.sort(function (a, b) {
					return a.diff - b.diff;
				});
			}
		}

	});

	return diff_best;

}