//缓冲运动
function getStyle(obj,attr){
	if(obj.currentStyle){
		return obj.currentStyle[attr];
	}else{
		return getComputedStyle(obj)[attr];
	}
}

function startMove(obj,json,fn){
	clearInterval(obj.timer);
	obj.timer=setInterval(function(){
		var cur=0;
		var bstop=true;
		for(var attr in json){
			//取当前值
			if(attr=='opacity'){
				cur=Math.round(getStyle(obj,attr)*100);
			}else{
				cur=parseInt(getStyle(obj,attr));
			}
			//判断速度
			var speed=(json[attr]-cur)/7;
			speed=speed>0?Math.ceil(speed):Math.floor(speed);
			//判断是否到达目标点
			if(cur!=json[attr]){
				if(attr=='opacity'){
					obj.style.opacity=(cur+speed)/100;
					obj.style.filter='alpha(opacity='+(cur+speed)+')';
				}else{
					obj.style[attr]=(cur+speed)+'px';
				}
				bstop=false;
			}
		}
		if(bstop){
			clearInterval(obj.timer);
			fn&&fn();
		}
	},30)
}