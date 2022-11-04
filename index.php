<?php
include("config.php");
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

.coverflow{
    width: 900px;
    height: 490px;
    position: relative;
}
.coverflow>a{
    display: block;
    position: absolute;
    top:0;
    left:0;
    opacity: 0;
    filter: alpha(opacity=0);
/*當圖片數量增加，影片長度需更改，變為5s*圖片數量*/
 -webkit-animation: silder 70s linear infinite;
 animation: silder 70s linear infinite;
}
.coverflow>a>img{
    max-width: 100%;
}
/*動畫關鍵影格*/
@-webkit-keyframes silder {
    3% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    27% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    30% {
        opacity: 0;
        filter: alpha(opacity=0);
    }
}
@keyframes silder {
    3% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    27% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    30% {
        opacity: 0;
        filter: alpha(opacity=0);
    }
}
/*每個圖片各延遲5秒*/
.coverflow>a:nth-child(10) {
    -webkit-animation-delay: 60s;
            animation-delay: 60s;    
}
.coverflow>a:nth-child(9) {
    -webkit-animation-delay: 55s;
            animation-delay: 55s;    
}
.coverflow>a:nth-child(8) {
    -webkit-animation-delay: 49s;
            animation-delay: 49s;    
}
.coverflow>a:nth-child(7) {
    -webkit-animation-delay: 42s;
            animation-delay: 42s;    
}
.coverflow>a:nth-child(6) {
    -webkit-animation-delay: 35s;
            animation-delay: 35s;    
}
.coverflow>a:nth-child(5) {
    -webkit-animation-delay: 28s;
            animation-delay: 28s;               
}

.coverflow>a:nth-child(4) {
    -webkit-animation-delay: 21s;
            animation-delay: 21s;               
}


.coverflow>a:nth-child(3) {
    -webkit-animation-delay: 14s;
            animation-delay: 14s;               
}
.coverflow>a:nth-child(2) {
    -webkit-animation-delay: 7s;
            animation-delay: 7s;
}
.coverflow>a:nth-child(1) {
    -webkit-animation-delay: 0s;
            animation-delay: 0s;    
}
/*滑入時停止播放*/
.coverflow:hover>a{
-webkit-animation-play-state: paused;
        animation-play-state: paused;
}

section {
    display: flex;
    justify-content: center;
    margin-top: 20px;
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
<?php

?>
<center><center>
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
<section>
    <div id="cover" class="coverflow">
        <a href="content.php?type=<?=$type=3?>"><img src='pic/FORREST_GUMP.png' alt='喜劇' ></a>
        <a href="content.php?type=<?=$type=1?>"><img src='pic/INCEPTION.png' alt='動作' ></a>
        <a href="content.php?type=<?=$type=8?>"><img src='pic/TOY_STORY.png' alt='動畫' ></a>
        <a href="content.php?type=<?=$type=2?>"><img src='pic/JUMANJI.png' alt='冒險' ></a>
        <a href="content.php?type=<?=$type=4?>"><img src='pic/SHOWMAN.png' alt='音樂' ></a>
        <a href="content.php?type=<?=$type=5?>"><img src='pic/IT.png' alt='恐怖' ></a>
        <a href="content.php?type=<?=$type=6?>"><img src='pic/BEASTS.png' alt='奇幻' ></a>
        <a href="content.php?type=<?=$type=7?>"><img src='pic/ABOUTTIME.png' alt='愛情' ></a>
        <a href="content.php?type=<?=$type=9?>"><img src='pic/PRIVATERYAN.png' alt='戰爭' ></a>
        <a href="content.php?type=<?=$type=10?>"><img src='pic/RESISTANCE.png' alt='歷史' ></a>
        
    </div>
</section>
</body>
</html>