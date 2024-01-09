
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'homeworth';

    // create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    function sanitize($connectionstring, $data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripcslashes($data);
        $data = mysqli_real_escape_string($connectionstring, $data);

        return $data;
    }

    // encrypt password ****
    function passwordEncrypt($password){
        return md5($password);
    }

?>