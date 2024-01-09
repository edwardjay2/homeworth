<?php
    // bringing in our connection file
    require_once('connection.php');

   

    // checking if submit button was clicked on or not
    if(isset($_POST['submit'])){ 
        // accessing form inputs and saving to variables
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $spec = isset($_POST['spec']) ? $_POST['spec'] : '';
        $fac = isset($_POST['fac']) ? $_POST['fac'] : '';
        $twi = isset($_POST['twi']) ? $_POST['twi'] : '';
        $inst = isset($_POST['inst']) ? $_POST['inst'] : '';

        

        // checking if any input fields are empty
        if($name == '' || $phone == '' || $email == '' || $password == '' || $spec == '' || $fac == '' || $twi == '' || $inst == ''){
            header('location: ../register.php?error=all fields are required');
            return false;
        }

        // use the created sanitize function to cleanse form inputs
        $name = sanitize($con, $name);
        $phone = sanitize($con, $phone);
        $email = sanitize($con, $email);
        $password = sanitize($con, $password);
        $spec = sanitize($con, $spec);
        $fac = sanitize($con, $fac);
        $twi = sanitize($con, $twi);
        $inst = sanitize($con, $inst);
        

        // generate date
        $today = date('Y-m-d');

        // check if a user has already registered with entered email address
        $sql = "SELECT * FROM designers WHERE email = '$email'";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0){
            header('location: ../register.php?error=user with email already exists');
            return false;
        }

        // file processing
        if(isset($_FILES['file'])){
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
                        // use password encryption function
                        $password = passwordEncrypt($password);

                        // save to database
                        $sql2 = "INSERT INTO designers(name, phone, email, password, specification, facebook, twitter, instagram, img, createddate) VALUES('$name', '$phone', '$email', '$password', '$spec', '$fac', '$twi', '$inst', '$pic', '$today')";
                        
                        $res2 = mysqli_query($con, $sql2);
                        if($res2){
                            header('location: ../login.php?success=registration successful');
                            return false;
                        }else{
                            header('location: ../register.php?error=error creating account');
                            return false;
                        }
                    }else{
                        header('location: ../register.php?error=error saving file');
                        return false;
                    }
                }else{
                    header('location: ../register.php?error=unsupported file format');
                    return false;
                }
            }else{
                header('location: ../register.php?error=file is too large');
                return false;
            }
        }else{
           header('location: ../register.php?error=please upload a file');
           return false; 
        }
    }else{
        header('location: ../register.php?error=unauthorised access');
        return false;
    }

?>