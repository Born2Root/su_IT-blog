var canvas_list = [{
	canvas: document.getElementById("animation_canvas_header"),
	context: document.getElementById("animation_canvas_header").getContext("2d"),
	points: []
}, {
	canvas: document.getElementById("animation_canvas_footer"),
	context: document.getElementById("animation_canvas_footer").getContext("2d"),
	points: []
}];

var amount_points = 30;
var distance = 30;

var loop = null;

window.addEventListener('resize', resize_canvas_animation, false);

resize_canvas_animation();

function resize_canvas_animation() {
	canvas_list.forEach(function (entry) {
		entry.canvas.width = window.innerWidth;
		if (screen.width < 768) {
			entry.canvas.height = 50;
		} else {
			entry.canvas.height = 107;
		}

	});
	init();
}

function init() {

	clearInterval(loop);

	canvas_list.forEach(function (entry) {

		entry.points = [];

		for (var i = 0; i < amount_points; i++) {

			var r = Math.floor(Math.random() * 4);
			var x = Math.floor(Math.random() * entry.canvas.width);
			var y = Math.floor(Math.random() * entry.canvas.height);

			entry.points.push({
				x: x,
				y: y,
				r: r
			});
		}

		entry.context.strokeStyle = "#ffffff";
		entry.context.fillStyle = "#ffffff";

	});

	draw();
	loop = setInterval(draw, 500);
}

function draw() {
	canvas_list.forEach(function (entry) {
		clear_screen(entry.context, entry.canvas);
		move(entry.context, entry.canvas, entry.points);
		connect(entry.context, entry.points);
	});
}

function clear_screen(context, canvas) {
	context.clearRect(0, 0, canvas.width, canvas.height);
}

function move(context, canvas, points) {

	points.forEach(function (point) {

		do {
			point.x = point.x + (Math.floor(Math.random() * 5) * (Math.random() < 0.5 ? -1 : 1));
		} while (point.x > canvas.width + 5 || point.x < -5);

		do {
			point.y = point.y + (Math.floor(Math.random() * 5) * (Math.random() < 0.5 ? -1 : 1));
		} while (point.y > canvas.height + 5 || point.y < -5);

		do {
			point.r = point.r + Math.floor(Math.random() * 1.5) * (Math.random() < 0.5 ? -1 : 1);
		} while (point.r > 4 || point.r < 1);

	});
}

function connect(context, points) {

	context.strokeStyle = "#ff6d00";

	points.forEach(function (point) {

		points.forEach(function (other) {

			var diff = Math.abs(other.x - point.x) + Math.abs(other.y - point.y);

			if (diff < distance) {
				context.lineWidth = diff / 55 + 0.1;

				context.beginPath();
				context.moveTo(point.x, point.y);
				context.lineTo(other.x, other.y);
				context.stroke();
			}

		});

	});

	points.forEach(function (point) {

		context.beginPath();
		context.arc(point.x, point.y, point.r, 0, 2 * Math.PI);
		context.fill();
		context.stroke();

	});

}