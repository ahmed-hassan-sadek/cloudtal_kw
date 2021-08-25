<?php
include("../includes/header.php");

$q = 'DELETE FROM messages WHERE id='.$_GET['id'].'';
$result = mysqli_query($con , $q);

echo '<script type="text/javascript">
				location.replace("../messages.php");
			  </script>';

include("../includes/footer.php");
?>