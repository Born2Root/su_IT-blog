var canvas = document.getElementById("cloud_canvas");
var context = canvas.getContext("2d");

var text = "test";

window.addEventListener("click", click, false);
window.addEventListener('resize', resizeCanvas, false);

resizeCanvas();

function redraw() {

	/*
		context.strokeStyle = "#367b44";
		context.lineWidth = 5;
		context.beginPath();
		context.moveTo(45, 50);
		context.lineTo(300, 90);
		context.stroke();
	*/
	context.textAlign = "center";
	context.font = "60px Georgia";
	context.fillStyle = "#ffffff";

	var text_x = 100;
	var text_y = 50;
	var text_height = 40;

	// x, y, x, y
	context.fillRect(0, 10, 10 + context.measureText(text).width, 50);
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
	if (pos.x >= 0 && pos.x <= 10 + context.measureText(text).width && pos.y >= 10 && pos.y <= 40) {
		alert("l");
	}
}