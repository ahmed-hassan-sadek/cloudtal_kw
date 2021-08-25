<?php
include("../includes/header.php");

$q = 'DELETE FROM users WHERE id='.$_GET['id'].'';
$result = mysqli_query($con , $q);

echo '<script type="text/javascript">
				location.replace("../users.php");
			  </script>';

include("../includes/footer.php");
?>