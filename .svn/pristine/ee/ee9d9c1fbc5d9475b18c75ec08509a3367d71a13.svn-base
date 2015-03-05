(function(){
	var navA = document.getElementById("nav").getElementsByTagName("ul")[0].getElementsByTagName("a");
	if(navA[0].addEventListener){
	for(var i = 0; i < navA.length; i++){
		navA[i].addEventListener("mouseover",change(i), false);
		navA[i].addEventListener("mouseout",changeout(i), false);
	}
	};
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
			navA[0].style.color = "#fff";
			for(var m = 0;m < 4;m++){
				if(m != 0){
					navA[m].style.color = "#4b9eff";
				}
			}
		}
	}
})();


(function(){
	var bodyWidth,bodyHeight;
	function autoSize(){
		var multiple = 478/1175;
		function getsize(){
			bodyWidth = document.documentElement.clientWidth;
			bodyHeight = bodyWidth * multiple;
		};
		getsize();
		function setsize(){
			var main = document.getElementById("main");
			main.style.width = bodyWidth + "px";
			main.style.height = bodyHeight + "px";
			main.style.backgroundSize = bodyWidth + "px" + " " +  bodyHeight + "px";
		}
		setsize();
		};
		autoSize();
		function autoPicture(name,mulW,mul2,mulL,mulT){
			var something = document.getElementById(name);
			var width = bodyWidth * mulW;
			var height = width * mul2;
			something.style.width = width + "px";
			something.style.height = height + "px";
			something.style.backgroundSize = width + "px",height + "px";
			something.style.left = bodyWidth * mulL + "px";
			something.style.top = bodyHeight * mulT + "px";
		};
		var a = 1175,b = 472;
		function boy(){
			mulW = 214/a;
			mul2 = 363/214;
			mulL = 710/a;
			mulT = 75/b;
			autoPicture("boy",mulW,mul2,mulL,mulT);
		}
		function heart1(){
			mulW = 140/a;
			mul2 = 95/140;
			mulL = 0;
			mulT = 0;
			autoPicture("heart1",mulW,mul2,mulL,mulT);
			autoPicture("heart2",mulW,mul2,mulL,mulT);
			autoPicture("heart3",mulW,mul2,mulL,mulT);
		}
		function treeAll(){
			mulW = 194/a;
			mul2 = 300/194;
			mulL = 165/a;
			mulT = 135/b;
			autoPicture("tree",mulW,mul2,mulL,mulT);
		}
		function leavesAll(){
			mulW = 194/a;
			mul2 = 300/194;
			mulL = 0;
			mulT = 0;
			autoPicture("leaves",mulW,mul2,mulL,mulT);
		}
		function leaves1(){
			mulW = 16/a;
			mul2 = 9/16;
			mulL = 20/a;
			mulT = 40/b;
			autoPicture("leaves1",mulW,mul2,mulL,mulT);
		}
		function leaves2(){
			mulW = 23/a;
			mul2 = 26/23;
			mulL = 50/a;
			mulT = 20/b;
			autoPicture("leaves2",mulW,mul2,mulL,mulT);
		}
		function leaves3(){
			mulW = 16/a;
			mul2 = 10/16;
			mulL = 100/a;
			mulT = 20/b;
			autoPicture("leaves3",mulW,mul2,mulL,mulT);
		}
		function leaves4(){
			mulW = 12/a;
			mul2 = 7/12;
			mulL = 140/a;
			mulT = 50/b;
			autoPicture("leaves4",mulW,mul2,mulL,mulT);
		}
		function tree1(){
			mulW = 194/a;
			mul2 = 187/194;
			mulL = 0;
			mulT = 0;
			autoPicture("tree1",mulW,mul2,mulL,mulT);
			autoPicture("tree2",mulW,mul2,mulL,mulT);
		}
		function flowerAll(){
			mulW = 250/a;
			mul2 = 124/278;
			mulL = 290/a;
			mulT = 310/b;
			autoPicture("flower",mulW,mul2,mulL,mulT);
		}
		function flower1(){
			mulW = 250/a;
			mul2 = 124/278;
			mulL = 0;
			mulT = 0;
			autoPicture("flower1",mulW,mul2,mulL,mulT);
			autoPicture("flower2",mulW,mul2,mulL,mulT);
			autoPicture("flower3",mulW,mul2,mulL,mulT);
			autoPicture("flower4",mulW,mul2,mulL,mulT);
			autoPicture("flower5",mulW,mul2,mulL,mulT);
		}

		boy();tree1();treeAll();heart1();flowerAll();flower1();leaves1();leavesAll();leaves2();leaves3();leaves4();

		var heartAll = document.getElementById("heartAll");
		function heart(){
			function changeHeart(){
				$("#heart1").animate({opacity: '0'},800);  
				$("#heart2").animate({opacity: '1'},800);
				changeoutHeart();
			};
			function changeoutHeart(){
				$('#heart1').animate({opacity: '1'},800);  
				$('#heart2').animate({opacity: '0'},800);
			};
			changeHeart();
			var set = setTimeout(function(){
				heart();
			},800);
		};
		function flower(){
			function changeFlower(){  
				$("#flower2").animate({opacity: '1'},1000);
				$('#flower3').animate({opacity: '0'},1000);
				$('#flower4').animate({opacity: '0'},1000);
				changeFlower2();
			};
			function changeFlower2(){
				$("#flower2").animate({opacity: '1'},1000);
				$('#flower3').animate({opacity: '1'},1000);
				$('#flower4').animate({opacity: '0'},1000);
				changeFlower3();
			}
			function changeFlower3(){  
				$("#flower2").animate({opacity: '1'},1000);
				$('#flower3').animate({opacity: '1'},1000);
				$('#flower4').animate({opacity: '1'},1000);
				changeoutFlower();
			};
			function changeoutFlower(){
				$('#flower2').animate({opacity: '0'},1000);
				$('#flower3').animate({opacity: '0'},1000);
				$('#flower4').animate({opacity: '0'},1000);
			};
			changeFlower();
			var set = setTimeout(function(){
				flower();
			},800);
		};
	heart();flower();
	function Listener(point,change,changeout){
		if (point.addEventListener) {
				point.addEventListener("mouseover",change(), false);
		}else{
			point.attachEvent("onmouseover", change());
		};
		if (point.addEventListener) {
			point.addEventListener("mouseout",changeout(), false);
		}else{
			point.attachEvent("onmouseout", changeout());
		};
	};
	function heartChange(){
		function change(){
			return function(){
				$('#heart3').animate({opacity: '1'},800);
			};
		};
		function changeout(){
		return function(){
				$('#heart3').animate({opacity: '0'},800);
				heart();
			};
		};
		Listener(heartAll,change,changeout);
	};
	function treeChange(){
		var treeAll = document.getElementById("tree")
		var tree2 = document.getElementById("tree2")
		function change(){
			return function(){
				$('#tree2').animate({opacity: '1'},800);
			};
		};
		function changeout(){
		return function(){
				$('#tree2').animate({opacity: '0'},800);
			};
		};
		Listener(tree,change,changeout);
	};
	function flowerChange(){
		var flowers = document.getElementById("flower");
		function change(){
			return function(){
				$('#flower5').animate({opacity: '1'},800);
			};
		};
		function changeout(){
		return function(){
				$('#flower5').animate({opacity: '0'},800);
			};
		};
		Listener(flowers,change,changeout);
	}
	flowerChange();treeChange();heartChange();
	$("#header").pin();
})();

