// 改变导航字体颜色
(function(){
    var navA = document.getElementById("nav").getElementsByTagName("ul")[0].getElementsByTagName("a");
    navA[3].style.color = "#fff";
    if(navA[0].addEventListener){
        for(var i = 0; i < navA.length; i++){
            navA[i].addEventListener("mouseover",change(i), false);
            navA[i].addEventListener("mouseout",changeout(i), false);
        }
    }
    function change(i){
        return function(){
            navA[i].style.color = "#fff";
            for(var m = 0;m < 4;m++){
                if(m != i){
                    navA[m].style.color = "#4b9eff";
                }
            }
        };
    }
    function changeout(i){
        return function(){
            navA[3].style.color = "#fff";
            for(var m = 0;m < 4;m++){
                if(m != 3){
                    navA[m].style.color = "#4b9eff";
                }
            }
        }
    }
})();


/**
 * Created with JetBrains WebStorm.
 * User: Administrator
 * Date: 13-8-25
 * Time: 下午2:41
 * To change this template use File | Settings | File Templates.
 */
function Waterfall(param){
    this.id = typeof param.container == 'string' ? document.getElementById(param.container) : param.container;
    this.colWidth = param.colWidth;
    this.colCount = param.colCount || 3;
    this.cls = param.cls && param.cls != '' ? param.cls : 'content';
    this.init();
}
Waterfall.prototype = {
    getByClass:function(cls,p){
        var arr = [],reg = new RegExp("(^|\\s+)" + cls + "(\\s+|$)","g");
        var nodes = p.getElementsByTagName("*"),len = nodes.length;
        for(var i = 0; i < len; i++){
            if(reg.test(nodes[i].className)){
                arr.push(nodes[i]);
                reg.lastIndex = 0;
            }
        }
        return arr;
    },
    maxArr:function(arr){
        var len = arr.length,temp = arr[0];
        for(var ii= 1; ii < len; ii++){
            if(temp < arr[ii]){
                temp = arr[ii];
            }
        }
        return temp;
    },
    getMar:function(node){
        var dis = 0;
        if(node.currentStyle){
            dis = parseInt(node.currentStyle.marginBottom);
        }else if(document.defaultView){
            dis = parseInt(document.defaultView.getComputedStyle(node,null).marginBottom);
        }
        return dis;
    },
    getMinCol:function(arr){
        var ca = arr,cl = ca.length,temp = ca[0],minc = 0;
        for(var ci = 0; ci < cl; ci++){
            if(temp > ca[ci]){
                temp = ca[ci];
                minc = ci;
            }
        }
        return minc;
    },
    init:function(){
        var _this = this;
        var col = [],//列高
            iArr = [];//索引
        var nodes = _this.getByClass(_this.cls,_this.id),len = nodes.length;
        for(var i = 0; i < _this.colCount; i++){
            col[i] = 0;
        }
        for(var i = 0; i < len; i++){
            nodes[i].h = nodes[i].offsetHeight + _this.getMar(nodes[i]);
            iArr[i] = i;
        }

        for(var i = 0; i < len; i++){
            var ming = _this.getMinCol(col);
            nodes[i].style.left = ming * _this.colWidth + "px";
            nodes[i].style.top = col[ming] + "px";
            col[ming] += nodes[i].h;
        }

        _this.id.style.height = _this.maxArr(col) + "px";
    }
};
new Waterfall({
    "container":"wrapper",
    "colWidth":270,
    "colCount":3
});
(function(){
    var gotop = document.getElementById('top');
    gotop.onclick = function(){
        window.scrollTo(0,0);
    }
})();


function GetId(id){
    return document.getElementById(id);
};

function Event(eventname,callfunction,justfity){
    if(document.addEventListener){
        this.addEventListener(eventname,callfunction,justfity)
    }else{
        this.attachEvent("on"+eventname,callfunction)
    }
};
function Css(name,value){
    this.style[name] = value;
};

