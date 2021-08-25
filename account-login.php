<?php
include"include/header.php";
if(isset($_SESSION['isLoginkw']))
{
    echo '<script type="text/javascript">
location.replace("account-details.php");
</script>';
}
?>

<div class="page-content">
	
	<div class="holder">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-18 col-lg-12">
				<h2 class="text-center">تسجيل الدخول</h2>
				<div class="form-wrapper">
					<p class="text-center">للوصول إلى قائمة الرغبات ودفتر العناوين وتفضيلات الاتصال الخاصة بك والاستفادة من الخروج السريع ، قم بإنشاء حساب معنا الآن.</p>
					<form method="post" action="backend/Users.php">
						<div class="form-group">
							<input type="text" name="email" class="form-control" placeholder="ادخل البريد الالكترونى">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="ادخل الرقم السري">
						</div>
						
						<div class="text-center">
							<button name="login-ar" class="btn">تسجيل الدخول</button>
						</div>

					</form>
             <h2 class="mt-3">ليس لديك ايميل <a href="account-create.php" style="color:orange">من هنا</a></h2>
				</div>
			</div>
		</div>
	</div>
</div>
    
</div>
<?php
include "include/footer.php";

?>