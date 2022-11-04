<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<?php
if(isset($_POST['upload'])){
$id = $_POST['id'];
  header("Location: edit2.php?id=".$id);
}

$sql = "SELECT id,name AS 電影名稱,type AS 種類 FROM movie";
mysqli_query($con, 'SET NAMES utf8'); 
$result = mysqli_query($con, $sql);
// 一筆一筆的以表格顯示記錄
echo "<table border=1><tr>";
// 顯示欄位名稱
while ( $meta = mysqli_fetch_field($result) )
   echo "<td>".$meta->name."</td>";
echo "</tr>"; // 取得欄位數
$total_fields = mysqli_num_fields($result);
// 顯示每一筆記錄
while ($row = mysqli_fetch_row($result)) {
   echo "<tr>"; // 顯示每一筆記錄的欄位值
   for ( $i = 0; $i <= $total_fields-1; $i++ )
      echo "<td>" . $row[$i] . "</td>";
   echo "</tr>";
}
echo "</table><br><br>";
echo "種類: <br>  1:動作類<br>  2:冒險類<br>  3:喜劇類<br>  4:音樂類<br>  5:恐怖類<br>  6:奇幻類<br>  7:愛情類<br>  8:動畫類<br>  9:戰爭類<br>  10:歷史類";

echo "<br><br>";

?>
</head>
<body style="background-color:#DCDCDC;">

<form method="post" action="" id="usform" enctype='multipart/form-data'>
  <label for="id">欲修改電影(請輸入id號碼):</label><br>
  <input type="text"  name="id" value=""><br>
  <input type='submit' value='確定' name='upload'>
  <a href="index.php">回首頁</a>
</form>
</body>
</html>