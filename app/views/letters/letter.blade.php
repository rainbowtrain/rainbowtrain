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
    	<audio id="airplane">
			<source src="/assets/mp3/airplane1.ogg" type="audio/ogg">
  			<source src="/assets/mp3/airplane1.mp3" type="audio/mpeg">
		</audio>
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

			function big_dropped() {
				var big_dropped = false;
				var alt = 0;
			}

		  	function drawImgX(img, context) {
				context.drawImage(img, img.alt, img.y);
			}
			
			function drawImgY(img, context) {
				context.drawImage(img, img.alt, img.name); // using alt for x, name for y... bwhahaha
			}
		
			bd = new big_dropped();
	
			function animate(img, canvas, context, startTime) {
				// update
				var time = (new Date()).getTime() - startTime;

				var linearSpeed = 100;
				// pixels / second
				var newX = linearSpeed * time / 1000;
				var newY = linearSpeed * time / 3000;
				if(newX < canvas.width - (img.width - 250) / 2) {
					img.alt = newX;
					// here's a fucking hack... and a 1/2 since img object doesn't have x and y, they do have alt and name... bwahahaha
					if (newX>229) {
						bd.alt = 329;
						bd.big_dropped=true;
						// why 229? because it's like... an inch into the animation and i don't know why else
						// load the letter bomb
						if (newY > canvas.height - biga.height / 2) {
							biga.alt = bd.alt;
							biga.name = newY;
						}
					}
				}

				// clear
				context.clearRect(0, 0, canvas.width, canvas.height);

				if (bd.big_dropped) {
					drawImgY(biga, context);
				}

				drawImgX(img, context);

				// request new frame
				requestAnimFrame(function() {
					animate(img, canvas, context, startTime);
				});
			}
			
			var canvas = document.getElementById('letter_canvas');
			var context = canvas.getContext('2d');

			var img = new Image();
			img.src = '/assets/img/airplane.png';

			var biga = new Image();
			biga.src = '/assets/img/biga.png';
      		
			drawImgX(img, context);

      		// wait one second before starting animation
      		setTimeout(function() {
        		var startTime = (new Date()).getTime();
        		animate(img, canvas, context, startTime);
      		}, 0);

			// play sound
			var adio = document.getElementById('airplane');
			adio.play();

    	</script>
		 
  	</body>
</html>
