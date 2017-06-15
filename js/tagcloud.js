var canvas = document.getElementById("cloud_canvas");
var context = canvas.getContext("2d");

var text_height = 40;

var tags = new Array({
	text: "Linux",
	x: 100,
	y: 50
}, {
	text: "Memes",
	x: 600,
	y: 40
}, {
	text: "Websites",
	x: 700,
	y: 90
}, {
	text: "Blender",
	x: 300,
	y: 70
});

window.addEventListener("click", click, false);
window.addEventListener('resize', resizeCanvas, false);

resizeCanvas();

function redraw() {

	context.strokeStyle = "#367b44";
	context.lineWidth = 5;

	context.textAlign = "center";
	context.font = "40px Georgia";


	tags.forEach(function (entry) {

		var x = entry.x - 5 - context.measureText(entry.text).width / 2;
		var y = entry.y - text_height + 5;

		var result = nearest(entry)
		var x_to = result.x;
		var y_to = result.y - 10;

		context.beginPath();
		context.moveTo(entry.x, entry.y - 10);
		context.lineTo(x_to, y_to);
		context.stroke();

	});

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
	var diff_best = 1000;
	var diff = 0;

	tags.forEach(function (entry) {

		if (entry.text != tag.text) {

			diff = Math.abs(entry.x - tag.x) + Math.abs(entry.y - tag.y);
			if (diff < diff_best) {
				diff_best = diff;
				x = entry.x;
				y = entry.y;
			}
		}

	});

	return {
		x: x,
		y: y
	};

}