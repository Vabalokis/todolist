<?php
require_once ("db_connect.php");

$sql = "SELECT * FROM todo_list WHERE is_archived = 0 ORDER BY id asc";

$result = mysqli_query($connect, $sql);
$record_set = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($record_set, $row);
}
mysqli_free_result($result);
mysqli_close($connect);
echo json_encode($record_set);
?>