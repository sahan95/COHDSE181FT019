<html>
<head><title>Index-HDSE181039</title><head/>
<body>
<h1>Comments</h1>

<form name="comment" method="post" action="#">
<label><h3>Enter Your Name<h3/><label/>
<label>Name<label/><input type ="text" name= "name"/>
<label><h3>please enter your Comment :</h3><label/>

<textarea cols="75" rows="10" placeholder="your comment here " name="comment" ></textarea><br>
  <input type="submit" name="btncomment" value=" Send  comment" />
  
 </form>
<?php

if(isset($_POST["btncomment"]))
{     $name = $_POST["name"];
	//$type = $_POST["user"];
	$comment = $_POST["comment"];
	
	$con= mysqli_connect("localhost","root","");
	mysqli_select_db($con,"assignSSecurity");
	$sql = "INSERT INTO tblcomment (	name, comment) VALUES('$name','$comment')";
	$result = mysqli_query($con,$sql);
	
	echo"LEATEST COMMENNT ".$comment;
	
}

?>


</body>
</html>