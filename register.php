<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<?php
if(isset($_POST['upload'])){
	
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
	if ($username != "" && $password != "") {
		$query = "INSERT INTO user(name,username,password) values('".$name."','".$username."','".$password."')";
		mysqli_query($con, 'SET NAMES utf8'); 
		mysqli_query($con,$query);
		header("Location: index.php");
	}
	else 
		echo "<p style=\"color:black;size:10px\">帳號密碼不能為空白</p>";
}
?>
</head>
<body style="background-color:#FFA07A;">

<form method="post" action="" enctype='multipart/form-data'>
  <label for="name">暱稱:</label><br>
  <input type="text"  name="name" value=""><br>
  <label for="name">帳號:</label><br>
  <input type="text"  name="username" value=""><br>
  <label for="name">密碼:</label><br>
  <input type="text"  name="password" value=""><br><br><br>
  <input type='submit' value='新增' name='upload'>
    <a href="index.php">回首頁</a>
</form>
</body>
</html>