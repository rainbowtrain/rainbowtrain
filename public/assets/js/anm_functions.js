// need some fucking global variables

setTimeout(function() {
	var startTime = (new Date()).getTime();
    zigzag(img, canvas, context, startTime, 0, 200, 300, 100);
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

function zigzag(img, canvas, context, startTime, startx, starty, bottom_threshold, top_threshold) {

    var time = (new Date().getTime() - startTime);
   
    // figure out rate of x to move left to right 
    var newX = 100 * time / 500;
	if(newX < canvas.width - (img.width - 250) / 2) {
		img.alt = newX;
	}
  
    // FUCK tHIS GODDAMN LOGIC SUCKS 
    // if y is at a certain point below "bottom_threshold" then move y axis back toward 0 
    if (img.name >= bottom_threshold) {
        img.name = (parseInt(img.name) - 2); // go up
    } else { // move down
        img.name = (parseInt(img.name) + 2); // go down
    }
    // and the inverse of above if statement logic
    if (img.name >= top_threshold) {
        img.name = (parseInt(img.name) + 2); // go up
    } else { // move down
        img.name = (parseInt(img.name) - 2); // go down
    }
  
    // and the other way!
    if (img.name <= bottom_threshold) {
        img.name = (parseInt(img.name) + 2); // go up
    } else { // move down
        img.name = (parseInt(img.name) - 2); // go down
    }
    // and the inverse of above if statement logic
    if (img.name <= top_threshold) {
        img.name = (parseInt(img.name) - 2); // go up
    } else { // move down
        img.name = (parseInt(img.name) + 2); // go down
    }

 
	// clear
	context.clearRect(0, 0, canvas.width, canvas.height);

	context.drawImage(img, img.alt, img.name);

	// request new frame
	requestAnimFrame(function() {
		zigzag(img, canvas, context, startTime, img.alt, img.name, bottom_threshold, top_threshold);
	});
}
