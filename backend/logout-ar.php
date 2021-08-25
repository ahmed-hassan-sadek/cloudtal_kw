<?php

ob_start();

session_start();
session_destroy();
echo '<script type="text/javascript">
				location.replace("../account-login.php");
			  </script>';
?>