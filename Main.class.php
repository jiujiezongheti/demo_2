<?php
	class Main{
		private $_index;
		private $_send;
		//构造方法，用来初始化数据的
		public function __construct($_index=''){
			$this->_index = $_index;
			$this->_send = isset($_POST['send'])?$_POST['send']:'';
		}


		//总管
		public function _run(){
			//处理数据
			$this->_send();
			//载入界面
			include $this->_ui();
		}
		/**
		 * [_ui 载入界面方法]
		 * @return [string] [需要载入界面的路径]
		 */
		private function _ui(){
			$this->_index = !file_exists($this->_index.'.inc.php')?'start':$this->_index;
			return $this->_index.'.inc.php';
		}

		//创建一个方法接收登录注册数据
		private function _send(){
			switch ($this->_send) {
				case '注册':
					$this->_exec(new Reg($_POST['uname'],$_POST['pwd'],$_POST['notpwd'],$_POST['email']));
					break;
				case '登录':
					$this->_exec(new Login($_POST['uname'],$_POST['pwd']));
					break;
				default:
					# code...
					break;
			}
		}
		//创建一个执行的方法
		private function _exec($_class){
			$_class->_query();
		}
	}
?>