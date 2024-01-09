<?php
    // bringing in our connection file
    require_once('connection.php');

    // checking if submit button was clicked on or not
    if(isset($_POST['submit'])){ 
        // accessing form inputs and saving to variables
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
        $message = isset($_POST['message']) ? $_POST['message'] : '';

        $designerid = $_POST['designerid'];
        $pname = $_POST['pname'];
        $pid = $_POST['pid'];
        $plocation = $_POST['plocation'];

        // use the created sanitize function to cleanse form inputs
        $name = sanitize($con, $name);
        $email = sanitize($con, $email);
        $phone = sanitize($con, $phone);
        $subject = sanitize($con, $subject);
        $message = sanitize($con, $message);

        // generate date
        $today = date('Y-m-d');

                       
        // save to database
        $sql2 = "INSERT INTO messages(designerid, pname, plocation, name, email, phone, message, subject, createddate)
         VALUES('$designerid', '$pname', '$plocation', '$name', '$email', '$phone', '$message', '$subject', '$today')";

        $res2 = mysqli_query($con, $sql2);
        if($res2){
            header('location: ../collections-single.php?evans='.$pid.'&success=message sent successfully');
            return false;
        }else{
            header('location: ../collections-single.php?evans='.$pid.'&error=error sending message');
            return false;
        }
                   
    }else{
        header('location: ../register.php?error=unauthorised access');
        return false;
    }

?>