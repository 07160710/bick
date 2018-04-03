<?php
require_once 'dbconfig.php';
header ( "content-type:text/html;charset=utf-8" );
// 启动session
if (! isset ( $_SESSION )) {
	session_start ();
}
if (! isset ( $_SESSION ['userName'] )) {
	header ( "location:login.php" );
}
// 取session数据
$username = $_SESSION ['userName'];
// 取表单数据
$oldpassword = sha1 ( $_REQUEST ['oldpassword'] );
$password = sha1 ( $_REQUEST ['password'] );
$password1 = sha1 ( $_REQUEST ['password1'] );
// 验证两次密码一致性
if ($password != $password1) {
	echo "<script>alert('两次密码不一致!');</script>";
	echo "两次密码不一致!<br/>";
	echo "<a href='newpassword.php>返回</a>";
} else {
	// sql语句中字符串数据类型都要加引号，数字字段随便
	$sql = "select * from user where username='$username' and password='$oldpassword'";
	$result = mysql_query ( $sql );
	if ($row = mysql_fetch_array ( $result )) {
			$id = $row['id'];
			$query = "update user set password='$password' where id=$id";
			if(mysql_query($query)){
				header("location:loginout.php");
			}else{
				echo "<script>alert('密码修改失败!');</script>";
				echo "密码修改失败!<br/>";
				echo "<a href='newpassword.php>返回</a>";
			}
	} else {
		echo "<script>alert('原密码错误!');</script>";
		echo "原密码错误!<br/>";
		echo "<a href='newpassword.php>返回</a>";
	}
}


