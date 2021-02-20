<?php

if (isset($_POST['login-submit'])){
    require 'dbhandler.php';

    $username=$_POST['uname-email'];
    $passw=$_POST['pwd'];

    if(empty($uname)|| empty($passw)){
        hearder("Location ../login.php?error=Emptyfield");
    exit();     
    }

    $sql = "SELECT * FROM users WHERE uname = ? OR email=?";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        hearder("Location ../login.php?error=SQLInjection");
    exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $uname, $uname);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $data=mysqli_fetch_assoc($resutlt);

        if(emtpy($data)){
            hearder("Location ../login.php?error=userDNE");
            exit();       
        }
        else{
            $pass_check=password_verify($passw, $data("password"));
            if($pass_check==true){
                session_start();
                $_SESSION['uid']=$data['uid'];
                $_SESSION['fname']=$data['fname'];
                $_SESSION['uname']=$data['uname'];

                echo "<h1>Success!</h1><p>.$uname.</p>";

            }else{
                header("Location:../login.php?error=wrongPass");
                exit();
            }
        }
    }



}else{
    hearder("Location ../login.php");
    exit();     
}
