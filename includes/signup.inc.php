<?php


if (isset($_POST['signup-submit'])) {

    require "dbh.inc.php";

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];

        if ( empty($username) || empty($email) || empty($pwd) || empty($pwdrepeat) ) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();

    }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match(" /^[a-zA-Z0-9]*$/ ",$username) ) {
            header("Location: ../signup.php?error=invalid&uid");
            exit();

    }

        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidmail&uid=".$username);
            exit();
    }
        elseif (!preg_match(" /^[a-zA-Z0-9]*$/ ",$username)) {
            header("Location: ../signup.php?error=invaliduid&mail=".$email);
            exit();
    }
        elseif ($pwd !==  $pwdrepeat) {
            header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
            exit();
    }
        else {
            $sql ="SELECT uidUsers from users WHERE uidUsers=?";
            $stmt = mysqli_stmt_init($conn);   
            if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();    
                }
             else {
                mysqli_stmt_bind_param($stmt,"s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);   
           
            if ($resultCheck > 0) {
                    //   if (!mysqli_stmt_prepare($stmt,$sql)) {
                       header("Location: ../signup.php?error=usertaken&mail=".$email);
                       exit(); 
                       }
          

            else {
                $sql = "INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES (?,?,?) ";
                $stmt = mysqli_stmt_init($conn); 
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit(); 
                }  
                else    {
                     $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);   

                    mysqli_stmt_bind_param($stmt,"sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                
                }}
                
            }   

    }    

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

else {
    header("Location: ../signup.php");
    exit();

}




        

