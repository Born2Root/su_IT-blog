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
var width = window.innerWidth;
var height;
var fillStyle = "#ffffff";
var strokeStyle = "#ff6d00";
var points;

init();
window.addEventListener("resize", init);
requestAnimationFrame(draw);

function init() {
	if (window.innerWidth <= 767) {
		height = 50;
		amount_points = 30;
		distance = 80;
	} else {
		height = 110;
		amount_points = 60;
		distance = 100;
	}

	canvas_list.forEach(function (entry) {
		entry.canvas.width = width;
		entry.canvas.height = height;
		entry.context.fillStyle = fillStyle;
		entry.context.strokeStyle = strokeStyle;
	});

	points = [];

	for (var i = 0; i < amount_points; i++) {
		points.push({
			x: Math.round(Math.random() * (width - 10)) + 5,
			y: Math.round(Math.random() * (height - 10)) + 5,
			r: Math.round(Math.random() * 3),
			mx: Math.random() * (Math.random() >= 0.5 ? -1 : 1),
			my: Math.random() * (Math.random() >= 0.5 ? -1 : 1)
		});
	}
}

function draw() {
	move();
	canvas_list.forEach(function (entry) {
		entry.context.clearRect(0, 0, width, height);
		connect(entry.context);
	});
	requestAnimationFrame(draw);
}

function move() {
	points.forEach(function (point) {

		point.x = point.x + point.mx;
		point.y = point.y + point.my;

		if (point.x + point.mx > width || point.x + point.mx < 0) {
			point.mx *= -1;
		}

		if (point.y + point.my > height || point.y + point.my < 0) {
			point.my *= -1;
		}

	});
}

function connect(context) {

	points.forEach(function (point) {

		points.forEach(function (other) {
			if (point !== other) {

				var diff = Math.abs(other.x - point.x) + Math.abs(other.y - point.y);

				if (diff < distance) {
					context.lineWidth = 0.4 - (diff / (1 / 0.4)) / distance;

					context.beginPath();
					context.moveTo(point.x, point.y);
					context.lineTo(other.x, other.y);
					context.closePath();
					context.stroke();
				}
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