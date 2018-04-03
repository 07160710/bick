<?php 
if (! isset ( $_SESSION )) {
    session_start ();
}
if (! isset ( $_SESSION ['userName'] )) {
    header ( "location:login.php" );
}
$userName = $_SESSION ['userName'];
//计算当前文件名
$url = $_SERVER['PHP_SELF'];
$start = strrpos($url,'/');
$end = strrpos($url,'.');
$menuName = substr($url,$start+1,$end-$start-1);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>学生信息管理系统</title>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->
<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans'
    rel='stylesheet' type='text/css' />
    </head>
    <body>
    <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation"
        style="margin-bottom: 0">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span> <span
            class="icon-bar"></span> <span class="icon-bar"></span> <span
            class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">学生信息管理</a>
            </div>
            <div
            style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
            用户名：<?=$userName?>&nbsp;&nbsp;<a href='newpassword.php'>修改密码</a>&nbsp;&nbsp;<a href="loginout"
					class="btn btn-danger square-btn-adjust">退出登录</a>
			</div>
		</nav>
		<!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center"><img src="assets/img/find_user.png"
						class="user-image img-responsive" /></li>
					<li><a <?="index"==$menuName?"class='active-menu'":""?> href="index.php"><i
							class="fa fa-dashboard fa-3x"></i> 学生信息</a></li>
					<li><a <?="dashboard"==$menuName?"class='active-menu'":""?> href="dashboard.php"><i
							class="fa fa-dashboard fa-3x"></i> 仪表盘</a></li>
					<li><a <?="ui"==$menuName?"class='active-menu'":""?> href="ui.php"><i class="fa fa-desktop fa-3x"></i> UI
							元素</a></li>
					<li><a <?="tab-panel"==$menuName?"class='active-menu'":""?> href="tab-panel.php"><i class="fa fa-qrcode fa-3x"></i>
							选项卡和面板</a></li>
					<li><a <?="chart"==$menuName?"class='active-menu'":""?> href="chart.php"><i class="fa fa-bar-chart-o fa-3x"></i>
							图表</a></li>
					<li><a <?="table"==$menuName?"class='active-menu'":""?> href="table.php"><i class="fa fa-table fa-3x"></i>表格</a></li>
					<li><a <?="form"==$menuName?"class='active-menu'":""?> href="form.php"><i class="fa fa-edit fa-3x"></i> 表单 </a></li>
					<li><a <?="login"==$menuName?"class='active-menu'":""?> href="login.php"><i class="fa fa-bolt fa-3x"></i> 登录</a></li>
					<li><a <?="registeration"==$menuName?"class='active-menu'":""?> href="register.php"><i class="fa fa-laptop fa-3x"></i>
							Registeration</a></li>

					<li><a <?="#"==$menuName?"class='active-menu'":""?> href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="#">Second Level Link</a></li>
							<li><a href="#">Second Level Link</a></li>
							<li><a href="#">Second Level Link<span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
									<li><a href="#">Third Level Link</a></li>
									<li><a href="#">Third Level Link</a></li>
									<li><a href="#">Third Level Link</a></li>

								</ul></li>
						</ul></li>
					<li><a <?="blank"==$menuName?"class='active-menu'":""?> href="blank.php"><i class="fa fa-square-o fa-3x"></i> Blank
							Page</a></li>
				</ul>
			</div>
		</nav>
		<!-- /. NAV SIDE  -->