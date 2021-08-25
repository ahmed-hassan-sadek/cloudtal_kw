<?php
include("../includes/header.php");

$q = 'DELETE FROM sales WHERE id='.$_GET['id'].'';
$result = mysqli_query($con , $q);

echo '<script type="text/javascript">
				location.replace("../sales.php");
			  </script>';

include("../includes/footer.php");
?>