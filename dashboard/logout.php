<?php
session_start();
session_destroy();
echo '<script type="text/javascript">
				location.replace("login.php");
			  </script>';
?>