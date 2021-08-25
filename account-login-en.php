<?php
include"include/header-en.php";
if(isset($_SESSION['isLoginkw']))
{
    echo '<script type="text/javascript">
location.replace("account-details-en.php");
</script>';
}
?>

<div class="page-content">
	
	<div class="holder">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-18 col-lg-12">
				<h2 class="text-center">login</h2>
				<div class="form-wrapper">
					<p>To access your whishlist, address book and contact preferences and to take advantage of our speedy checkout, create an account with us now.</p>
					<form method="post" action="backend/Users.php">
						<div class="form-group">
							<input type="text" name="email" class="form-control" placeholder="E-mail">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
						
						<div class="text-center">
							<button name="login-en" class="btn">Login</button>
						</div>
					</form>
                    
                    <h2 class="mt-3">Don't have an email! <a href="account-create-en.php" style="color:orange">Singup Now</a></h2>
				</div>
			</div>
		</div>
	</div>
</div>
    
</div>

<?php
include "include/footer-en.php";

?>