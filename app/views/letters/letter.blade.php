<!DOCTYPE HTML>
<html>
	<head>
    	<style>
      		body {
        		margin: 0px;
        		padding: 0px;
      		}
    	</style>
  	</head>
  	<body>
    	<canvas id="letter_canvas"></canvas>
    	<script>
	  		
			// set canvas to full screen
			c = document.getElementById('letter_canvas');
			c.width = document.body.clientWidth;
    		c.height = document.body.clientHeight;
      		
			window.requestAnimFrame = (function(callback) {
        		return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        		function(callback) {
          			window.setTimeout(callback, 1000 / 60);
        		};
      		})();

		  	function drawImg(img, context) {
				context.drawImage(img, img.alt, img.y);
			}
			function animate(img, canvas, context, startTime) {
				// update
				var time = (new Date()).getTime() - startTime;

				var linearSpeed = 100;
				// pixels / second
				var newX = linearSpeed * time / 1000;
				if(newX < canvas.width - img.width / 2) {
					img.alt = newX;
					// here's a fucking hack... and a 1/2 since img object doesn't have x and y, they do have alt and name... bwahahaha
				}

				// clear
				context.clearRect(0, 0, canvas.width, canvas.height);

				drawImg(img, context);

				// request new frame
				requestAnimFrame(function() {
					animate(img, canvas, context, startTime);
				});
			}
			
			var canvas = document.getElementById('letter_canvas');
			var context = canvas.getContext('2d');

			var img = new Image();
			img.src = '/assets/img/airplane.png';

      		drawImg(img, context);

      		// wait one second before starting animation
      		setTimeout(function() {
        		var startTime = (new Date()).getTime();
        		animate(img, canvas, context, startTime);
      		}, 1000);
    	</script>
  	</body>
</html>
