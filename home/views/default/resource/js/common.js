
function GetId(id){
    return document.getElementById(id);
};
function getElementsByClassName(node,className){
	if(node.getElementsByClassName){
		return node.getElementsByClassName(className);
	}else{
		var results = new Array();
		var elems = node.getElementsByTagName("*");
		for (var i = 0; i < elems.length; i++) {
			if(elems[i].className.indexOf(className) != -1){
				results[results.length] = elems[i];
			}
		};
		return results;
	}
}

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
(function(){
    $("#header").pin();
})();
function a(){
	(function(){
    /*  遮蔽动画 */
	function Animation(name,now,target){
            now = now - 0.1;
            Css.call(GetId("register"),name,now);
            if(now < 0.5){
                Css.call(GetId("shadow_all"),name,now);
            };
        if(now <= target){
            Css.call(GetId("register"),"display","none");
            Css.call(GetId("shadow_all"),"display","none");
            return;
        };
        setTimeout(function(){
            Animation(name,now,target);
        },100);
    };
    function Animation_show(name,now,target){
        now = now + 0.1;
        Css.call(GetId("register"),name,now);
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
    Event.call(GetId("cancle"),"click",function(){
        if(document.addEventListener){
            Css.call(document.body,"overflow","scroll");
            Animation.call(GetId("register"),"opacity",1,0);
        }else{
            Css.call(GetId("register"),"display","none");
            Css.call(GetId("shadow_all"),"display","none");
        }
    },false);
    Event.call(GetId("register_show"),"click",function(){
        if(document.addEventListener){
            Css.call(document.body,"overflow","hidden");
            Css.call(GetId("register"),"display","block");
            Css.call(GetId("shadow_all"),"display","block");
            Animation_show.call(GetId("register"),"opacity",0,1);
        }else{
            Css.call(GetId("register"),"display","block");
            Css.call(GetId("shadow_all"),"display","block");
        }
    },false);
})();
(function(){
    /*  遮蔽动画 */
    function Animation(name,now,target){
            now = now - 0.1;
            Css.call(GetId("login"),name,now);
            if(now < 0.5){
                Css.call(GetId("shadow_all"),name,now);
            };
        if(now <= target){
            Css.call(GetId("login"),"display","none");
            Css.call(GetId("shadow_all"),"display","none");
            return;
        };
        setTimeout(function(){
            Animation(name,now,target);
        },100);
    };
    function Animation_show(name,now,target){
        now = now + 0.1;
        Css.call(GetId("login"),name,now);
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
    Event.call(GetId("cancle2"),"click",function(){
        if(document.addEventListener){
            Css.call(document.body,"overflow","scroll");
            Animation.call(GetId("login"),"opacity",1,0);
        }else{
            Css.call(GetId("login"),"display","none");
            Css.call(GetId("shadow_all"),"display","none");
        }
    },false);
    Event.call(GetId("login_show"),"click",function(){
        if(document.addEventListener){
            Css.call(document.body,"overflow","hidden");
            Css.call(GetId("login"),"display","block");
            Css.call(GetId("shadow_all"),"display","block");
            Animation_show.call(GetId("login"),"opacity",0,1);
        }else{
            Css.call(GetId("login"),"display","block");
            Css.call(GetId("shadow_all"),"display","block");
        }
    },false);
})();
}
if(document.getElementById("register_show")){
    a();
}