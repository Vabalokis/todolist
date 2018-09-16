<?php
require_once ("db_connect.php");

$itemText = isset($_POST['text']) ? mysqli_real_escape_string($connect,$_POST['text']) : "" ;
$sql = "INSERT INTO todo_list(item_text,is_checked,is_archived) VALUES ('$itemText' , 0 , 0 )";
$result = mysqli_query($connect, $sql);

if (! $result) {
    $result = mysqli_error($connect);
}
mysqli_close($connect);
echo $result;
?>




