<?php
include("config.php");
?>
<!DOCTYPE html>
<html> 
<head><?php
if(isset($_POST['upload'])){
	$serch = $_POST['serch'];
	header("Location: search_content.php?ansh=".$serch);
}
?>
<meta charset="utf-8" />
<title>Cinema</title>
 <script src="widget.js"></script>
	  <script>
        var botmanWidget = {
            frameEndpoint: 'chat.html',
            introMessage: '您好，這邊推薦您各類分數最高的作品<br>1.動作類<br>2.冒險類<br>3.喜劇類<br>4.音樂類<br>5.恐怖類<br>6.奇幻類<br>7.愛情類<br>8.動畫類<br>9.戰爭類<br>10.歷史類<br><br>請輸入數字代碼(1~10)以查詢作品名稱',
            chatServer : 'botman.php', 
            title: '客服中心'
        }; 
    </script>
<style>
body {
    background-image: url(background.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
}

header {

margin-top: 20px;
margin-bottom: 20px;
margin-left: 50px;
margin-right: 50px;
background-color: rgba(0%, 0%, 0%, 0.6);
padding: 30px;
font-size: 25px;
color: white;

}

a {
    text-decoration:none;
    color:white;
}
a:hover {
    text-decoration:none;
    color:white;
}

nav {
    display: flex;
    justify-content: center;
    width: fit-content;
    height: 50px;
    background: rgba(145, 139, 139, 0.8);
    padding: 20px;
    margin-left: 50px;
    margin-right: 50px;
}

nav li {
    float: left;
}

nav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}

nav li a:hover {
    background-color: #111111;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333333;
}
</style>
</head>
<body>
<header>
<?php
session_start();
if(isset($_SESSION['login'])&&$_SESSION['login']==true){
	echo "<p style='float: right;color:#FFD700'><a class=\"link\" href='add.php'>新增</a> \ <a class=\"link\" href='delete.php'>刪除</a> \ <a class=\"link\" href='edit.php'>編輯</a> \ <a class=\"link\" href='logout.php'>登出</a>";
}
else echo "<p style='float: right;color:white;'><a class=\"link\" href='login.php'>登入會員</a>\<a class=\"link\" href='register.php'>註冊</a>";
?>
<form style="float:left" method="post" action="" enctype='multipart/form-data'>
<input type="text"  name="serch" value="">
<input type='submit' value='搜尋' name='upload'>
</form>
<h1><a href="index.php"><img src="icon.png" width = 76.5px height = 57.5px ></img>Cinema</a></h1>
</header>
<center><center>
<?php
$title = $_GET["title"];
$intro_sql = "SELECT * from movie WHERE name=\"".$title."\"";
mysqli_query($con, 'SET NAMES utf8'); 
$result = mysqli_query($con,$intro_sql);
?>
<nav>
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
</nav>
<br>
<br>
<?php
while($row= mysqli_fetch_assoc($result)) {
	echo "<center><img src=\"".$row['image']."\""."width='350px' height='400px'>
	<br><br><p style=\"color:yellow;font-size:40px\">".$row['name']."</p><br><br>
	<p style=\"color:#E6E6FA;font-size:25px\">".$row['intro']."</p><br><br>
	<p style=\"color:#7FFFD4;font-size:35px\">電影評分: ".$row['score']."</center>";
}

mysqli_free_result($result); // 釋放佔用記憶體 
mysqli_close($con);  // 關閉資料庫連接
?>
</body>
</html>