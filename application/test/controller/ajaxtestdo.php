<?php
require_once 'dbconfig.php';
$studentid = 'hhh';
$subjectid = 'php';
$paperid = 'php期中测试';
$questionid = $_POST['questionid'];
$answerid =  $_POST['answerid'];

//写入数据库
$sql = "insert into test_answer(studentid,subjectid,paperid,questionid,answerid) values('$studentid','$subjectid','$paperid','$questionid','$answerid')";
$result = mysql_query($sql);
if (! empty($_POST)) {
    $data = $_POST;
    print json_encode($data);
}
?>