<?php
 require 'dphandler.php';
 session_start();

 define ('KB', 1024);
 define ('MB', 1048576);

 if (isset ($_POST['prof-submit'])){

        $uname = $_SESSION['uname'];
        $file = $_FILES ['prof-image'];
        $file_tmp_name = $file ['tmp-name'];
        $file_error = $file ['error'];
        $file_size = $file ['size'];


        $ext = strtowlower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed = array ('jpg' , 'jpeg' , 'png' , 'svg');

        if ($file_erorr !=0) {
            header("Location: ../proflile.php?error=UploadError");
            exit();
        }

        if (!in_array($ext, $allowed)){
            header("Location: ../proflile.php?error=InvalidType");
            exit();
        }

        if ($file_size > 4*MB){
            header("Location: ../proflile.php?error=FileSizeExceeded");
            exit();
        }

        else {
            $new_name = uniqid ('',true).".".$ext;

            $destination = '../profiles/'.$new_name;

            $sql = "UPDATE profiles SSET profpic ='$destination' WHERE uname = '$uname'";

            mysqli_query($conn , $sql);

            move_uploaded_file($file_tmp_name, $destination);
            header("Location: ../profiles.php?success=Upload");
            exit();
        }
 }else {
     header("Location: ../profiles.php"); 
 }
 