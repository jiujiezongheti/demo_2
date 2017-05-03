<?php
//模板解析类
class Parser{
	private $_tpl;
	//构造方法
	public function __construct($_tplfile){
		if(!$this->_tpl = file_get_contents($_tplfile)){
			exit('error:模板文件读取错误');
		}
	}
	//对外公共方法
	public function compile($_parfile){
		//解析模板内容
		$this->_parvar();
		$this->_parif();
		$this->_par_common();
		//生成编译文件
		if(!file_put_contents($_parfile,$this->_tpl)){
			exit('error:编译文件出错');
		}
	}

	//解析普通变量
	private function _parvar(){
		$patten = '/\{\$([\w]+)\}/';
		if(preg_match($patten, $this->_tpl)){
			$this->_tpl = preg_replace($patten,"<?php echo \$this->_vars['$1'];?>",$this->_tpl);
		}
	}

	//解析if语句
	private function _parif(){
		$patten_start = '/\{if\s+\$([\w]+)\}/';
		$patten_end = '/\{\/if\}/';
		$patten_else = '/\{else\}/';
		if(preg_match($patten_start, $this->_tpl)){
			if(preg_match($patten_end,$this->_tpl)){
				$this->_tpl = preg_replace($patten_start,"<?php if(\$this->_vars['$1']){;?>",$this->_tpl);
				$this->_tpl = preg_replace($patten_end,"<?php };?>",$this->_tpl);
				if(preg_match($patten_else,$this->_tpl)){
					$this->_tpl = preg_replace($patten_else,"<?php }else{?>",$this->_tpl);
				}
			}else{
				exit('error:if语句没有闭合');
			}
		}
	}

	//php注释
	private function _par_common(){
		$patten = '/\{#\}(.*)\{#\}/';
		if(preg_match($patten,$this->_tpl)){
			$this->_tpl = preg_replace($patten,"<?php /* $1 */?>",$this->_tpl);
		}
	}
}
?>