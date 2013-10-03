var canvas = window.document.getElementById('letter_canvas');
var context = canvas.getContext('2d');

canvas.style = "background-color: pink;";
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

var img = new Image();
img.src = '/assets/img/airplane2.png';
img.alt=0; // alt is x because img tag doesn't have x
img.name=0; // name is y because img tag doesn't have y