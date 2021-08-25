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
				<h2 class="text-center">ايميل جديد</h2>
				<div class="form-wrapper">
					<p class="text-center">للوصول إلى قائمة الرغبات ودفتر العناوين وتفضيلات الاتصال الخاصة بك والاستفادة من الخروج السريع ، قم بإنشاء حساب معنا الآن.</p>
					<form class="contact-form" method="post" action="backend/Users.php">
	<div class="form-group">
		<div class="row vert-margin-middle">
			<div class="col-lg">
				<input type="text" name="name" class="form-control form-control--sm" placeholder="الإسم" required>
			</div>
			<div class="col-lg">
				<input type="number" name="phone" class="form-control form-control--sm" placeholder="رقم الهاتف" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row vert-margin-middle">
			<div class="col-lg">
				<input type="text" name="address" class="form-control form-control--sm" placeholder="العنوان" required>
			</div>
			<div class="col-lg">
				<input type="number" name="age" class="form-control form-control--sm" placeholder="العمر" required>
			</div>
		</div>
	</div>
         
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control--sm" placeholder="الإيميل" required>
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control--sm" placeholder="كلمة المرور" required>
    </div>
	
	<button name="signup-ar" class="btn" type="submit">تسجيل الدخول</button>
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