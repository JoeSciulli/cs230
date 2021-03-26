<?php
 require 'dphandler.php';
 
 session_start();

 define ('KB', 1024);
 define ('MB', 1048576);

 if (isset ($_POST['gallery-submit'])){

        $file = $_FILES ['prof-image'];
        $file_tmp_name = $file ['tmp-name'];
        $file_error = $file ['error'];
        $file_size = $file ['size'];

        $title =$_POST ['title'];
        $descript = $_POST ['descript'];


        $ext = strtowlower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed = array ('jpg' , 'jpeg' , 'png' , 'svg');

        if ($file_erorr !=0) {
            header("Location: ../admin.php?error=UploadError");
            exit();
        }

        if (!in_array($ext, $allowed)){
            header("Location: ../admin.php?error=InvalidType");
            exit();
        }

        if ($file_size > 4*MB){
            header("Location: ../admin.php?error=FileSizeExceeded");
            exit();
        }

        else {
            $new_name = uniqid ('',true).".".$ext;

            $destination = '../gallery/'.$new_name;

            $sql = "INSERT gallery (title, descript, picpath) VALUE = (?,?,?)";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt,$sql)){
                hearder("Location ../login.php?error=SQLInjection");
            exit();
            }else{

                mysqli_stmt_bind_param($stmt, "sss", $title, $descript, $destination);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_results($stmt);
                move_uploaded_file($file_tmp_name, $destination);
                header("Location: ../admin.php?success=GalleryUpload");
                exit();
            }


        }
 }else {
     header("Location: ../admin.php"); 
 }
 