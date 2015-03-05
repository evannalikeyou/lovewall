<?php
	define("DEBUG","0");				      	//开启调试模式 1 开启 0 关闭
	define("DRIVER","pdo");				    	//数据库的驱动，本系统支持pdo(默认)和mysqli两种
	//define("DSN", "mysql:host=localhost;dbname=lovewall"); //如果使用PDO可以使用，不使用则默认连接MySQL
	define("HOST", "172.22.161.6");				//数据库主机
	define("USER", "redrock");                 	//数据库用户名
	define("PASS", "hongyanredrock");               	//数据库密码
	define("DBNAME","bravelove");				//数据库名
	define("TABPREFIX", "bl_");             	//数据表前缀
	define("CSTART","0");
	define("CTIME","604800");            		//缓存时间
	define("TPLPREFIX", "html");             	//模板文件的后缀名
	define("TPLSTYLE", "default");          	//默认模板存放的目录

	define("TITLE","勇敢爱");						//网站标题
	define("KEYWORDS","勇敢爱、表白墙、重邮表白墙");	//网站关键字
	define("DESC","lamp技术论坛，描述,fsdalkfdsfdsa");					//网站简述
	define("WXTGPREFIX","520");          		//设置微信投稿分配的id号前缀
	define("WXTGXZNUM","2");          			//设置微信用户投稿每天的限制条数
	define("WXXYXZNUM","2");          			//设置微信用户投稿每天的限制条数