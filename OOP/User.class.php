<?php
	//这个用户类是规范子类的字段和方法
	abstract class User{
		protected $_uname;
		protected $_pwd;
		protected $_notpwd;
		protected $_email;
		//登录和注册都用这个方法
		abstract function _query();
		//验证
		abstract function _check();
	}

?>