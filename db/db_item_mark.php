<?php
require_once ("db_connect.php");

$changedID = isset($_POST['checked_id']) ? mysqli_real_escape_string($connect,$_POST['checked_id']) : "" ;
$sql = "UPDATE todo_list SET is_checked = 1 WHERE id='$changedID' ";
$result = mysqli_query($connect, $sql);

if (! $result) {
    $result = mysqli_error($connect);
}
mysqli_close($connect);
echo $result;
?>