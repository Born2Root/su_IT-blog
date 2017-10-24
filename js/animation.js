var canvas_list = [{
	canvas: document.getElementById("animation_canvas_header"),
	context: document.getElementById("animation_canvas_header").getContext("2d"),
	points: []
}, {
	canvas: document.getElementById("animation_canvas_footer"),
	context: document.getElementById("animation_canvas_footer").getContext("2d"),
	points: []
}];

var amount_points;
var distance;

init();
window.addEventListener("resize", init);
requestAnimationFrame(draw);

function init() {
	canvas_list.forEach(function (entry) {
		entry.canvas.width = window.innerWidth;
		if (entry.canvas.width <= 767) {
			entry.canvas.height = 50;
			amount_points = 50;
			distance = 30;
		} else {
			entry.canvas.height = 110;
			amount_points = 100;
			distance = 70;
		}

		entry.context.fillStyle = "#484848";
		entry.context.strokeStyle = "#ff6d00";
		entry.points = [];

		for (var t = 0; t < amount_points; t++) {

			entry.points.push({
				x: Math.floor(Math.random() * entry.canvas.width),
				y: Math.floor(Math.random() * entry.canvas.height),
				r: Math.floor(Math.random() * 4),
				i: Math.floor(Math.random() * 8),
				mx: 0,
				my: 0
			});
		}
	});
}

function draw() {
	canvas_list.forEach(function (entry) {
		entry.context.clearRect(0, 0, entry.canvas.width, entry.canvas.height);
		move(entry.context, entry.canvas, entry.points);
		connect(entry.context, entry.points);
	});
	requestAnimationFrame(draw);
}

function move(context, canvas, points) {

	points.forEach(function (point) {

		if (point.i > 14) {
			do {
				point.mx = Math.floor(Math.random() * 5) * (Math.random() < 0.5 ? -1 : 1);
			} while (point.x + point.mx * 15 > canvas.width + 5 || point.x + point.mx * 15 < -5);

			do {
				point.my = Math.floor(Math.random() * 5) * (Math.random() < 0.5 ? -1 : 1);
			} while (point.y + point.my * 15 > canvas.height + 5 || point.y + point.my * 15 < -5);

			do {
				point.r = point.r + Math.floor(Math.random() * 1.5) * (Math.random() < 0.5 ? -1 : 1);
			} while (point.r > 4 || point.r < 1);

			point.i = -1;
		}

		point.i += 1;
		point.x = point.x + point.mx;
		point.y = point.y + point.my;
	});
}

function connect(context, points) {

	points.forEach(function (point) {
		points.forEach(function (other) {

			var diff = Math.abs(other.x - point.x) + Math.abs(other.y - point.y);

			if (diff < distance) {
				context.lineWidth = diff * 0.03 + 0.001;

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