<?php
include "include/header-en.php";

$userid = $_SESSION['id'];

$sql = "SELECT * FROM users_address WHERE user_id = '$userid'";
$result = mysqli_query($conn , $sql);
$data = $result->fetch_assoc();

$sql = "SELECT * FROM users_address WHERE user_id = '$userid'";
$result_user = mysqli_query($conn , $sql);

?>
<div class="header-side-panel">
<div class="mobilemenu js-push-mbmenu">
	<div class="mobilemenu-content">
		<div class="mobilemenu-close mobilemenu-toggle">Close</div>

	</div>
</div>
	<div class="dropdn-content account-drop" id="dropdnAccount">

	<div class="drop-overlay js-dropdn-close"></div>
</div>
 
</div>
<div class="page-content">
	<div class="holder breadcrumbs-wrap mt-0">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="index.php">	</a></li>
			<li><span>My account</span></li>
		</ul>
	</div>
</div>
<div class="holder">
	<div class="container">
		<div class="row">
				<?php
            include"include/user-dash-en.php";
            ?>
			<div class="col-md-14 aside">
				<h1 class="mb-3">My Address</h1>
				<div class="row">
                    <!------start of address box-------->
					<div class="col-sm-9">
						<div class="card">
						
							<div class="card-body">
								<h3>Address</h3>
								<?php if (!$data) {?>
									<div class="mt-2 clearfix">
									<a href="#" class="link-icn js-show-form" data-form="#AddAddress"><i class="icon-pencil"></i> Add   </a>
									</div>
									<?php } 
									else
									{?>
										 
										 <p><?= $data['country'] ?>
										<br> <?= $data['address_details'] ?>
										<br> <?= $data['phone'] ?></p>
										<div class="mt-2 clearfix">
										<form action="backend/Users.php" method = "POST" enctype = "multipart/form-data">
											<input type="hidden" name="delete_id" value = "<?= $data['id'];?>">
											<input type="hidden" name="script">
											<button name="delete-add-en" class="btn ml-1">Delete</button>
										</form>
									<br>
										<a href="#" class="link-icn js-show-form" data-form="#updateAddress"><i class="icon-pencil"></i> Update   </a>
								</div>
									<?php }
									?>
									
								
							</div>
							
						</div>
					</div>
			<!----------end of address box---------->
				</div>
				<div class="card mt-3 d-none" id="AddAddress">
					<form method="POST" action="backend/Users.php">
						<div class="card-body">
							<h3>Edit Address</h3>
							<label class="text-uppercase">Country:</label>
							<div class="form-group">
										<input name="country" type="text" class="form-control">
									</div>
							<label class="text-uppercase">Detailed Address:</label>
							<div class="form-group">
										<input name="address" type="text" class="form-control">
									</div>
							<label class="text-uppercase">Phone Number:</label>
							<div class="form-group">
										<input name="phone" type="text" class="form-control">
									</div>
							</div>
							<input type="hidden" name="user_id" value="<?= $userid ?>">
					
							<center>
							<div class="mt-2">
								<button type="reset" class="btn btn--alt js-close-form" data-form="#updateAddress">Cancel</button>
								<button name="add-en" class="btn ml-1">Add Address</button>
							
							</div>
						</center>
						<br>
						</div>
					</form>
					<div class="card mt-3 d-none" id="updateAddress">
					<form method="POST" action="backend/Users.php">
						<div class="card-body">
							<h3>Update My Profile</h3>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">Country :</label>
									<div class="form-group">
										
									<input type="text" name="country" value="<?= $data['country'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">Detailed Address:</label>
									<div class="form-group">
										
									<input type="text" name="address_details" value="<?= $data['address_details'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">Phone Number:</label>
									<div class="form-group">
										
									<input type="text" name="phone" value="<?= $data['phone'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="mt-2">
								<button type="reset" class="btn btn--alt js-close-form" data-form="#updateDetails">Cancel</button>
								<button name="edit-address-en" class="btn ml-1">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include "include/footer-en.php";
?>