function woyaobiaobai(){
    /*  遮蔽动画 */
    function Animation(name,now,target){
            now = now - 0.1;
            Css.call(GetId("small_window"),name,now);
            if(now < 0.5){
                Css.call(GetId("shadow_all"),name,now);
            };
        if(now <= target){
            Css.call(GetId("small_window"),"display","none");
            Css.call(GetId("shadow_all"),"display","none");
            return;
        };
        setTimeout(function(){
            Animation(name,now,target);
        },100);
    };
    function Animation_show(name,now,target){
        now = now + 0.1;
        Css.call(GetId("small_window"),name,now);
        if(now < 0.5){
            Css.call(GetId("shadow_all"),name,now);
        };
        if(now >= target){
            return;
        };
        setTimeout(function(){
            Animation_show(name,now,target);
        },50);
    };
    Css.call(GetId("shadow_all"),"height",document.body.scrollHeight + "px");
    Css.call(GetId("shadow_all"),"width",document.body.scrollWidth + "px");
    Event.call(GetId("cancle3"),"click",function(){
        if(document.addEventListener){
            Css.call(document.body,"overflow","scroll");
            Animation.call(GetId("small_window"),"opacity",1,0);
        }else{
            Css.call(GetId("small_window"),"display","none");
            Css.call(GetId("shadow_all"),"display","none");
        }
    },false);
    Event.call(GetId("small_show"),"click",function(){
        if(document.addEventListener){
            Css.call(document.body,"overflow","hidden");
            Css.call(GetId("small_window"),"display","block");
            Css.call(GetId("shadow_all"),"display","block");
            Animation_show.call(GetId("small_window"),"opacity",0,1);
        }else{
            Css.call(GetId("small_window"),"display","block");
            Css.call(GetId("shadow_all"),"display","block");
        }
    },false);
};
if(document.getElementById("register_show")){
    document.getElementById("small_show").onclick = function(){
        alert("要先登录哟亲~")
    }
}else{
    woyaobiaobai();
}


(function(){
    var clicknum = 0;
    $("#checkimg").click(function(){
        $("#check").click();
        clicknum++;
        if (clicknum % 2 != 0) {
            $("#checkimg").css('background-image','url(../images/checkbox.png)');
        }else if(clicknum % 2 == 0){
            $("#checkimg").css('background-image','url(../images/check.png)');
        }
    })
})();

(function(){
    var clicknum = 0;
    var checkimg = document.getElementById("checkimg")
    if (checkimg.addEventListener) {
        checkimg.addEventListener("click",function(){
            numChange1();
        }, false);
    }else{
        checkimg.attachEvent("onclick", function(){
            numChange1();
        })
    };
    function numChange1(){
        clicknum++;
        if(clicknum % 2 != 0){
            checkimg.style.background = "url(/lovewall/home/views/default/resource/images/checkbox.png)";
        }else if(clicknum % 2 == 0){
            checkimg.style.background = "url(/lovewall/home/views/default/resource/images/check.png)";
        }
    }
    $("#checkimg").click(function(){
        $("#check").click();
    })
})();
//xiangce
(function(){
		function Animation(name,now,target){
	        now = now - 0.1;
	        Css.call(GetId("photobox"),name,now);
	        if(now < 0.5){
	        	Css.call(GetId("shadow_all"),name,now);
	        };
	        if(now <= target){
	        	Css.call(GetId("photobox"),"display","none");
	        	Css.call(GetId("shadow_all"),"display","none");
	        	return;
	        };
	        setTimeout(function(){
	        	Animation(name,now,target);
	        },100);
		};
	function Animation_show(name,now,target){
	    now = now + 0.1;
	    Css.call(GetId("photobox"),name,now);
	    if(now < 0.5){
	        Css.call(GetId("shadow_all"),name,now);
	    };
	    if(now >= target){
	        return;
	    };
	    setTimeout(function(){
	        Animation_show(name,now,target);
	    },50);
	};
	Css.call(GetId("shadow_all"),"height",document.body.scrollHeight + "px");
	Css.call(GetId("shadow_all"),"width",document.body.scrollWidth + "px");
	Event.call(GetId("cancle4"),"click",function(){
	    if(document.addEventListener){
	        Css.call(document.body,"overflow","scroll");
	        Animation.call(GetId("photobox"),"opacity",1,0);
	    }else{
	        Css.call(GetId("photobox"),"display","none");
	        Css.call(GetId("shadow_all"),"display","none");
	    }
	},false);
	function showPhotos(i){
        return function(){
            for(var m = 0;m < info.length; m++){
                if(m != i){
                    info[m].setAttribute("id", "");
                }
            }
            info[i].setAttribute("id", "this_photo");
        	$("#image").html(" ");
			var id = $("#this_photo").find("img").attr('xid');
            function handle(){	
            	var str = id;
                $.getJSON('/lovewall/index.php/originality/clicker',
                	{
                    	data: str
                	},
                    function(response){
                		var bigImage = GetId("placeholder");
                        var autoimage = GetId("image");
                        for (var m = 0; m < response.length; m++) {
                            var li = document.createElement("li");
                            var img = document.createElement("img");
                            img.setAttribute("src", "/lovewall/lovewall/public/uploads/" + response[m][0]);
                            img.setAttribute("title", response[m][1]);
                            img.setAttribute("class", "ppt_smallphotos");
                            if(m == 0){
                            	bigImage.setAttribute("src","/lovewall/lovewall/public/uploads/" + response[m][0]);
                            	img.setAttribute("title", response[m][1]);
                            	img.setAttribute("id","photo_on");
                            }
                            li.appendChild(img);
                            autoimage.appendChild(li);
                        }
                   }
                );
                        
            }
            handle();
            if(document.addEventListener){
                Css.call(document.body,"overflow","hidden");
                Css.call(GetId("photobox"),"display","block");
                Css.call(GetId("shadow_all"),"display","block");
                Animation_show.call(GetId("photobox"),"opacity",0,1);
            }else{
                Css.call(GetId("photobox"),"display","block");
                Css.call(GetId("shadow_all"),"display","block");
            }
            setTimeout(function(){
            	xiangce();
            },1000);
        }
        
    }            
    	
	var info = $("div").children(".info");
    for (var i = 0; i < info.length; i++) {
        Event.call(info[i],"click",showPhotos(i),false);
    };
})();

