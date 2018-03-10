var modal = document.getElementById("blur_bg");

modal.onclick = function () {
	this.style.display = "none";
}

function show(img) {
	var modalImg = document.getElementById("bigview");
	modal.style.display = "block";
	modalImg.src = img.src;
}