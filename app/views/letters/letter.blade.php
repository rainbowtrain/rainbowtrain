<!DOCTYPE HTML>
<html>
	<head>
    	<style>
			* { margin:0; padding:0; } /* to remove the top and left whitespace */
			html, body { width:100%; height:100%; } /* just to be sure these are full screen*/
			canvas { display:block; } /* To remove the scrollbars */
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

		<script src="//cdnjs.cloudflare.com/ajax/libs/kineticjs/4.3.1/kinetic.min.js" type="script/javascript"></script>


    	<script>
	  		
			     		

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
						bd.yval += 2;
						if (bd.yval > 650) {
							bd.yval = 650;
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

			canvas.style = "background-color: pink;";
			canvas.width = window.innerWidth;
			canvas.height = window.innerHeight;

			window.addEventListener('resize', resizeCanvas, false);

			var bd = {big_dropped: false, yval: 110, alt: 329, played: false};	

			var img = new Image();
			img.src = '/assets/img/airplane2.png';

			var biga = new Image();
			biga.src = '/assets/img/biga.png';
			biga.width = 150;
			biga.height = 150;
      		
			drawImgX(img, context);

      		// wait a second before starting animation
      		setTimeout(function() {
        		var startTime = (new Date()).getTime();
        		animate(img, canvas, context, startTime);
      		}, 600);

			// play sound
			var adio = document.getElementById('airplane');
			adio.play();

			function resizeCanvas() {
            	canvas.width = window.innerWidth;
            	canvas.height = window.innerHeight;	
			}

    	</script>
		 
  	</body>
</html>
