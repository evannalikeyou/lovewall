// 改变导航字体颜色
(function(){
    var navA = document.getElementById("nav").getElementsByTagName("ul")[0].getElementsByTagName("a");
    navA[1].style.color = "#fff";
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
            navA[1].style.color = "#fff";
            for(var m = 0;m < 4;m++){
                if(m != 1){
                    navA[m].style.color = "#4b9eff";
                }
            }
        }
    }
})();

function getLocalTime(nS) {   
   return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');   
}

$(function(){
	$('.lookDetail').click(function(){
		var no_audit=$(this).next('input').val();
		$.ajax({
			type:'post',
			url:'/lovewall/index.php/myCenter/lookDetail',
			data:'no_audit='+no_audit,
			success:function(data){
				$$('#show_info').center(200,100).show();
				data=JSON.parse(data);
				var html='<dd>理由:</dd><dd>'+data.reason+'</dd>';
				$('.add').html(html);
			},
			async:true
		})	
	});	
	
	$('#delete').click(function(){
		var did=$(this).attr('did');
		var tr=$(this).parent().parent();
		$.ajax({
			type:'post',
			url:'/lovewall/index.php/myCenter/delete_wish_or_profess',
			data:'id='+did,
			success:function(data){
				if(data==1){
					alert('删除成功！');
					tr.remove();
				}
			},
			async:false
		})	
	});	
});
