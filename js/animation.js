var animation_canvas = document.getElementById("animation_canvas");
var animation_context = animation_canvas.getContext("2d");


window.addEventListener('resize', resize_canvas_animation, false);

resize_canvas_animation();

function resize_canvas_animation() {
	animation_canvas.width = window.innerWidth - 15;
	//redraw();
}

/*
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
*/