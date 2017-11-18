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

/*
init();
window.addEventListener("resize", init);
requestAnimationFrame(draw);
*/

function init() {
	canvas_list.forEach(function (entry) {
		entry.canvas.width = window.innerWidth;
		if (entry.canvas.width <= 767) {
			entry.canvas.height = 50;
			amount_points = 50;
			distance = 50;
		} else {
			entry.canvas.height = 110;
			amount_points = 90;
			distance = 90;
		}

		entry.context.fillStyle = "#484848";
		entry.context.strokeStyle = "#ff6d00";
		entry.context.lineWidth = 0.1;
		entry.points = [];

		for (var i = 0; i < amount_points; i++) {

			entry.points.push({
				x: Math.round(Math.random() * (entry.canvas.width - 10)) + 5,
				y: Math.round(Math.random() * (entry.canvas.height - 10)) + 5,
				r: Math.round(Math.random() * 4),
				mx: 0,
				my: 0,
				others: []
			});

			for (var t = 0; t < 1; t++) {
				entry.points[i].others.push(Math.round(Math.random() * (amount_points - 1)));
			}

			var new_mx;
			do {
				new_mx = Math.random() * (Math.random() < 0.5 ? -1 : 1);
			} while (entry.points[i].x + entry.points[i].mx > entry.canvas.width || entry.points[i].x + entry.points[i].mx < 0);
			entry.points[i].mx = new_mx;

			var new_my;
			do {
				new_my = Math.random() * (Math.random() < 0.5 ? -1 : 1);
			} while (entry.points[i].x + entry.points[i].mx > entry.canvas.width || entry.points[i].x + entry.points[i].mx < 0);
			entry.points[i].my = new_my;
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

		point.x = point.x + point.mx;
		point.y = point.y + point.my;

		if (point.x + point.mx > canvas.width || point.x + point.mx < 0) {
			do {
				point.mx = Math.random() * (Math.random() < 0.5 ? -1 : 1);
			} while (point.x + point.mx > canvas.width || point.x + point.mx < 0);
		}

		if (point.y + point.my > canvas.height || point.y + point.my < 0) {
			do {
				point.my = Math.random() * (Math.random() < 0.5 ? -1 : 1);
			} while (point.y + point.my > canvas.height || point.y + point.my < 0);
		}

	});
}

function connect(context, points) {

	points.forEach(function (point) {

		point.others.forEach(function (other) {
			context.beginPath();
			context.moveTo(point.x, point.y);
			context.lineTo(points[other].x, points[other].y);
			context.stroke();
		});

	});

	points.forEach(function (point) {
		context.beginPath();
		context.arc(point.x, point.y, point.r, 0, 2 * Math.PI);
		context.fill();
		context.stroke();
	});

}

/* Nicht so schoene version [archiv]
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
var moves = 100;
var step_size = 2;

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
				x: Math.round(Math.random() * entry.canvas.width),
				y: Math.round(Math.random() * entry.canvas.height),
				r: Math.round(Math.random() * 4),
				i: Math.round(Math.random() * 180),
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

		if (point.i > 80) {

			point.x = point.x + (point.mx / (1 / 180) * 1 / point.i);
			point.y = point.y + (point.my / (1 / 180) * 1 / point.i);

			if (point.i > 180) {

				do {
					point.mx = Math.round(Math.random() * step_size) * (Math.random() < 0.5 ? -1 : 1);
				} while (point.x + point.mx * moves > canvas.width + step_size || point.x + point.mx * moves < -step_size);

				do {
					point.my = Math.round(Math.random() * step_size) * (Math.random() < 0.5 ? -1 : 1);
				} while (point.y + point.my * moves > canvas.height + step_size || point.y + point.my * moves < -step_size);

				do {
					point.r = point.r + Math.round(Math.random() * 1.5) * (Math.random() < 0.5 ? -1 : 1);
				} while (point.r > 4 || point.r < 1);

				point.i = -1;
			}

		}

		point.i += 1;
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
*/