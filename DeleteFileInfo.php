<?php
include('DatabaseConnection.php');

$File_no = $_POST['deleteId'];


$sql = "DELETE FROM file WHERE `id`=$File_no";

$res = mysqli_query($conn, $sql);

if($res==true){
  header('location: ManageFiles.php');
}


?>