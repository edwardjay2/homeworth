<?php
    require_once('connection.php');

    if(isset($_POST['submit'])){ 
        
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

        $designerid = $_POST['designerid'];

        // checking if any input fields are empty
        if($name == '' || $location == '' || $type == '' || $status == '' || $area == '' || $bed == '' 
        || $bath == '' || $living == '' || $kitchen == '' || $office == '' || $desc == '' || $price == ''){
            header('location: ../dashboard.php?error=all fields are required');
            return false;
        }

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

        // generate date
        $today = date('Y-m-d h:i:sa');


        $sql1 = "INSERT INTO properties(designerid, pname, plocation, ptype, pstatus, parea, pbed, pbath, pliving, pkitchen, poffice, pdescription, pprice, createddate) VALUES('$designerid', '$name', '$location', '$type', '$status', '$area', '$bed', '$bath', '$living', '$kitchen', '$office', '$desc', '$price', '$today')";

    //    echo $sql1; die;
        $res2 = mysqli_query($con, $sql1);

        if($res2){
            $sql2 = "SELECT id FROM properties WHERE createddate = '$today'";
            $res3 = mysqli_query($con, $sql2);
            $rows = mysqli_fetch_assoc($res3);
            $id = $rows['id'];

            // echo $id; die;
        


            if (isset($_FILES['file'])) {
                $allow = array('png', 'jpeg', 'jpg', 'gif', 'heic');
                $additionalImages = $_FILES['file'];

                foreach ($additionalImages['name'] as $key => $imageName) {
                    $filename = $additionalImages['name'][$key];
                    $fileTmp = $additionalImages['tmp_name'][$key];
                    $filesize = $additionalImages['size'][$key];

                    // Validate file size and extension
                    $fileext = explode('.', $filename);
                    $fileactualext = strtolower(end($fileext));

                    if ($filesize < 800000) {
                        if (in_array($fileactualext, $allow)) {
                            // Generate new name for the picture
                            $pic = uniqid('', true) . '.' . $fileactualext;
                            $destination = 'post/' . $pic;

                            // Move file to the specified destination
                            if (move_uploaded_file($fileTmp, $destination)) {
                                // Handle saving to the database or perform additional operations here
                                $sql3 = "INSERT INTO img(pid, img)VALUES('$id', '$pic')";
                                $res = mysqli_query($con, $sql3);
                            } else {
                                header('location: ../dashboard.php?error=error saving file');
                                return false;
                            }
                        } else {
                            header('location: ../dashboard.php?error=unsupported file format');
                            return false;
                        }
                    } else {
                        header('location: ../dashboard.php?error=file is too large');
                        return false;
                    }
                }

                header('location: ../collections-grid.php?success=property created');
                return false;


            } else {

                header('location: ../dashboard.php?error=please upload a file');
                return false;
            }
        }else{
            header('location: ../dashboard.php?error=error processing stuffs');
            return false;
        }
    }else{
        header('location: ../dashboard.php?error=punauthorised access');
        return false;
    }
?>