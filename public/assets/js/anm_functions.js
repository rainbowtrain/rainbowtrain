setTimeout(function() {
	var startTime = (new Date()).getTime();
    lefttoright(img, canvas, context, startTime);
}, 600);
			
window.requestAnimFrame = (function(callback) {
	return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
	function(callback) {
		window.setTimeout(callback, 1000 / 60);
	};
})();

function lefttoright(img, canvas, context, startTime) {
	var time = (new Date()).getTime() - startTime;
				
	// pixels / second
	var newX = 100 * time / 500;
	if(newX < canvas.width - (img.width - 250) / 2) {
		img.alt = newX;
		// here's a fucking hack... and a 1/2 since img object doesn't have x and y, they do have alt and name... bwahahaha
	}

	// clear
	context.clearRect(0, 0, canvas.width, canvas.height);

	context.drawImage(img, img.alt, img.name);

	// request new frame
	requestAnimFrame(function() {
		lefttoright(img, canvas, context, startTime);
	});
}
