<?php

	class wechatCallbackapiTest
	{
		public function valid()
		{
			$echoStr = $_GET["echostr"];

			//valid signature , option
			if($this->checkSignature()){
				echo $echoStr;
				exit;
			}
		}

		public function responseMsg()
		{
			//得到传过来的数据，当可能是不同的接收环境
			$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

			//提取post数据
			if (!empty($postStr)){
					
					$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
					$fromUsername = $postObj->FromUserName;
					$toUsername = $postObj->ToUserName;
					$keyword = trim($postObj->Content);
					$time = time();
					$textTpl = "<xml>
								<ToUserName><![CDATA[%s]]></ToUserName>
								<FromUserName><![CDATA[%s]]></FromUserName>
								<CreateTime>%s</CreateTime>
								<MsgType><![CDATA[%s]]></MsgType>
								<Content><![CDATA[%s]]></Content>
								<FuncFlag>0</FuncFlag>
								</xml>";
					$content=checkContent($keyword);
					if(!empty($content))
					{
						$msgType = "text";
						$contentStr = "投稿成功！将会提交到管理员审核！";
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
						echo $resultStr;
					}else{
						echo "请发送 #lw#+投稿内容 到勇敢爱平台。。。";
					}

			}else {
				echo "";
				exit;
			}
		}
			
		private function checkSignature()
		{
			$signature = $_GET["signature"];
			$timestamp = $_GET["timestamp"];
			$nonce = $_GET["nonce"];	
					
			$token = TOKEN;
			$tmpArr = array($token, $timestamp, $nonce);
			sort($tmpArr);
			$tmpStr = implode( $tmpArr );
			$tmpStr = sha1( $tmpStr );
			
			if( $tmpStr == $signature ){
				return true;
			}else{
				return false;
			}
		}
		
		
		/*
		检查用户的内容
		*/
		private function checkContent($content){
			$pattern = '/^(#lw#+)(.*)/Ui';
			preg_match_all($pattern,$content,$t_content);
			if(!empty($t_content[2])){
				return $t_content[2];
			}else{
				return null;
			}
		
		}
		
		
	}

?>