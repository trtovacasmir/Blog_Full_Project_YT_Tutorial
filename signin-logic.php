<?php
require 'config/database.php';


if (isset($_POST['submit'])) {
    # code...
} else {
    header('location: ' . ROOT_URL . 'signin.php');
}


?>

