<?php
require_once ('Config/config.php');

$e=""; 
$error=""; 
if($_GET['e']){
    $error = $_GET['e'];
}

?>

 

<?php include 'Views/home.php'; ?>
 

