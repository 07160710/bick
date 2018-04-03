<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>用户登录</title>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans'
	rel='stylesheet' type='text/css' />

</head>
<body>
<?php
header ( "content-type:text/html;charset=utf-8" );
if (! isset ( $_SESSION )) {
	session_start ();
}
// 如果未登录，到登录页
if (! isset ( $_SESSION ['userName'] )) {
	header ( "location:login.php" );
} else {
	require_once 'dbconfig.php';
	$id = $_REQUEST ['id'];
	// 根据用户名和密码去查询帐号表
	$sql = "select * from student where id=$id";
	$result = mysql_query ( $sql, $conn );
	if ($row = mysql_fetch_array ( $result )) {
		?>
    <div class="container">
		<div class="row text-center ">
			<div class="col-md-12">
				<br /> <br />
				<h2>编辑学生信息</h2>

				<h5>( 授权访问 )</h5>
				<br />
			</div>
		</div>
		<div class="row ">

			<div
				class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> 输入登录信息 </strong>
					</div>
					<div class="panel-body">
						<form role="form" method="post" action="logindo.php">
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" class="form-control" placeholder="在此输入学号 "
									name='stdentid' />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" class="form-control" placeholder="在此输入姓名 "
									name='username' />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" class="form-control" placeholder="在此输入用户名 "
									name='username' />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" class="form-control" placeholder="在此输入用户名 "
									name='username' />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" class="form-control" placeholder="在此输入用户名 "
									name='username' />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" class="form-control" placeholder="在此输入用户名 "
									name='username' />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" placeholder="在此输入密码"
									name='passcode' />
							</div>
							<input type="submit" class="btn btn-primary " name="Submit"
								value="确认修改">
							<hr />
						</form>
					</div>

				</div>
			</div>


		</div>
	</div>


	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>

</body>
</html>


<h1 align='center'>编辑学生信息</h1>
	<hr />
	<div align='center'>
		<form action='editdo.php' method='post'>
			<input type='hidden' name='id' value='<?=$row ['id']?>' />
			<table width=400 border=0>
				<tr>
					<td width=100 align='center'>学号</td>
					<td><input type='text' name='studentId'
						value='<?=$row ['studentId']?>' /></td>
				</tr>
				<tr>
					<td width=100 align='center'>姓名</td>
					<td><input type='text' name='name' value=<?=$row ['name']?> /></td>
				</tr>
				<tr>
					<td width=100 align='center'>班级</td>
					<td><input type='text' name='className'
						value=<?=$row ['className']?> /></td>
				</tr>
				</div>
				<tr>
					<td width=100 align='center'>生日</td>
					<td><input class="laydate-icon" type='text' id='birthday'
						name='birthday' value=<?=$row ['birthday']?> /></td>
				</tr>
				<tr>
					<td width=100 align='center'>性别</td>
					<td><input type='radio' name='sex' value='男'
						<?=$row ['sex']=='男'?'checked':''?>>男</input> <input type='radio'
						name='sex' value='女' <?=$row ['sex']=='女'?'checked':''?>>女</input>
					</td>
				</tr>
				<tr>
					<td width=100 align='center'>民族</td>
					<td><input type='text' name='nation' value=<?=$row ['nation']?> /></td>
				</tr>
				<tr>
					<td width=100 align='center' colspan=2><input type='submit'
						value='确认修改' /></td>
				</tr>
			</table>
		</form>
	</div>
<?php
	}
}
?>
<script type="text/javascript">
!function(){
	laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
	laydate({elem: '#birthday'});//绑定元素
}(); 
</script>
</body>
</html>