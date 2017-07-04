//通过id获取元素
function $(id){
	return document.getElementById(id);
}
//通过类名获取元素
function getclass(sclass,sparent){
	var parent=sparent||document;//如果有父框，用父框，没有document
	var arr=[];//存放获取到的元素。
	var aEle=parent.getElementsByTagName('*');//*父元素下面的所有元素。
	for(var i=0;i<aEle.length;i++){
		if(aEle[i].className==sclass){//如果当前元素的类名和传入类名一致，将元素追加到数组里面。
			arr.push(aEle[i]);
		}
	}
	return arr;//所有类名匹配上的元素组成的数组。
}

//获取选择器里面的样式。
function getstyle(obj,attr){
	if(obj.currentStyle){
		return obj.currentStyle[attr];//ie8
	}else{
		return getComputedStyle(obj)[attr];//标准
	}
}
//获取某一区间随机数
function getrandom(min,max){
	return Math.floor(Math.random()*(max-min+1))+min;
}

//事件的绑定
function addEvent(obj,event,fn){
	if(obj.attachEvent){//判断是否是ie8浏览器
		var e='_'+event;//_click;  _mouseover
		if(!obj[e]){//obj[e]:数组的名称,数组不存在，新建一个数组。
			obj[e]=[];
		}
		obj[e].push(fn);//将触发的函数追加到数组里面
		obj['on'+event]=function(){//执行对象数组里面的函数
			for(var i in obj[e]){//通过遍历执行数组里面函数
				obj[e][i].call(obj);//修改this指向。
			}
		}
	}else{
		obj.addEventListener(event,fn,false);//标准浏览器支持的
	}
}
//事件的删除
function removeEvent(obj,event,fn){//删除绑定的事件
	if(obj.detachEvent){//ie8
		if(obj['_'+event]){
			for(var i in obj['_'+event]){//遍历数组
				if(obj['_'+event][i]==fn){//判断传入函数是否在数组里面存在
					obj['_'+event].splice(i,1);//删除存在的fn，修改原数组
					break;
				}
			}
		}
	}else{
		obj.removeEventListener(event,fn,false);
	}
}

//cookie操作:命名空间
var jscookie={
	addCookie:function(key,value,day){
		var date=new Date();
		date.setDate(date.getDate()+day);//当前的日期+10天
		document.cookie=key+'='+encodeURI(value)+';expires='+date;//date:修改的日期（年月日时分秒日期）		
	},
	getCookie:function(key){
		var arr=decodeURI(document.cookie).split('; ');//数组的每一项都是一个键值对。
		for(var i=0;i<arr.length;i++){
			var newarr=arr[i].split('=');//将arr数组再次拆分成一个新的数组newarr
			if(newarr[0]==key){//比较每个新数组的key值，输出value;
				return newarr[1];
			}
		}
	},
	delCookie:function(key){
		jscookie.addCookie(key,'value',-1);
	}
}
//缓冲运动

		
  function buffer(obj,json,fn){
	clearInterval(obj.timer);
	var cur=null;
	obj.timer=setInterval(function(){
		//获取属性的值
		var bstop=true;//ok
		for(var attr in json){//循环开始
			if(attr=='opacity'){
				cur=Math.round(getstyle(obj,attr)*100);
			}else{
				cur=parseInt(getstyle(obj,attr));
			}
			//求速度
			speed=(json[attr]-cur)/5;//json[attr]==target
			speed=speed>0?Math.ceil(speed):Math.floor(speed);
			//运动以及停止
			if(cur!=json[attr]){
				if(attr=='opacity'){//透明度
					obj.style.opacity=(cur+speed)/100;
					obj.style.filter='alpha(opacity='+(cur+speed)+')';
				}else{
					obj.style[attr]=(cur+speed)+'px';
				}
				bstop=false;//没有到目标点。
			}
		}//循环结束

	if(bstop){//bstop=true
		clearInterval(obj.timer);//有一个到了，停了
		fn&&fn();
	}	

	},50);
}
