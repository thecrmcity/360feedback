<?php
function check_agent()
{
if(strlen($_SESSION['agentid'])==0)
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="../index.php";		
		$_SESSION['agentid']="";
		header("Location: http://$host$uri/$extra");
	}
}
?>