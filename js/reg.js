/**
 * 
 */
 window.onload = function(){
 	var faceImage = document.getElementById('faceImage');
 	faceImage.onclick = function(){
 		window.open('face.php','face','width=400,height=400,left=100,top=100');
 	}
 	var code_img = document.getElementById('code-img');
 	code_img.onclick = function(){
 		this.src = 'code.php?tm='+Math.random();
 	}
 }