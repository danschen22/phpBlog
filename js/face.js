/**
 *JSEclipse 插件，Eclipse js 插件，
 * 安装：下载压缩包，Help->install new software...->add(name:JSEclipse,location:选择压缩包位置)
 * 设为默认：window->preferences->genaral->editor->file assocations(*.js下选中)
 */

 window.onload = function(){
 	var images = document.getElementsByTagName('img');
 	for(var i=0;i<images.length;i++){
 		images[i].onclick=function(){
 			_chooseFaceImg(this.alt);
 		}
 	}
 }
 function _chooseFaceImg(src){
 	//opener:父窗口
 	var faceImage = opener.document.getElementById('faceImage');
 	var headImgText = opener.document.getElementById('headImgText');
 	faceImage.src = src;
 	headImgText.value = src;
 }
 