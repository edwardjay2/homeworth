<?php
    // bringing in our connection file
    require_once('connection.php');

    // checking if submit button was clicked on or not
    if(isset($_POST['submit'])){ 
        // accessing form inputs and saving to variables
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $fac = isset($_POST['fac']) ? $_POST['fac'] : '';
        $twi = isset($_POST['twi']) ? $_POST['twi'] : '';
        $inst = isset($_POST['inst']) ? $_POST['inst'] : '';
        $id = $_POST['id'];
        $img = $_POST['img'];

        // use the created sanitize function to cleanse form inputs
        $name = sanitize($con, $name);
        $phone = sanitize($con, $phone);
        $email = sanitize($con, $email);
        $fac = sanitize($con, $fac);
        $twi = sanitize($con, $twi);
        $inst = sanitize($con, $inst);

        
        // file processing
        if($_FILES['file']['name'] != ''){
            // allowed file extensions
            $allow = array('png', 'jpeg', 'jpg', 'gif', 'heic');
            $filename = $_FILES['file']['name'];
            $fileTmp = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];

            // getting the file extension to check if proper file was sent
            $fileext = explode('.', $filename);
            $fileactualext = strtolower(end($fileext));
            
            // validations
            if($filesize < 800000){
                if(in_array($fileactualext, $allow)){
                    // generate neew name for picture
                    $pic = uniqid('',true).'.'.$fileactualext;
                    $location = 'dp/'.$pic;
                    
                    // move file to the specified location
                    if(move_uploaded_file($fileTmp, $location)){
                        // delete previous file
                        unlink('dp/'.$img);

                        // save to database
                        $sql2 = "UPDATE `designers` SET `name` = '$name', `phone` = '$phone', `facebook` = '$fac', `twitter` = '$twi', `instagram` = '$inst', `img` = '$pic' WHERE `id` = '$id'";

                        $res2 = mysqli_query($con, $sql2);
                        if($res2){
                            header('location: ../settings.php?success=profile updated');
                            return false;
                        }else{
                            header('location: ../settings.php?error=error updating account');
                            return false;
                        }
                    }else{
                        header('location: ../settings.php?error=error saving file');
                        return false;
                    }
                }else{
                    header('location: ../settings.php?error=unsupported file format');
                    return false;
                }
            }else{
                header('location: ../settings.php?error=file is too large');
                return false;
            }
        }else{
           // save to database
           $sql2 = "UPDATE `designers` SET `name` = '$name', `phone` = '$phone', `facebook` = '$fac', `twitter` = '$twi', `instagram` = '$inst' WHERE `id` = '$id'";
           

           $res2 = mysqli_query($con, $sql2);
           if($res2){
               header('location: ../settings.php?success=profile updated');
               return false;
           }else{
               header('location: ../settings.php?error=error updating account');
               return false;
           } 
        }
    }else{
        header('location: ../register.php?error=unauthorised access');
        return false;
    }

?>