<?php 

try{
	$db_host = "localhost";
	$db_name = "esurf";
	$db_user = "root";
	$db_pass = "";
		$db_con = new PDO("mysql:host={$db_host}",$db_user,$db_pass);
                $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $create = "CREATE DATABASE IF NOT EXISTS {$db_name}";
                $db_con->exec($create);
                $sql0="use {$db_name}";
                $db_con->exec($sql0);
	}
	catch(PDOException $e){
		echo $e->getMessage();
             
	}

$sql="CREATE TABLE IF NOT EXISTS `es_admin` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL COMMENT 'the primary id key for school',
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
PRIMARY KEY (id)
)";
$exec00=$db_con->query($sql);
if($exec00==true){
  echo "<br>es_admin table, Executed successfully...";
}else{echo "<br>Error Executing 'es_admin' table...";}


$sql1="CREATE TABLE IF NOT EXISTS `es_avatar` (
`id` int(11) NOT NULL AUTO_INCREMENT,
   `user_id` int(11) NOT NULL,
  PRIMARY KEY (id)
) ";

$exec1=$db_con->query($sql1);
if($exec1==true){
  echo "<br>es_avatar table, Executed successfully...";
}else{echo "<br>Error Executing 'es_avatar' table...";}


$sql2="CREATE TABLE IF NOT EXISTS `es_calendar` (
`id` int(11) NOT NULL  AUTO_INCREMENT,
   `title` varchar(255) NOT NULL,
  `startdate` varchar(48) NOT NULL,
  `enddate` varchar(48) NOT NULL,
  `allDay` varchar(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY (id)
)";

$exec2=$db_con->query($sql2);
if($exec2==true){
  echo "<br>es_calendar table, Executed successfully...";
}else{echo "<br>Error Executing 'es_calendar' table...";}


$sql3="CREATE TABLE IF NOT EXISTS `es_course` (
`id` int(11) NOT NULL  AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_code` varchar(25) NOT NULL,
  `course` varchar(150) NOT NULL,
  `credit_hours` int(1) NOT NULL,
  `semester` int(1) NOT NULL,
  `date` varchar(50) NOT NULL
    PRIMARY KEY (id)
)";

$exec3=$db_con->query($sql3);
if($exec3==true){
  echo "<br>es_course table, Executed successfully...";
}else{echo "<br>Error Executing 'es_course' table...";}

$sql34="CREATE TABLE IF NOT EXISTS `es_course_assign` (
`id` int(11) NOT NULL  AUTO_INCREMENT,
  `course_assign_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_assigner_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
    PRIMARY KEY (id)
)";

$exec4=$db_con->query($sql34);
if($exec4==true){
  echo "<br>es_course_assign table, Executed successfully...";
}else{echo "<br>Error Executing 'es_course_assign' table...";}


$sql35="CREATE TABLE IF NOT EXISTS `es_course_download_hits` (
`id` int(11) NOT NULL  AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
    PRIMARY KEY (id)
)";

$exec5=$db_con->query($sql35);
if($exec5==true){
  echo "<br>es_course_download_hits table, Executed successfully...";
}else{echo "<br>Error Executing 'es_course_download_hits' table...";}


$sql13="CREATE TABLE IF NOT EXISTS `es_course_registered_students` (
`id` int(11) NOT NULL  AUTO_INCREMENT,
   `course_registered_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester` int(1) NOT NULL,
  `registra_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
    PRIMARY KEY (id)
)";

$exec125=$db_con->query($sql13);
if($exec125==true){
  echo "<br>es_course_registered_students table, Executed successfully...";
}else{echo "<br>Error Executing 'es_course_registered_students' table...";}


$sql163="CREATE TABLE IF NOT EXISTS `es_course_topic` (
`id` int(11) NOT NULL  AUTO_INCREMENT,
    `course_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `mode` int(1) NOT NULL DEFAULT '0',
  `unit` int(10) NOT NULL,
  `topic_title` varchar(255) NOT NULL,
  `topic_content` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
      PRIMARY KEY (id)
)";

$exec6=$db_con->query($sql163);
if($exec6==true){
  echo "<br>es_course_topic table, Executed successfully...";
}else{echo "<br>Error Executing 'es_course_topic' table...";}

$sql14="CREATE TABLE IF NOT EXISTS `es_course_topic_comment` (
`id` int(11) NOT NULL  AUTO_INCREMENT,
   `comment_id` int(11) NOT NULL,
  `course_topic_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
      PRIMARY KEY (id)
)";

$exec7=$db_con->query($sql14);
if($exec7==true){
  echo "<br>es_course_topic_comment table, Executed successfully...";
}else{echo "<br>Error Executing 'es_course_topic_comment' table...";}


$sql126="CREATE TABLE IF NOT EXISTS `es_course_topic_upload`(
`id` int(11) NOT NULL  AUTO_INCREMENT,
  `course_topic_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `file_ext` varchar(10) NOT NULL,
  `file_type` varchar(150) NOT NULL,
  `file_size` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
    PRIMARY KEY (id)
)";

$exec8=$db_con->query($sql126);
if($exec8==true){
  echo "<br>es_course_topic_upload table, Executed successfully...";
}else{echo "<br>Error Executing 'es_course_topic_upload' table...";}

$sql123="CREATE TABLE IF NOT EXISTS `es_department`(
`id` int(11) NOT NULL  AUTO_INCREMENT,
 `school_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `department` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(50) NOT NULL,
    PRIMARY KEY (id)
)";

$exec9=$db_con->query($sql123);
if($exec9==true){
  echo "<br>es_department table, Executed successfully...";
}else{echo "<br>Error Executing 'es_department' table...";}


$sql9="CREATE TABLE IF NOT EXISTS `accounts` (
`useraccountid` int(11) NOT NULL  AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `money_received` float(30) NOT NULL DEFAULT '0',
  `money_sent` float(30) NOT NULL DEFAULT '0',
  `bonus` float(30) NOT NULL DEFAULT '0',
    PRIMARY KEY (useraccountid)
)";
$exec10=$db_con->query($sql9);
if($exec10==true){
  echo "<br>accounts table, Executed successfully...";
}else{echo "<br>Error Executing 'accounts' table...";}

$sql29="CREATE TABLE IF NOT EXISTS `providehelp` (
`useraccountid` int(11) NOT NULL  AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `referralid` int(11) NOT NULL,
  `money_sending` float(30) NOT NULL,
    PRIMARY KEY (useraccountid)
)";
$exec11=$db_con->query($sql29);
if($exec11==true){
  echo "<br>providehelp table, Executed successfully...";
}else{echo "<br>Error Executing 'providehelp' table...";}


$sql19="CREATE TABLE IF NOT EXISTS `gethelp` (
`useraccountid` int(11) NOT NULL  AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `sponsorid` int(11) NOT NULL,
  `money_received` float(30) NOT NULL,
   PRIMARY KEY (useraccountid)
)";
$exec12=$db_con->query($sql19);
if($exec12==true){
  echo "<br>gethelp table, Executed successfully...";
}else{echo "<br>Error Executing 'gethelp' table...";}

echo "<br><br>Completed...";
?>
