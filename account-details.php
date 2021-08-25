<?php
include "include/header.php";

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
            include "include/user-dash-ar.php";
            ?>
			<div class="col-md-14 aside">
				<h1 class="mb-3">تفاصيل الحساب</h1>
				<div class="row vert-margin">
					<div class="col-sm-9">
						<div class="card">
							
							<div class="card-body">
								<h3>بياناتى </h3>
								<p><b>الاسم الأول:</b> <?= $data['name'] ?> <br>
									<b>البريد الإلكترونى:</b> <?= $data['email']; ?><br>
									<b>رقم الهاتف:</b> <?= $data['number'] ?></p>
								<div class="mt-2 clearfix">
									<a href="#" class="link-icn js-show-form" data-form="#updateDetails"><i class="icon-pencil"></i> تحديث بياناتى </a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="card mt-3 d-none" id="updateDetails">
					<form method="POST" action="backend/Users.php">
						<div class="card-body">
							<h3>تحديث بياناتى</h3>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">الاسم :</label>
									<div class="form-group">
										
									<input type="text" name="name" value="<?= $data['name'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">البريد الالكترونى:</label>
									<div class="form-group">
										
									<input type="text" name="email" value="<?= $data['email'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="row mt-2">
								<div class="col-sm-9">
									<label class="text-uppercase">رقم الهاتف:</label>
									<div class="form-group">
										
									<input type="text" name="phone" value="<?= $data['number'] ?>" class="form-control form-control--sm" >
										
									</div>
								</div>
								
							</div>
							<div class="mt-2">
								<button type="reset" class="btn btn--alt js-close-form" data-form="#updateDetails">إلغاء</button>
								<button name="edit" class="btn ml-1">تحديث</button>
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
include "include/footer.php";
?>