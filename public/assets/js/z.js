var canvas = window.document.getElementById('letter_canvas');
var context = canvas.getContext('2d');

canvas.style = "background-color: yellow;";
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

var img = new Image();
img.src = '/assets/img/airplane2.png';
img.alt=0; // alt is x because img tag doesn't have x
img.name=100; // name is y because img tag doesn't have y
bottom_threshold = 300;
top_threshold = 50;
