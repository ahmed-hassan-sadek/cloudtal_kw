<?php
include "include/header.php";

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
            include"include/user-dash-ar.php";
            ?>
			<div class="col-md-14 aside">
				<h1 class="mb-3">عنواني</h1>
				<div class="row">
                    <!------start of address box-------->
					<div class="col-sm-9">
						<div class="card">
						
							<div class="card-body">
								<h3>العنوان</h3>
								<?php if (!$data) {?>
									<div class="mt-2 clearfix">
									<a href="#" class="link-icn js-show-form" data-form="#AddAddress"><i class="icon-pencil"></i> اضافه   </a>
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
											<button name="delete-add-ar" class="btn ml-1">حذف</button>
										</form>
									<br>
										<a href="#" class="link-icn js-show-form" data-form="#updateAddress"><i class="icon-pencil"></i> تعديل   </a>
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
							<label class="text-uppercase">الدولة:</label>
							<div class="form-group">
										<input name="country" type="text" class="form-control">
									</div>
							<label class="text-uppercase">العنوان تفصيلي:</label>
							<div class="form-group">
										<input name="address" type="text" class="form-control">
									</div>
							<label class="text-uppercase">رقم الهاتف:</label>
							<div class="form-group">
										<input name="phone" type="text" class="form-control">
									</div>
							</div>
							<input type="hidden" name="user_id" value="<?= $userid ?>">
					
							<center>
							<div class="mt-2">
								<button type="reset" class="btn btn--alt js-close-form" data-form="#updateAddress">إلغاء</button>
								<button name="add-ar" class="btn ml-1">اضافه عنوان</button>
							
							</div>
						</center>
						<br>
						</div>
					</form>
					<div class="card mt-3 d-none" id="updateAddress">
					<form method="POST" action="backend/Users.php">
						<div class="card-body">
							<h3>تحديث بياناتى</h3>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">الدولة :</label>
									<div class="form-group">
										
									<input type="text" name="country" value="<?= $data['country'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">العنوان تفصيلي:</label>
									<div class="form-group">
										
									<input type="text" name="address_details" value="<?= $data['address_details'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">رقم الهاتف:</label>
									<div class="form-group">
										
									<input type="text" name="phone" value="<?= $data['phone'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="mt-2">
								<button type="reset" class="btn btn--alt js-close-form" data-form="#updateDetails">إلغاء</button>
								<button name="edit-address-ar" class="btn ml-1">تحديث</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include "include/footer.php";
?>

<?php

class Users 
{

	
    public static function deleteAddress()
    {
        global $conn;
        $script = $_POST['script'];
        $userId = $_POST['delete_id'];

        $request =  mysqli_query($conn , "SELECT FROM users_address WHERE id = $userId");
        if(!empty($request))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("account-addresses.php");
			  </script>';
            die(); 
        }
        if(!empty($script))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("account-addresses.php");
			  </script>';
            die();
        }

        $sql = "DELETE FROM users_address WHERE id= $userId";

        if (mysqli_query($conn, $sql)) {

        $_SESSION['message'] = "course was deleted";
        echo '<script type="text/javascript">
				location.replace("account-addresses.php");
			  </script>';

        }
            
        
        
    }

	public static function UsersDetails()
	{
		global $conn;
		$userid = $_SESSION['id'];
		$country = mysqli_real_escape_string($conn , $_POST['country']);
		$address_details = mysqli_real_escape_string($conn , $_POST['address_details']);
		$phone = mysqli_real_escape_string($conn , $_POST['phone']);

		$sql = "UPDATE users_address SET country = '$country' , address_details = '$address_details' , phone = '$phone'  WHERE user_id = '$userid'";
		$result = mysqli_query($conn , $sql);

		if ($result) {
			echo  '<script type="text/javascript">
			location.replace("account-addresses.php");
		  </script>';
		}
		else {
			$_SESSION['error'] = "An error occurred, Add again";
		}
	}
}

if (isset($_POST['delete'])) {
	Users::deleteAddress();
}

if (isset($_POST['edit'])) {
	Users::UsersDetails();
}


?>
