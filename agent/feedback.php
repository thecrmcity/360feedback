<?php
session_start();
include_once('../config.php');
include_once("email.php");
include("checkagent.php");
check_agent();

$agentid = $_SESSION['agentid'];
$agenthead = $_SESSION['agenthead'];
$agentname = $_SESSION['agentname'];
?>

<?php

if(isset($_POST['feedSubmit']))
{
	$feedbackFor = $_POST['feedbackFor'];
	$feebSubject = $_POST['feebSubject'];
	$feedMessage = $_POST['feedMessage'];
	$feedstatus = '1';

	$sqlrent = "SELECT * FROM user_employee WHERE user_employee_id ='$agentid'";
	$resrent = mysqli_query($conn, $sqlrent);
	$resrows = mysqli_fetch_array($resrent);
	$emppro = $resrows['user_emp_process'];
	$empsubpro = $resrows['user_emp_sbpro'];
	$empmobile = $resrows['user_emp_mobile'];
	



	$feedsql = "INSERT INTO feedback_content(employee_id, employee_name, employee_pro, empoyee_sub_pro, employee_mobile, employee_head, feedback_for, feedback_subject, feedback_text, feedback_status) VALUES ('$agentid','$agentname','$emppro','$empsubpro','$empmobile','$agenthead','$feedbackFor','$feebSubject','$feedMessage','$feedstatus')";
	$feedres = mysqli_query($conn, $feedsql);

	$mail->Subject = '360 Feedback | '.$feebSubject;
	$mail->Body.= 'Hi, <br><br>';
	$mail->Body.= 'This mail autogenerated by 360 Feedback Portal. <br><br>';
	$mail->Body.= 'Employee Name : '.$agentname.'<br>';
	$mail->Body.= 'Employee ID : '.$agentid.'<br>';
	$mail->Body.= 'Process : '.$emppro.'<br>';
	$mail->Body.= 'Sub Process : '.$empsubpro.'<br>';
	$mail->Body.= 'Head : '.$agenthead.'<br>';
	$mail->Body.= 'Feedback For : '.$feedbackFor.'<br>';
	$mail->Body.= 'Subject : '.$feebSubject.'<br>';
	$mail->Body.= 'Message : '.$feedMessage;
	
	$mail->Body.= '<br><br> -----End ----- 360 Feedback!';
	$mail->send();
	if($feedres == true)
	{
		header('Location:allude.php');
	}
}

?>