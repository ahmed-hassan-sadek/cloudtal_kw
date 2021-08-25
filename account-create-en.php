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
				<h2 class="text-center">Create an Account</h2>
				<div class="form-wrapper">
					<p>To access your whishlist, address book and contact preferences and to take advantage of our speedy checkout, create an account with us now.</p>
					<form class="contact-form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
	<div class="form-group">
		<div class="row vert-margin-middle">
			<div class="col-lg">
				<input type="text" name="name" class="form-control form-control--sm" placeholder="Name" required>
			</div>
			<div class="col-lg">
				<input type="number" name="number" class="form-control form-control--sm" placeholder="phone Number" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row vert-margin-middle">
			<div class="col-lg">
				<input type="text" name="address" class="form-control form-control--sm" placeholder="Address" required>
			</div>
			<div class="col-lg">
				<input type="number" name="age" class="form-control form-control--sm" placeholder="Age" required>
			</div>
		</div>
	</div>
         
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control--sm" placeholder="E-mail" required>
    </div>
    <div class="form-group">
        <input type="password" name="pass" class="form-control form-control--sm" placeholder="Password" required>
    </div>
	
	<button name="signup" class="btn" type="submit">Signup</button>
</form>

				</div>
			</div>
		</div>
	</div>
</div>
    
    <?php
         if(isset($_POST['signup']))
         {
             $name = $_POST['name'];
             $number = $_POST['number'];
             $age = $_POST['age'];
             $add = $_POST['address'];
             $email = $_POST['email'];
             $pass = $_POST['pass'];

             $qu = "insert into users (name , number , age , address , email , password) values ('$name' , '$number' , '$age' , '$add' , '$email' , '$pass')";

             $result = mysqli_query($conn , $qu);
             
             if($result == true)
             {
                   $q = "select * from users where email = '$email' and password = '$pass'";
                   $res = $conn->query($q);

                   $data = $res->fetch_assoc();

                  if($data)
                  {
                      $_SESSION['isLoginkw']=true;
                      $_SESSION['username'] = $data['name'];
                      $_SESSION['email']= $useremail;
                      $_SESSION['id']=$data['id'];

                      echo '<script type="text/javascript">
        location.replace("account-details.php");
        </script>';
                  }
                  else
                  {
                      echo '<script>alert("Email or password is wrong. Please try again")</script>';
                  }
                 
             }
             else
             {
                 echo '<script>alert("Something went wrong. Please try again")</script>';
             }

         }
        
        ?>
    
</div>

<?php
include"include/footer-en.php";

?>