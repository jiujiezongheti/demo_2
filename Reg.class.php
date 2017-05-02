<?php
	//注册类
	class Reg extends User{
		//写一个构造方法来接收表单的值
		public function __construct($_uname,$_pwd,$_notpwd,$_email){
			$this->_uname = $_uname;
			$this->_pwd = $_pwd;
			$this->_notpwd = $_notpwd;
			$this->_email = $_email;
		}
		//将信息注册到xml中
		public function _query(){
			//xml字符串
			$_xml=<<<_xml
<?xml version="1.0" encoding="utf-8"?>
<user>
	<uname>$this->_uname</uname>
	<pwd>$this->_pwd</pwd>
	<email>$this->_email</email>
</user>
_xml;
			//创建simplexml类
			$_sxe = new SimpleXMLElement($_xml);
			//生成xml
			$_sxe->asXML('user.xml');
		}
		public function _check(){
			
		}
	}

?>