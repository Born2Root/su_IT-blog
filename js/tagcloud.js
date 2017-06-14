var canvas = document.getElementById("cloud_canvas");
var context = canvas.getContext("2d");

canvas.width = canvas.height * (canvas.clientWidth / canvas.clientHeight);

context.font = "60px Georgia";

var text = "test";

context.fillStyle = "#ffffff";
// x, y, x, y
context.fillRect(0, 10, 10 + context.measureText(text).width, 50);
context.fillStyle = "#000000";
// x, y
context.fillText(text, 5, 50);


window.addEventListener("click", click, false);

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