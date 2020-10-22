<?php
// include database connection file
include"../config.php";
 
// Get id from URL to delete that user
$id = (isset($_GET['id']));
 
// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM users WHERE id=$id");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location: user.php");
?>
