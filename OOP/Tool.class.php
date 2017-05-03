<?php
	//辅助工具类，里面放的都是静态方法
	final class Tool{
		//弹出信息，跳转到指定的页面
		static public function _alertLocation($_info,$_url){
			echo "<script>alert('$_info');location.href='$_url'</script>";
			exit();
		}
		//弹窗，返回之前页面
		static public function _alertBack($_info){
			echo "<script>alert('$_info');history.back();</script>";
		}
	}
?>