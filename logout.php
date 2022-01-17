<?php
	session_start();
	session_destroy();
	echo '<script>("Anda Telah Logout");window.location="login.php"</script>';
?>
