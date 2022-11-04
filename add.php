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
  $intro = $_POST['intro'];
  $type = $_POST['type'];
  $score = $_POST['score'];
  $filename = $_FILES['file']['name'];
  $target_dir = "upload/";
  if($filename !=''){
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $extensions_arr = array("jpg","jpeg","png","gif");

  if( in_array($extension,$extensions_arr) ){
     
	 $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
	 $image = "data::image/".$extension.";base64,".$image_base64;
	 
        $query = "INSERT INTO movie(name,image,intro,type,score) values('".$name."','".$image."','".$intro."','".$type."','".$score."')";
		mysqli_query($con, 'SET NAMES utf8'); 
        mysqli_query($con,$query);

  }
 
}
}
?>
</head>
<body style="background-color:	#F0E68C;">

<form method="post" action="" id="usform" enctype='multipart/form-data'>
  <label for="name">電影名稱:</label><br>
  <input type="text"  name="name" value=""><br>
  <label for="file">電影預覽圖:</label><br>
  <input type='file' name='file' /><br>
  <label for="intro">電影簡介:</label><br>
  <textarea rows="8" cols="70" name="intro" form="usform"></textarea><br>
  <label for="type">電影類型:</label><br>
  <select name="type">
    <option value="1" selected>動作類</option>
    <option value="2">冒險類</option>
    <option value="3">喜劇類</option>
    <option value="4">音樂類</option>
	<option value="5">恐怖類</option>
	<option value="6">奇幻類</option>
	<option value="7">愛情類</option>
	<option value="8">動畫類</option>
	<option value="9">戰爭類</option>
	<option value="10">歷史類</option>
  </select><br>
    <label for="score">電影評分:</label><br>
  <select name="score">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3" selected>3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select><br><br><br>
  <input type='submit' value='新增' name='upload'>
  <a href="index.php">回首頁</a>
</form>
</body>
</html>