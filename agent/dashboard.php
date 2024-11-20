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
  <link rel="icon" href="assets/img/silarisinfo-fevicon.png" type="image/gif">
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
								<table>
									<thead>
										<tr>
											<th></th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="../assets/main.js"></script>
  <script src="../assets/popup.js"></script>
  <script src="../assets/bootstrap.js"></script>
</body>
</html>