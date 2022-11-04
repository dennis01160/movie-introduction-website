<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />
<title>登入會員</title>
<script>
	function refresh_code(){ 
		document.getElementById("imgcode").src="captcha.php"; 
	} 
</script>
</head>
<body style="background-color:#AFEEEE;">
<?php
session_start();  // 啟用交談期
$username = "";  $password = "";
// 取得表單欄位值
if(isset($_POST['upload'])){
if ( isset($_POST["Username"]) )
   $username = $_POST["Username"];
if ( isset($_POST["Password"]) )
   $password = $_POST["Password"];
// 檢查是否輸入使用者名稱和密碼
if ($username != "" && $password != "") {
   //送出UTF8編碼的MySQL指令
   mysqli_query($con, 'SET NAMES utf8'); 
   // 建立SQL指令字串
   $sql = "SELECT * FROM user WHERE password='";
   $sql.= $password."' AND username='".$username."'";
   // 執行SQL查詢
   $result = mysqli_query($con, $sql);
   $total_records = mysqli_num_rows($result);
   // 是否有查詢到使用者記錄
   if ( ($total_records > 0)&& (!empty($_SESSION['check_word'])) && (!empty($_POST['checkword']))) {
			if($_SESSION['check_word'] == $_POST['checkword']){
				
				$_SESSION['check_word'] = ''; //比對正確後，清空check_word值
				header('content-Type: text/html; charset=utf-8');
				// 成功登入, 指定Session變數
				$_SESSION["login"] = true;
				header("Location: index.php");
			}
			else{
				$_SESSION["login"] = false;
				echo "<center><font color='red' size='5px'>驗證碼錯誤</font></center>";
				//echo '<meta http-equiv="refresh" content="1; url=./login.php">';
			}
	   }
   else 
   {  // 登入失敗
      echo "<center><font color='red'>";
      echo "使用者名稱或密碼錯誤!<br/>";
      echo "</font>";
      $_SESSION["login"] = false;
   }
   mysqli_close($con);  // 關閉資料庫連接  
}
else {
	echo "<center><p style=\"color:red\">請輸入帳號密碼</p></center>";
	$_SESSION["login"] = false;
}
}
?>
<form action="login.php" method="post">
<table align="center" bgcolor="#ADD8E6">
 <tr><td><font size="2">帳號:</font></td>
   <td><input type="text" name="Username" 
             size="15" maxlength="10"/>
   </td></tr>
 <tr><td><font size="2">密碼:</font></td>
   <td><input type="password" name="Password"
              size="15" maxlength="10"/>
   </td></tr>
 <tr><td><font size="2">驗證碼:</font></td>
   <td><input type="text" name="checkword" size="15" maxlength="10" />
   </td></tr><br>
<table>
<br>
<center><img id="imgcode" src="captcha.php" onclick="refresh_code()"><br>
           點擊圖片可以更換驗證碼
<br><br>
<input type="submit" value="登入網站" name="upload"></center>

<br>
  <center><a href="register.php">還沒有會員? 馬上註冊!</a></center><br>
  <center><a href="index.php">回首頁</a></center>
</form>
</body>
</html>