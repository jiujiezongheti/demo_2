<?php
	//登录类
	class Login extends User{
		public function __construct($_uname,$_pwd){
			$this->_uname = $_uname;
			$this->_pwd = $_pwd;
		}

		//从xml中读取信息
		public function _query(){
			//载入xml文件
			$_sxe = simplexml_load_file('user.xml');
			if($_sxe->uname==$this->_uname&&$_sxe->pwd==$this->_pwd){
				echo '登录成功';
			}else{
				echo '登录失败';
			}
		}

		
		public function _check(){
			
		}
	}

?>