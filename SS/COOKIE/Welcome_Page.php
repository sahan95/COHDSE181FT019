<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
</head>
<body>
	<form method="post" action="#">
		
	<?php

	if(isset($_COOKIE["users"]))
	{
		$users = $_COOKIE["users"];
		echo "Welcome, $users"."<br/>";

	}
	else
	{
		header('Location:MainPage.php');
	}
	echo '<input type=\'submit\' name=\'btnLogout\' value=\'Logout\'>';
	if(isset($_POST['btnLogout']))
	{
		setcookie("users","$users",time()-300);
		header("Refresh:0");
	}
	?>
</body>
</html>