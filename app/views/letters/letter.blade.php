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

    	<script src="/assets/js/{{$letter}}.js"></script>
		 
  	</body>
</html>
