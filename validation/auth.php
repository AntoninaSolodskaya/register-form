<?php
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$name = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);

if (isset($_POST['submit']))
{
    
    if (empty($_POST['email']))
    {
       echo "Invalid email" . "</br>";
    } 
    if (!$email)
    {
        echo "Invalid email format" . "</br>";
    } 
    if (mb_strlen($email) < 10 || mb_strlen($email) > 40 )
    {
        echo "Invalid email format" . "</br>";
    }
        
    if (mb_strlen($name) < 3 || mb_strlen($name) > 30 || empty($_POST['username']))
    {
        echo "Invalid name length" . "</br>";
    } 
    else
    {
        $db = mysqli_connect("localhost", "root", "", "form");
        $db->query("SET NAMES 'utf8'");
        $db->query("INSERT INTO `users` (`email`, `username`) VALUES ('$email', '$name')");
        $db->close(); 
       
    }
    header( "Refresh: 5;url=/register-form./index.php" );
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="../index.php">here</a>.'; 
}
