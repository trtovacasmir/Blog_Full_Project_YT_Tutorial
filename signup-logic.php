<?php
require 'config/database.php';

// get signup form data ig signup button was clicked

if (isset($_POST['submit'])) {
   $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
   $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
   $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
   $createpassword = filter_var($_POST['createpassword'], FILTER_VALIDATE_EMAIL);
   $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
   $avatar = $_FILES['avatar'];


   //validate input values

   if (!$firstname) {
      $_SESSION['signup'] = "Please enter your First Name";
   }elseif (!$lastname) {
    $_SESSION['signup'] = "Please enter your Last Name";
   }elseif (!$username) {
    $_SESSION['signup'] = "Please enter your Username";
   }elseif (!$email) {
    $_SESSION['signup'] = "Please enter your a valid email";
   }elseif (!$createpassword) {
    $_SESSION['signup'] = "Please enter your Password";
   }elseif (!$confirmpassword) {
    $_SESSION['signup'] = "Please confirm your Password";
   }
   

} else {
    // if button wasn't clicked, bounce back to signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}