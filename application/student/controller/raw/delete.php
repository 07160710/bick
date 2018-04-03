<?php
//字符集
header ( "content-type:text/html;charset=utf-8" );
//启动sessioni
if (! isset ( $_SESSION )) {
	session_start ();
}
//如果没有登录，到登录页
if (!isset ( $_SESSION ['userName'] )) {
	header ( "location:login.php" );
} else {
	$id = $_REQUEST['id'];
	require_once 'dbconfig.php';
	// 删除语句
	$sql = "delete from student where id =$id";
	//结果是true/false
	$result = mysql_query ( $sql, $conn );
	if ($result) {
		echo "<script>alert('删除成功!');</script>";
		echo "删除成功!<br/>";
		echo "<a href='index.php'>返回</a>";
	} else {
		echo "<script>alert('删除失败!');</script>";
		echo "删除失败!<br/>";
		echo "<a href='index.php'>返回</a>";
	}
}
?>