function xiangce(){
    var img_with = 110;
    var left = 0;
    var m = 0;
    var pptLi = document.getElementById("image").getElementsByTagName("li");
    var pptLinum = pptLi.length - 5;
    var x = 0;
    // small picture slide
    function change_left(){
        var l = GetId("image").style.left;
        if(l = " "){
            left = 0;
        }
        else{
            left = l;
        }
    };
    change_left();
    var smallright = GetId("smallright"); 
    if (smallright.addEventListener) {
        smallright.addEventListener("click",function(){
            slideright();
        }, false);
    }else{
        smallright.attachEvent("onclick", function(){
            slideright();
        });
    };
    function slideright(){
        if(x == pptLinum){

        }else{
            left++;
            GetId("image").style.left = -left + "px";
            var t = setTimeout(function(){
                slideright();
            },5);
            if(left % img_with == 0){
                clearTimeout(t);
                x++;
            }
        }
    };

    var smallleft = GetId("smallleft"); 
    if (smallleft.addEventListener) {
        smallleft.addEventListener("click",function(){
            slideleft();
        }, false);
    }else{
        smallleft.attachEvent("onclick", function(){
            slideleft();
        });
    };
    function slideleft(){
        if(x == 0){

        }else{
            left--;
            if(x == 0){
                return;
            };
            GetId("image").style.left = -left + "px";
            var t = setTimeout(function(){
                slideleft();
            },5);
            if(left % img_with == 0){
                clearTimeout(t);
                x--;
            }
        }
    };
    // small picture slide
    // big picture change
    function bigPicture(){
        var gallery = GetId("image");
        var links = gallery.getElementsByTagName("img");
        function showPic(whichpic) {
            whichpic.setAttribute("id", "photo_on");
            var source = whichpic.getAttribute("src");
            var placeholder = document.getElementById("placeholder");
            placeholder.setAttribute("src",source);
            if (whichpic.getAttribute("title")) {
                var text = whichpic.getAttribute("title");
            } else {
                var text = "";
            };
            var description = document.getElementById("description");
            if (description.firstChild.nodeType == 3) {
                description.firstChild.nodeValue = text;
            }
            return false;
        };
        function prepareGallery(){
            for(var i = 0 ; i < links.length; i++){
                links[i].onclick = function(){
                    for(var n = 0; n < i;n++){
                        if(n != i){
                            links[n].setAttribute("id", "");
                        };
                    };
                    return showPic(this);
                };
            }
        }
        prepareGallery();
        function xiayige(){
        	$("#turnright").bind("click",function(){
	            $("#photo_on").parent().next('li').find('img').click()
	        });
	        $("#turnleft").bind("click",function(){
	            $("#photo_on").parent().prev('li').find('img').click()
	        });
        }
	    xiayige();
        function addLoadEvent(func) {
            var oldonload = window.onload;
            if (typeof window.onload != 'function') {
                window.onload = func;
            } else {
                window.onload = function() {
                    oldonload();
                    func();
                }
            }
        }
        addLoadEvent(prepareGallery);

    };
    bigPicture();

}
//zishuxianzhi
(function(){
    function GetId(name){
        return document.getElementById(name);
    };
    var wordsize;
    var maxlength = 140;
    function cleartitle(){
        GetId("iwish_text").innerHTML = "";
        GetId("iwish_text").style.color = "black";
    };
    Event.call(GetId("iwish_text"),"click",function(){
        cleartitle();
        getwordsize();
    },false);
    // GetId("iwish_text").addEventListener("click", function(){
    //     cleartitle();
    //     getwordsize();
    // }, false);
    function getwordsize(){
        wordsize = GetId("iwish_text").value.length;
        setTimeout(function(){
            getwordsize();
            setwordsize();
        }, 100);
    };
    function setwordsize(){
        var maxText = GetId("iwish_text").getAttribute("maxlength");
        if(wordsize >= maxlength){ 
            GetId("iwish_text").value = GetId("iwish_text").value.substring(0,maxlength); 
        }
        GetId("wordsize").innerHTML = "(" + wordsize + "/140)";
    };
})();

    