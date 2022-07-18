<?php 
include_once('config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('project',array('id'=>$_REQUEST['delId']));
	header('location: project.php?msg=rds');
	exit;
}
?>