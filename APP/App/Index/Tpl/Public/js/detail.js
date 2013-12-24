window.onload=function(){
				var oMain = document.getElementById('goods-img'); //顶层父级div
				var oSmall = getByClass('small',oMain)[0];	 //小图父级
				var oCur = getByClass('current',oMain)[0];	 //当前显示图父级
				var oBig = getByClass('big',oMain)[0];		 //大图父级
				var aSmallImg = oSmall.getElementsByTagName('img');	//小图集合
				var oSelected = document.getElementById('selected');//选中图标
				var oCurImg = document.getElementById('curImg');	//当前图片
				var oBigImg = document.getElementById('bigImg');	//当前大图
				var oLayer = document.getElementById('layer');		//移动层
				var oMark = document.getElementById('mark');		//移动块
				var reSrc = /(.*)(_)(\d+)(x)(\d+)(\.[jpg|jpeg|png]{3,4})$/g;	//路径匹配正则
				oCurImg.src = aSmallImg[0].src.replace(reSrc,function($0,$1,$2,$3,$4,$5,$6){	//替换当前展示图路径
					return $1+$2+'460'+$4+'460'+$6;
				});
				oBigImg.src = aSmallImg[0].src.replace(reSrc,function($0,$1,$2,$3,$4,$5,$6){ //替换大图路径
					return $1+$2+'1000'+$4+'1000'+$6;
				})
				for(var i=0;i<aSmallImg.length;i++){	//给小图加点击事件
					aSmallImg[i].onclick=function(){
						oSelected.style.left = this.offsetLeft + 'px';	//设置被选中图标
						oCurImg.src = this.src.replace(reSrc,function($0,$1,$2,$3,$4,$5,$6){	//替换当前展示图路径
							return $1+$2+'460'+$4+'460'+$6;
						});
						oBigImg.src = this.src.replace(reSrc,function($0,$1,$2,$3,$4,$5,$6){ //替换大图路径
							return $1+$2+'1000'+$4+'1000'+$6;
						})
					}
				}

				var scaleW=0;	//宽度比例
				var scaleH=0;	//高度比例
				//移入
				oLayer.onmouseover=function(){
					oBig.style.display = 'block';		//显示大图
					oMark.style.display = 'block';		//显示移动块
					/** 计算比例 **/
					scaleW = oBigImg.offsetWidth/oCurImg.offsetWidth;
				 	scaleH = oBigImg.offsetHeight/oCurImg.offsetHeight;
				 	/** 设置移动块宽高 **/
				 	oMark.style.width = oBig.offsetWidth/scaleW +'px';
				 	oMark.style.height = oBig.offsetHeight/scaleH +'px';
				}
				//移动
				oLayer.onmousemove=function(ev){
					var oEvent = ev || event;	//事件对象
					/** 获取left top 值 **/
					var iLeft = oEvent.clientX -oMain.offsetLeft- oCur.offsetLeft - Math.floor(oMark.offsetWidth/2);
					var iTop = (oEvent.clientY+$(window).scrollTop())-oMain.offsetTop-(oMark.offsetHeight/2);

					/** 限制范围 **/
					if(iLeft<0){
						iLeft=0;
					}else if(iLeft>oCur.offsetWidth-oMark.offsetWidth){
						iLeft = oCur.offsetWidth-oMark.offsetWidth;
					}
					if(iTop<0){
						iTop=0;
					}else if(iTop>oCur.offsetHeight-oMark.offsetHeight){
						iTop = oCur.offsetHeight-oMark.offsetHeight;
					}
					// 设置移动块位置
					oMark.style.left = iLeft +'px';
					oMark.style.top = iTop +'px';
					//设置大图显示区域
					oBigImg.style.left = -scaleW*iLeft +'px';
					oBigImg.style.top = -scaleH*iTop +'px';
				}
				//离开
				oLayer.onmouseout=function(){
					oBig.style.display = 'none';
					oMark.style.display = 'none';
				}
}
			function getByClass(sName,oParent){
				var oParent = oParent || document;
				var obj = oParent.getElementsByTagName('*');
				var re = new RegExp('\\b'+sName+'\\b','i');
				var result = [];
				for(var i=0;i<obj.length;i++){
					if(re.test(obj[i].className)){
						result.push(obj[i]);
					}
				}
				return result;
			}

$(function(){
	$('.goods-size').each(function(){
		var self = this;
		$(this).find('a').eq(0).addClass('selected');
		$(this).find('a').click(function(){
			var tid = $(this).attr('tid');
			$(self).find('a').removeClass('selected');
			$(self).find('.post_form').val(tid);
			$(this).addClass('selected');
		});
	})
	addEnable()
	$('#goods-num .prev').click(function(){
		var num = Number($(this).siblings('.nums').val());
		if(num>1){
			$(this).siblings('.nums').val(num-1);
		}
		addEnable()
	})
	$('#goods-num .next').click(function(){
		var num = Number($(this).siblings('.nums').val());
		var cun = Number($(this).siblings('.nums').attr('kucun'));
		if(num<cun){
			$(this).siblings('.nums').val(num+1);
		}
		addEnable()
	})
	$('#goods-buy a').click(function(){
		$('#goodsForm')[0].submit();
	})
})
	function addEnable(){
		var iNum = Number($('#goods-num .nums').val());
		var iCun = Number($('#goods-num .nums').attr('kucun'))
		if(iNum>1){
			$('#goods-num .prev').addClass('enable')
		}else{
			$('#goods-num .prev').removeClass('enable')
		}
		if(iNum<iCun){
			$('#goods-num .next').addClass('enable')
		}else{
			$('#goods-num .next').removeClass('enable')
		}
	}