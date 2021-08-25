<?php
include("../includes/header.php");

$q = 'DELETE FROM representative WHERE id='.$_GET['id'].'';
$result = mysqli_query($con , $q);

echo '<script type="text/javascript">
				location.replace("../repre.php");
			  </script>';

include("../includes/footer.php");
?>