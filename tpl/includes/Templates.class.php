<?php
//模板解析类
class Templates{
	private $_vars = array();
	//创建一个构造方法，检查目录是否存在
	public function __construct(){
		if(!is_dir(TPL_DIR)||!is_dir(TPL_C_DIR)||!is_dir(CACHE)){
			exit('error:模板目录或缓存目录或编译目录不存在');
		}
	}

	//载入方法
	public function display($file){
		$_tplfile = TPL_DIR.$file;//模板文件路径
		if(!file_exists($_tplfile)){
			exit('error:模板文件不存在');
		}
		//生成编译文件
		$_parfile = TPL_C_DIR.md5($file).$file.'.php';
		//当编译文件不存在或者模板文件修改过开始生成编译文件
		if(!file_exists($_parfile)||filemtime($_parfile)<filemtime($_tplfile)){
			require ROOT_PATH.'/includes/Parser.class.php';
			$parser = new Parser($_tplfile);//模板文件
			$parser->compile($_parfile);
		}
		
		//载入编译文件
		include $_parfile;
	}

	//注入方法assign()
	public function assign($_var,$_value){
		if(isset($_var)&&!empty($_var)){
			$this->_vars[$_var] = $_value;
		}else{
			exit('error:设置模板变量');
		}
	}

}
?>