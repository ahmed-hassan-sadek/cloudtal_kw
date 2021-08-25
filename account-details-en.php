<?php
include "include/header-en.php";

if(isset($_SESSION['isLoginkw']))
{

$userid = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id = '$userid'";
$result = mysqli_query($conn , $sql);
$data = $result->fetch_assoc();
}
else
{
	echo '<script type="text/javascript">
	location.replace("account-login.php");
	</script>';
}


?>

<div class="page-content">
	<div class="holder">
	<div class="container">
		<div class="row">
	<?php
            include "include/user-dash-en.php";
            ?>
			<div class="col-md-14 aside">
				<h1 class="mb-3">Account Details</h1>
				<div class="row vert-margin">
					<div class="col-sm-9">
						<div class="card">
							
							<div class="card-body">
								<h3>My details </h3>
								<p><b>First Name:</b> <?= $data['name'] ?> <br>
									<b>Email:</b> <?= $data['email']; ?><br>
									<b>Phone Number:</b> <?= $data['number'] ?></p>
								<div class="mt-2 clearfix">
									<a href="#" class="link-icn js-show-form" data-form="#updateDetails"><i class="icon-pencil"></i>Update my Profile </a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="card mt-3 d-none" id="updateDetails">
					<form method="POST" action="backend/Users.php">
						<div class="card-body">
							<h3>Update My Profile</h3>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">Name:</label>
									<div class="form-group">
										
									<input type="text" name="name" value="<?= $data['name'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">Email:</label>
									<div class="form-group">
										
									<input type="text" name="email" value="<?= $data['email'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">Phone Number</label>
									<div class="form-group">
										
									<input type="text" name="phone" value="<?= $data['number'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="mt-2">
								<button type="reset" class="btn btn--alt js-close-form" data-form="#updateDetails">Cancel</button>
								<button name="edit-en" class="btn ml-1">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php
include "include/footer-en.php";
?>