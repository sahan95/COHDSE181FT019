<html>
<head>
	<title>Registration</title>
</head>
<body>
	<form method="post" action="#">
		<table>
			<tr>
				<td>Username : </td>
				<td><input type="text" name="txtUser" required /></td>
			</tr>
			<tr>
				<td>Password : </td>
				<td><input type="password" name="txtPwd" required/></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" name="btnRegister" value="Register"/></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
if(isset($_POST['btnRegister']))
	{	
		$un = $_POST['txtUser'];
		$pwd = $_POST['txtPwd'];
		$con = mysqli_connect("localhost","root","","ssassigment");
		$stmt = $con->prepare("INSERT INTO newuser VALUES(?,?)");
		$stmt->bind_param("ss",$un,$pwd);
		$stmt->execute();
		$stmt->close();
		$con->close();
		header('Location:MainPage.php');
	}
?>
