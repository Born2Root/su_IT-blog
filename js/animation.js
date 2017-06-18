var animation_canvas = document.getElementById("animation_canvas");
var animation_context = animation_canvas.getContext("2d");

var amount_points = 100;
var distance = 70;

window.addEventListener('resize', resize_canvas_animation, false);

resize_canvas_animation();

function resize_canvas_animation() {
	animation_canvas.width = window.innerWidth - 15;
	redraw_animation();
}


function redraw_animation() {

	animation_context.strokeStyle = "#ffffff";
	animation_context.fillStyle = "#ffffff";
	animation_context.lineWidth = 1;

	var arcs = [];

	// draws arcs
	for (i = 0; i < amount_points; i++) {
		//Math.floor(Math.random() * lines.length);
		var r = Math.floor(Math.random() * 5) + 3;
		var x = Math.floor(Math.random() * animation_canvas.width);
		var y = Math.floor(Math.random() * animation_canvas.height);
		animation_context.beginPath();
		animation_context.arc(x, y, r, 0, 2 * Math.PI);
		animation_context.fill();
		animation_context.stroke();
		arcs.push({
			x: x,
			y: y
		});
	}

	// draws connections
	arcs.forEach(function (arc) {

		arcs.forEach(function (entry) {

			var diff = Math.abs(entry.x - arc.x) + Math.abs(entry.y - arc.y);

			if (diff < distance) {
				animation_context.beginPath();
				animation_context.moveTo(arc.x, arc.y);
				animation_context.lineTo(entry.x, entry.y);
				animation_context.stroke();
			}

		});

	});
}