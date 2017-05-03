<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>会员系统</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
  function __autoload($_className){
    require $_className.'.class.php';
  }
  $_index = isset($_GET['index'])?$_GET['index']:'';
  //实例化主类
  $_main = new Main($_index);
  //运行
  $_main->_run();
?>
</body>
</html>