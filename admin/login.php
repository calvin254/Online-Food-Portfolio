<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
    <div>
    <div style="float:left; width:40%;">
        <img src="../images/loginbg.jpg" style=" width:580px;height:650px;" alt="">
    </div>
        <div style="float:right;margin-right:100px; margin-top:200px; border:3px solid whitesmoke;width:500px; border-radius:15px;">
            <h1 class="text-center" style="padding:10px;"><u>Admin Login</u></h1>
            
            <br><br>
 
            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        

<div>
            <!-- Login Form Starts HEre -->
            <form action="" method="POST" style="margin-left:20px;">
           <label style="font-size:20px; padding:5px;"> Username:</label> <br>
            <input type="text" name="username" style="border-radius:15px; width:80%; padding:5px;" placeholder="Enter Username"><br><br>

            <label style="font-size:20px; padding:5px;"> Password:</label> <br>
            <input type="password" name="password" style=" border-radius:15px;width:80%; padding:5px;" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" style="width:80%;" class="btn-primary">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->
            </div>
            </div>
            
            
        </div>

    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>