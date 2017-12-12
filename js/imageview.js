var modal = document.getElementById("blur_bg");

modal.onclick = function () {
	this.style.display = "none";
}

function show(img) {
	var modalImg = document.getElementById("bigview");
	var source = window.getComputedStyle(img, false).backgroundImage.slice(5, -2);
	modal.style.display = "block";
	modalImg.src = source;
}