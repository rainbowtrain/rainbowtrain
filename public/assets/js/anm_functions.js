setTimeout(function() {
	var startTime = (new Date()).getTime();
    zigzag(img, canvas, context, startTime, img.alt, img.name, bottom_threshold, top_threshold);
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
	}

	// clear
	context.clearRect(0, 0, canvas.width, canvas.height);

	context.drawImage(img, img.alt, img.name);

	// request new frame
	requestAnimFrame(function() {
		lefttoright(img, canvas, context, startTime);
	});
}

var direction = new Object;
direction.going_up = false;
direction.going_down = true;

function zigzag(img, canvas, context, startTime, startx, starty, bottom_threshold, top_threshold) {

    var time = (new Date().getTime() - startTime);
   
    // figure out rate of x to move left to right 
    var newX = 100 * time / 500;
	if(newX < canvas.width - (img.width - 250) / 2) {
		img.alt = newX;
	}
 
    // GOING DOWN until it hits a threshold
    if (direction.going_down==true && img.name <= bottom_threshold) {
        // go down by 2 pixels
        img.name = parseInt(img.name) + 4;
    }

    if (direction.going_down==true && img.name > bottom_threshold) {
        direction.going_down = false;
        direction.going_up = true;
        //move up the y axis by 2 pixels
        img.name = parseInt(img.name) - 4;
    }

    // GOING UP until it hits a threshold
    if (direction.going_up==true && img.name >= top_threshold) {
        img.name = parseInt(img.name)-4; // go up by 2 pixels on the y axis
    }

    if (direction.going_up==true && img.name < top_threshold) {
        direction.going_up = false;
        direction.going_down = true;
        img.name = parseInt(img.name)+4; 
    }

 
	// clear
	context.clearRect(0, 0, canvas.width, canvas.height);

	context.drawImage(img, img.alt, img.name);

	// request new frame
	requestAnimFrame(function() {
		zigzag(img, canvas, context, startTime, img.alt, img.name, bottom_threshold, top_threshold);
	});
}
