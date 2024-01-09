<?php
    // bringing in our connection file
    require_once('connection.php');

    // checking if submit button was clicked on or not
    if(isset($_POST['submit'])){ 
        // accessing form inputs and saving to variables
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $location = isset($_POST['location']) ? $_POST['location'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $area = isset($_POST['area']) ? $_POST['area'] : '';
        $bed = isset($_POST['bed']) ? $_POST['bed'] : '';
        $bath = isset($_POST['bath']) ? $_POST['bath'] : '';
        $living = isset($_POST['living']) ? $_POST['living'] : '';
        $kitchen = isset($_POST['kitchen']) ? $_POST['kitchen'] : '';
        $office = isset($_POST['office']) ? $_POST['office'] : '';
        $desc = isset($_POST['desc']) ? $_POST['desc'] : ''; 
        $price = isset($_POST['price']) ? $_POST['price'] : '';

        $pid = $_POST['pid'];
        $img = $_POST['img'];

        // use the created sanitize function to cleanse form inputs
        $name = sanitize($con, $name);
        $location = sanitize($con, $location);
        $type = sanitize($con, $type);
        $status = sanitize($con, $status);
        $area = sanitize($con, $area);
        $bed = sanitize($con, $bed);
        $bath = sanitize($con, $bath);
        $living = sanitize($con, $living);
        $kitchen = sanitize($con, $kitchen);
        $office = sanitize($con, $office);
        $desc = sanitize($con, $desc);
        $price = sanitize($con, $price);



        // file processing
        if($_FILES['file']['name'] != ''){
            // allowed file extensions
            $allow = array('png', 'jpeg', 'jpg', 'gif', 'heic');
            $filename = $_FILES['file1']['name'];
            $fileTmp = $_FILES['file1']['tmp_name'];
            $filesize = $_FILES['file1']['size'];
            
            $allow2 = array('png', 'jpeg', 'jpg', 'gif', 'heic');
            $filename2 = $_FILES['file2']['name'];
            $fileTmp2 = $_FILES['file2']['tmp_name'];
            $filesize2 = $_FILES['file2']['size'];

            // getting the file extension to check if proper file was sent
            $fileext = explode('.', $filename);
            $fileactualext = strtolower(end($fileext));
            
            // validations
            if($filesize < 800000){
                if(in_array($fileactualext, $allow)){
                    // generate neew name for picture
                    $pic = uniqid('',true).'.'.$fileactualext;
                    $destination = 'post/'.$pic;
                    
                    // move file to the specified destination
                    if(move_uploaded_file($fileTmp, $destination)){

                        unlink('post/'.$img);
                       
                        // save to database
                        $sql2 = "UPDATE `properties` SET `pname` = '$name', `plocation` = '$location', `ptype` = '$type', `pstatus` = '$status', `parea` = '$area', `pbed` = '$bed', `pbath` = '$bath', `pgarage` = '$garage', `pdescription` = '$desc', `pimg` = '$pic', `pprice` = '$price' WHERE `id` = '$pid'";

                        $res2 = mysqli_query($con, $sql2);
                        if($res2){
                            header('location: ../edit.php?success=property updated&pid='.$pid);
                            return false;
                        }else{
                            header('location: ../edit.php?error=error updating property&pid='.$pid);
                            return false;
                        }
                    }else{
                        header('location: ../edit.php?error=error saving file&pid='.$pid);
                        return false;
                    }
                }else{
                    header('location: ../edit.php?error=unsupported file format&pid='.$pid);
                    return false;
                }
            }else{
                header('location: ../edit.php?error=file is too large&pid='.$pid);
                return false;
            }
        }else{
           // save to database
           $sql2 = "UPDATE `properties` SET `pname` = '$name', `plocation` = '$location', `ptype` = '$type', `pstatus` = '$status', `parea` = '$area', `pbed` = '$bed', `pbath` = '$bath', `pgarage` = '$garage', `pdescription` = '$desc', `pprice` = '$price' WHERE `id` = '$pid'";

           $res2 = mysqli_query($con, $sql2);
           if($res2){
               header('location: ../edit.php?success=property updated&pid='.$pid);
               return false;
           }else{
               header('location: ../edit.php?error=error updating property&pid='.$pid);
               return false;
           } 
        }
    }else{
        header('location: ../register.php?error=unauthorised access');
        return false;
    }

?>