<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>自定义模板</title>
</head>
<body>
	<?php /* php注释 */?>
	<?php echo $this->_vars['name'];?><?php echo $this->_vars['content'];?>
	<br>
	<?php if($this->_vars['a']){;?>
		<div>界面1</div>
	<?php }else{?>
		<div>界面2</div>
	<?php };?>
</body>
</html>