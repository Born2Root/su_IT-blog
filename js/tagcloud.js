var canvas = document.getElementById("cloud_canvas");
var context = canvas.getContext("2d");

var text = "test mal schauen";

var x = 0;
var y = 0;
var text_height = 40;

window.addEventListener("click", click, false);
window.addEventListener('resize', resizeCanvas, false);

resizeCanvas();

function redraw() {

	context.strokeStyle = "#367b44";
	context.lineWidth = 5;

	context.textAlign = "center";
	context.font = "40px Georgia";
	context.fillStyle = "#ffffff";

	var text_x = 300;
	var text_y = 70;


	x = text_x - 5 - context.measureText(text).width / 2;
	y = text_y - text_height + 5;


	context.beginPath();
	context.moveTo(text_x, text_y);
	context.lineTo(300, 90);
	context.stroke();


	// x, y, x, y
	context.fillRect(x, y, context.measureText(text).width + 10, text_height);
	context.fillStyle = "#000000";
	// x, y
	context.fillText(text, text_x, text_y);
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
	if (pos.x >= x && pos.x <= x + context.measureText(text).width + 10 && pos.y >= y && pos.y <= y + text_height + 5) {
		alert("link clicked!");
	}
}