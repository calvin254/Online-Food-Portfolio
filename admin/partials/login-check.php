<?php 

    if(!isset($_SESSION['user'])) //IF user session is not set
    {
        //User is not logged in
        //REdirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        
        header('location:'.SITEURL.'admin/login.php');
    }

?>