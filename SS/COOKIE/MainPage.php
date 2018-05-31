<!DOCTYPE html>
<html>
<head>
	<title>
		Login
	</title>
</head>
<body>
	<form method="post" action="#">
		<table>
			<tr>
				<td>USERNAME : </td>
				<td><input type="text" name="txtUname" required /></td>
			</tr>
			<tr>
				<td>PASSWORD : </td>
				<td><input type="password" name="txtPwd" required/></td>
			</tr>
			<tr>
				<td><input type="submit" name="btnLogin" value="Login"/></td>
				<td><input type="submit" name="btnNewMember" value="New Member" formnovalidate/></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
if(isset($_COOKIE["users"]))
{
	header('Location:Welcome_Page.php');
}
else
{
	if(isset($_POST['btnLogin']))
	{	
		$username = $_POST['txtUname'];
		$password = $_POST['txtPwd'];
		$con = mysqli_connect("localhost","root","","ssassigment");
		$stmt = $con->prepare("SELECT username,password FROM newuser WHERE username = (?) AND password = (?)");
		$stmt->bind_param("ss", $username,$password);
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result->num_rows == 1) 
		{
			setcookie("users","$username",time()+300);
    		header('Location:Welcome_page.php');
		}
		else
			echo "No Username Password Found";
	
		$stmt->close();
		$con->close();
	}
	else if(isset($_POST['btnNewMember']))
	{
		header('Location:New_Registeration.php');
	}

}
?>