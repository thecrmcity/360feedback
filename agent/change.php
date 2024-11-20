<?php
session_start();
include_once('../config.php');
include("checkagent.php");
check_agent();
$agentid = $_SESSION['agentid'];
$agenthead = $_SESSION['agenthead'];
$agentname = $_SESSION['agentname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard | 360 Feedback</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/img/silarisinfo-fevicon.png" type="image/gif">
  <link rel="stylesheet" href="../assets/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="../assets/jquery.js"></script>
</head>
<body>
<section class="dashboard-blk">
	<div class="row">
		<div class="col-lg-2 no-mp">
			<?php include_once('leftbar.php');?>
		</div>
		<div class="col-lg-10 no-mp">
			<div class="dashboard-view">
				<div class="tringle opaci"></div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="dashboard-top">
							<p>Hi, <span style="font-weight: bold"><?php echo $agentname;?></span></p>
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="dashboard-text">
							<div class="you-are">
								<table class="table table-striped ">
									<?php
										$sqlrent = "SELECT * FROM user_employee WHERE user_employee_id ='$agentid'";
										$resrent = mysqli_query($conn, $sqlrent);
										$resrows = mysqli_fetch_array($resrent);
									?>
									<form class="" method="post" action="">
										<tr>
											<td>Full Name :</td>
											<td><?php echo $resrows['user_emp_name']?></td>
											<td>Employee Id :</td>
											<td><?php echo $resrows['user_employee_id']?></td>
										</tr>
										<tr>
											<td>Process / Department:</td>
											<td><?php echo $resrows['user_emp_process']?></td>
											<td>Sub-Process</td>
											<td><?php echo $resrows['user_emp_sbpro']?></td>
										</tr>
										<tr>
											<td>Current Password</td>
											<td colspan="3"><input type="text" name="" value="**********" placeholder="" class="form-control" disabled=""></td>
											
										</tr>
										<tr>
											<td>New Password</td>
											<td colspan="3"><input type="password" name="agentpass" value="" placeholder="" class="form-control"></td>
										</tr>
										<tr>
											<td>Confirm Password</td>
											<td colspan="3"><input type="password" name="confirmpass" value="" placeholder="" class="form-control"></td>
										</tr>
										<tr>
											<td></td>
											<td colspan="3"><input type="submit" name="agentchange" value="Submit" placeholder="" class="btn btn-dark"></td>
										</tr>
										<tr>
											
											<td colspan="4" class="text-center"> Silaris Infomation Pvt ltd &copy; 2021 | Silaris Info</td>
										</tr>
									</form>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php

if(isset($_POST['agentchange']))
{
	$agentpass = $_POST['agentpass'];
	$confirmpass = $_POST['confirmpass'];

	if($agentpass == $confirmpass)
	{
		$sqlupate = "UPDATE user_employee SET user_password = '$agentpass' WHERE user_employee_id ='$agentid'";
		$sqlres = mysqli_query($conn, $sqlupate);
		if($sqlres == true)
		{
			echo "<script>alert('Password Changed Successfully!')</script>";
		}
	}
	else
	{
		echo "<script>alert('Password Not Match. Try Again!')</script>";
	}
}

?>

<script src="../assets/main.js"></script>
  <script src="../assets/popup.js"></script>
  <script src="../assets/bootstrap.js"></script>
</body>
</html>