function leavesPiao(){
	var a = 1175,b = 472;
	var multiple = 478/1175;
	var bodyWidth = document.documentElement.clientWidth;
	var bodyHeight = bodyWidth * multiple;
	function piao1(){
		var mulL = 30/a,mulT = 60/b;
		var leaves = document.getElementById("leaves1");
		var basey = bodyHeight * mulT;
		function leaf(){
			basey++;
			para = 8;
			basex = Math.sin(basey)*para + 10;
			leaves.style.left = basex + "px";
			leaves.style.top = basey + "px";
			var a = setTimeout(function(){
				leaf();
			}, 150);
			if(basey >= bodyHeight - 250){
				clearTimeout(a);
			}
		}
		leaf();
	}
	piao1();
	function piao2(){
		mulL = 50/a,mulT = 80/b;
		var leaves = document.getElementById("leaves2");
		var basexx = bodyWidth * mulL;
		var basey = bodyHeight * mulT;
		function leaf(){
			basey++;
			para = 6;
			basex = Math.sin(basey)*para + basexx;
			leaves.style.left = basex + "px";
			leaves.style.top = basey + "px";
			var a = setTimeout(function(){
				leaf();
			}, 200);
			if(basey >= bodyHeight - 250){
				clearTimeout(a);
			}
		}
		leaf();
	}
	piao2();
	function piao3(){
		mulL = 100/a,mulT = 20/b;
		var leaves = document.getElementById("leaves3");
		var basexx = bodyWidth * mulL;
		var basey = bodyHeight * mulT;
		function leaf(){
			basey++;
			para = 6;
			basex = Math.sin(basey)*para + basexx;
			leaves.style.left = basex + "px";
			leaves.style.top = basey + "px";
			var a = setTimeout(function(){
				leaf();
			}, 150);
			if(basey >= bodyHeight - 250){
				clearTimeout(a);
			}
		}
		leaf();
	}
	piao3();
	function piao4(){
		mulL = 150/a,mulT = 60/b;
		var leaves = document.getElementById("leaves4");
		var basexx = bodyWidth * mulL;
		var basey = bodyHeight * mulT;
		function leaf(){
			basey++;
			para = 6;
			basex = Math.sin(basey)*para + basexx;
			leaves.style.left = basex + "px";
			leaves.style.top = basey + "px";
			var a = setTimeout(function(){
				leaf();
			}, 350);
			if(basey >= bodyHeight - 250){
				clearTimeout(a);
			}
		}
		leaf();
	}
	piao4();
};
leavesPiao();

