<!DOCTYPE html>
<html lang="en">
<head>
<title>首页内容管理后台</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1>首页管理</h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">你好，<?php echo $username;?></span></a></li>
    <li class=""><a title="" href="./personset.do"><i class="icon icon-cog"></i> <span class="text">个人设置</span></a></li>
    <li class=""><a title="" href="./login.do"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
  </ul>
</div>

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
  <?php
	if($roles == 1){
  ?>
	<li<?php echo $methodname == 'menu' ? ' class="active"':'';?>><a href="menu.do"><i class="icon icon-sitemap"></i> <span>首页栏目管理</span></a></li>
	<li<?php echo $methodname == 'editor' ? ' class="active"':'';?>><a href="editor.do"><i class="icon icon-user"></i> <span>编辑人员管理</span></a></li>
<?php
	}

	foreach($mycontrolmenu as $menu){
		$prviewmenuid = $menu['id'];
		echo '<li' . ($methodname == 'menulist' && $menuid ==  $menu['id']? ' class="active"':'') . '><a href="menulist.do?menuid='.$menu['id'].'"><i class="icon icon-th"></i> <span>'.$menu['menuname'].'</span></a></li>';
	}
  ?>
	<li><a href="preview.do" target="_blank"><i class="icon icon-eye-open"></i> <span>首页预览</span></a></li>
	 <?php
	if($roles == 1){
  ?>
	<li<?php echo $methodname == 'mkindex' ? ' class="active"':'';?>><a href="mkindex.do?menuid=<?php echo $prviewmenuid;?>"><i class="icon icon-camera"></i> <span>重新生成首页</span></a></li>
<?php
	}
	?>
  </ul>
</div>