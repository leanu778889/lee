/**
 * 拖拽函数
 * @param obj		//对象
 * @param site		//位置限制
 * @param fn		//回调函数
 */
function drag(obj,site,fn){
	var dmW = document.documentElement.clientWidth || document.body.clientWidth
	var dmH = document.documentElement.clientHeight || document.body.clientHeight
	var site = site || {};
	var adsorb = site.n || 0;
	var l = site.l || 0;
	var r = (site.r || site.r==0)?site.r:dmW - obj.offsetWidth;
	var t = site.t || 0;
	var b = (site.b || site.b==0)?site.b:dmH - obj.offsetHeight;
	obj.onmouseover=function(ev){
		var oEvent = ev || event;
		var siteX = oEvent.clientX-obj.offsetLeft+obj.offsetWidth/2;
		if(obj.offsetLeft+<obj.offsetWidth/2){
			siteX=obj.offsetLeft+obj.offsetWidth/2
		}
		var siteY = oEvent.clientY- obj.offsetTop+obj.offsetHeight/2;
		if(siteX<obj.offsetLeft+obj.offsetWidth/2){
			siteX=obj.offsetLeft+obj.offsetWidth/2
		}
		if(obj.setCapture){
			obj.onmousemove=move;
			obj.onmouseover=over;
			obj.setCapture();
		}else{
			document.onmousemove=move;
			document.onmouseover=over;
		}
		function move(ev){
			var oEvent = ev || event;
			var iLeft = oEvent.clientX - siteX;
			var iTop = oEvent.clientY - siteY;
			if(iLeft <=l+adsorb){
				iLeft=l;
			}
			if(iLeft >=r-adsorb){
				iLeft= r;
			}
			if(iTop<=t+adsorb){
				iTop =t;
			}
			if(iTop >=b-adsorb){
				iTop = b;
			}
			if(fn){
				fn(iLeft,iTop)
			}else{
				obj.style.left = iLeft + 'px';
				obj.style.top = iTop + 'px';
			}
		}
		function over(){
			this.onmousemove=null;
			this.onmouseup=null;
			if(obj.setCapture){
				obj.releaseCapture();
			}
		}
		if(oEvent.stopPropagation){
			oEvent.stopPropagation();
		}
		oEvent.cancelBubble=true;
		return false;
	}
}