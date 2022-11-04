<?php
include"config.php";
?>
<!DOCTYPE html>
<html> 
<head>
<?php
if(isset($_POST['upload'])){
	$serch = $_POST['serch'];
	header("Location: search_content.php?ans=".$serch);
}
?>
<meta charset="utf-8" />
<title>Cinema</title>
 <script src="widget.js"></script>
	  <script>
        var botmanWidget = {
            frameEndpoint: 'chat.html',
            introMessage: '您好，需要甚麼服務嗎?',
            chatServer : 'botman.php', 
            title: '客服中心'
        }; 
    </script>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #6A5ACD;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #87CEEB;
}
.link:hover{
	color: #FFD700;
}
.link:visited{
	color: #FF4500;
}
</style>
</head>
<body style="background-color:#191970;">
<?php
session_start();
if(isset($_SESSION['login'])){
	echo "<p style='float: right;color:#FFD700'><a class=\"link\" href='add.php'>新增</a> \ <a class=\"link\" href='delete.php'>刪除</a> \ <a class=\"link\" href='edit.php'>編輯</a> \ <a class=\"link\" href='logout.php'>登出</a>";
}
else echo "<p style='float: right;color:white;'><a class=\"link\" href='login.php'>登入會員</a>\<a class=\"link\" href='register.php'>註冊</a>";
?>
<form style="float:left" method="post" action="" enctype='multipart/form-data'>
<input type="text"  name="serch" value="">
<input type='submit' value='搜尋' name='upload'>
</form>
<center><h1 style="color:#F5FFFA;">Cinema</h1><center>
<ul>
  <li><a href="index.php">首頁</a></li>
  <li><a href="content.php?type=<?=$type=1?>">動作類</a></li>
  <li><a href="content.php?type=<?=$type=2?>">冒險類</a></li>
  <li><a href="content.php?type=<?=$type=3?>">喜劇類</a></li>
  <li><a href="content.php?type=<?=$type=4?>">音樂類</a></li>
  <li><a href="content.php?type=<?=$type=5?>">恐怖類</a></li>
  <li><a href="content.php?type=<?=$type=6?>">奇幻類</a></li>
  <li><a href="content.php?type=<?=$type=7?>">愛情類</a></li>
  <li><a href="content.php?type=<?=$type=8?>">動畫類</a></li>
  <li><a href="content.php?type=<?=$type=9?>">戰爭類</a></li>
  <li><a href="content.php?type=<?=$type=10?>">歷史類</a></li>
</ul>
<br>
<?php
$sql = "SELECT MAX(score) FROM movie";
mysqli_query($con, 'SET NAMES utf8'); 
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result, MYSQLI_NUM);
$max = $row[0];
$sql2 = "SELECT * from movie WHERE score='".$max."'";
$result2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
print($row2['name']);

mysqli_free_result($result); // 釋放佔用記憶體 
mysqli_close($con);  // 關閉資料庫連接
?>
</body>
</html>