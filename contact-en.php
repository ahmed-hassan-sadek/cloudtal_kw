<?php
include"include/header-en.php";

$qshow = 'SELECT * FROM site';
$result = mysqli_query($conn , $qshow);
while($product = mysqli_fetch_array($result))
{
  $opening = $product['contact1'];
  $address = $product['contact2'];
  $mail = $product['contact3'];
  $num = $product['contact4'];
}
?>

<div class="page-content">
<div class="holder">
	<div class="container">
		<div class="title-wrap text-center">
			<h1 class="h1-style">Contact Us</h1>
		</div>
		<div class="text-icn-blocks-row">
			<div class="text-icn-block-hor">
				<div class="icn">
					<i class="icon-location"></i>
				</div>
				<div class="text">
					<h4>Address:</h4>
					<p><?php echo $address; ?></p>
				</div>
			</div>
			<div class="text-icn-block-hor">
				<div class="icn">
					<i class="icon-phone"></i>
				</div>
				<div class="text">
					<h4>Phnoe Number:</h4>
					<p><?php echo $num; ?></p>
				</div>
			</div>
			<div class="text-icn-block-hor">
				<div class="icn">
					<i class="icon-info"></i>
				</div>
				<div class="text">
					<h4>Work Hours:</h4>
					<p><?php echo $opening; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="holder">
	<div class="container">
		<div class="row vert-margin">
			<div class="col-sm-9">
                <div class="title-wrap">
                    <h2 class="h1-style">Contact Us NOW</h2>
	           <div>Contact us easily through here</div>
</div>
<form class="contact-form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
	<div class="form-group">
		<div class="row vert-margin-middle">
			<div class="col-lg">
				<input type="text" name="name" class="form-control form-control--sm" placeholder="Name" required>
			</div>
			<div class="col-lg">
				<input type="number" name="number" class="form-control form-control--sm" placeholder="Phone number" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row vert-margin-middle">
			<div class="col-lg">
				<input type="text" name="email" class="form-control form-control--sm" placeholder="Email" required>
			</div>
			<div class="col-lg">
				<input type="text" name="subject" class="form-control form-control--sm" placeholder="Subject" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<textarea class="form-control form-control--sm textarea--height-200" name="message" placeholder="Message" required></textarea>
	</div>
	<button name="send" class="btn" type="submit">Send</button>
</form>
            </div>
			<div class="col-sm-9"><div class="contact-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2201.3258493677126!2d-74.01291322172017!3d40.70657451080482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sua!4v1492962272380"></iframe>
</div></div>
		</div>
	</div>
</div>
	<div class="holder holder-subscribe-full holder-subscribe--compact">
	<div class="container">
		<div class="row">
			<div class="col-auto">
				<div class="subscribe-form-title-md">اخر الأخبار</div>
				<div class="subscribe-form-title-xs">اشترك لتصلك أخبارنا عن أحدث العروض والخصومات</div>
			</div>
			<div class="col">
				<div class="subscribe-form">
					<form action="#">
						<div class="form-inline">
							<div class="form-control-wrap">
								<input type="text" class="form-control" placeholder="أكتب الإيميل الخاص بك هنا ..">
								<span class="bottom"></span>
								<span class="right"></span>
								<span class="top"></span>
								<span class="left"></span>
							</div>
							<button type="submit" class="btn btn--lg">اشترك الان</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php
         if(isset($_POST['send']))
         {
             $mass = $_POST['message'];
             $name = $_POST['name'];
             $email = $_POST['email'];
             $number = $_POST['number'];
             $subj = $_POST['subject'];

             $qu = "insert into messages (name , email , number , subject , message) values ('$name' , '$email' , '$number' , '$subj' , '$mass')";

             $result = mysqli_query($conn , $qu);

             if($result == true)
             {
                 echo '<script>alert("Message has been sent successfully");
                 if ( window.history.replaceState )
                 {
                    window.history.replaceState( null, null, window.location.href );
                 }
                 </script>';
             }
             else
             {
                 echo '<script>alert("Error happened! Message was not sent. Please try again");
                 if ( window.history.replaceState )
                 {
                    window.history.replaceState( null, null, window.location.href );
                 }
                 </script>';
             }                         
         }
        
        ?>

<style>

    .page-title-bg
    {
        border-right-color: transparent;
    }

</style>

<?php
include"include/footer-en.php";
?>