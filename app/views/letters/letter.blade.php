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
    	<audio id="lettera">
			<source src="/assets/mp3/letter_a.ogg" type="audio/ogg">
			<source src="/assets/mp3/letter_a.mp3" type="audio/mpeg">
		</audio>
		<audio id="airplane">
			<source src="/assets/mp3/airplane1.ogg" type="audio/ogg">
  			<source src="/assets/mp3/airplane1.mp3" type="audio/mpeg">
		</audio>
		<canvas id="letter_canvas"></canvas>
    	<script>
	  		
			// set canvas to full screen
			c = document.getElementById('letter_canvas');
			c.width = 1500;
    		c.height = 800;
			c.style = "background-color: pink;";
      		
			window.requestAnimFrame = (function(callback) {
        		return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        		function(callback) {
          			window.setTimeout(callback, 1000 / 60);
        		};
      		})();

		  	function drawImgX(img, context) {
				context.drawImage(img, img.alt, img.y);
			}
			
			function drawImgY(biga, context) {
				context.drawImage(biga, biga.alt, biga.name); // using alt for x, name for y... bwhahaha
				//alert(biga.alt + " " + biga.name);
			}
		

			var bd = {big_dropped: false, yval: 0, alt: 329, played: false};	

			function animate(img, canvas, context, startTime) {
				// update
				var time = (new Date()).getTime() - startTime;

				var linearSpeed = 100;
				// pixels / second
				
				var newX = linearSpeed * time / 500;
				if(newX < canvas.width - (img.width - 250) / 2) {
					img.alt = newX;
					// here's a fucking hack... and a 1/2 since img object doesn't have x and y, they do have alt and name... bwahahaha
					if (newX>229) {
						bd.alt = 329;
						bd.yval += 5;
						if (bd.yval > 600) {
							bd.yval = 600;
							adio_a = document.getElementById('lettera');
							if (bd.played == false) {
								adio_a.play(); // only play once when it lands
								bd.played = true;
							}
						}
						//alert('abcd: '+bd.yval);
						bd.big_dropped=true;
						// why 229? because it's like... an inch into the animation and i don't know why else
						// load the letter bomb
						biga.alt = bd.alt;
						biga.name = bd.yval; // start with defaults
						//alert("fda: " + biga.name);
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
			biga.width = 150;
			biga.height = 150;
      		
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
