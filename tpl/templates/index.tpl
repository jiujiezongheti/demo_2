<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>自定义模板</title>
</head>
<body>
	{#}php注释{#}
	{$name}{$content}
	<br>
	{if $a}
		<div>界面1</div>
	{else}
		<div>界面2</div>
	{/if}
</body>
</html>