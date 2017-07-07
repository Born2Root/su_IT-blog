var cloud_canvas = document.getElementById("cloud_canvas");
var cloud_context = cloud_canvas.getContext("2d");

var text_height = 30;
var amount_connections = 3;

var tags = [{
	text: "Software",
	x: 65,
	y: 50
}, {
	text: "Linux",
	x: 200,
	y: 90
}, {
	text: "Memes",
	x: 350,
	y: 70
}, {
	text: "Blender",
	x: 450,
	y: 40
}, {
	text: "Scripts",
	x: 500,
	y: 90
}, {
	text: "Tutorials",
	x: 600,
	y: 40
}, {
	text: "Projects",
	x: 700,
	y: 75
}, {
	text: "Website",
	x: 900,
	y: 30
}, {
	text: "Plans",
	x: 900,
	y: 90
}, {
	text: "Various",
	x: 1200,
	y: 60
}];

window.addEventListener("click", click, false);
window.addEventListener('resize', resize_canvas_cloud, false);

resize_canvas_cloud();

function redraw_cloud() {

	cloud_context.strokeStyle = "#367b44";
	cloud_context.lineWidth = 3;

	cloud_context.textAlign = "center";
	cloud_context.font = "30px Georgia";


	// draws connections
	cloud_context.beginPath();
	tags.forEach(function (entry) {

		var result = nearest_tag(entry);

		// [amount_connections] connections per tag
		for (i = 0; i < amount_connections; i++) {

			var x_to = result[i].x;
			var y_to = result[i].y - 10;

			cloud_context.moveTo(entry.x, entry.y - 10);
			cloud_context.lineTo(x_to, y_to);

		}

	});
	cloud_context.stroke();


	// draws tags
	tags.forEach(function (entry) {

		var x = entry.x - 5 - cloud_context.measureText(entry.text).width / 2;
		var y = entry.y - text_height + 5;

		cloud_context.fillStyle = "#ffffff";
		// x, y, x, y
		cloud_context.fillRect(x, y, cloud_context.measureText(entry.text).width + 10, text_height);
		cloud_context.fillStyle = "#000000";
		// x, y
		cloud_context.fillText(entry.text, entry.x, entry.y);

	});
}

function resize_canvas_cloud() {
	cloud_canvas.width = window.innerWidth - (window.innerWidth * 0.3);
	redraw_cloud();
}

function getMousePos(canvas, evt) {
	var rect = canvas.getBoundingClientRect();
	return {
		x: evt.clientX - rect.left,
		y: evt.clientY - rect.top
	};
}

function click(e) {
	var pos = getMousePos(cloud_canvas, e);

	tags.forEach(function (entry) {

		var x = entry.x - 5 - cloud_context.measureText(entry.text).width / 2;
		var y = entry.y - text_height + 5;

		if (pos.x >= x && pos.x <= x + cloud_context.measureText(entry.text).width + 10 && pos.y >= y && pos.y <= y + text_height + 5) {
			alert("link clicked: " + entry.text);

			for (var i = 0; i < list.length; i += 2) {
				var tags = list[i].split(";");

				if (tags.indexOf(entry.text) >= 0) {
					//treffer
					console.log("treffer " + tags);
				}
			}


		}
	});

}

function nearest_tag(tag) {

	var x = 0;
	var y = 0;
	var diff_best = [];
	for (var i = 0; i < amount_connections; i++) {
		diff_best.push({
			x: 0,
			y: 0,
			diff: 1000
		});
	}

	tags.forEach(function (entry) {

		if (entry.text != tag.text) {

			var diff = Math.abs(entry.x - tag.x) + Math.abs(entry.y - tag.y);

			if (diff < diff_best[diff_best.length - 1].diff) {

				diff_best[diff_best.length - 1] = {
					x: entry.x,
					y: entry.y,
					diff: diff
				};

				//costume sort function; therefore the return				
				diff_best.sort(function (a, b) {
					return a.diff - b.diff;
				});
			}
		}

	});

	return diff_best;

}