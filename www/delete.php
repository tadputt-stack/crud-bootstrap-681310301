<?php
include "db_conn.php";
$id = $_GET['id'];

$sql = "DELETE FROM `crud_681310301` WHERE id = $id";

$result = mysqli_query($conn, $sql);
if($result) {
    header("Location: index.php?msg=Data deleted successfully");
    exit();
} 
else {
    echo "Failed: ". mysqli_error($conn);
}