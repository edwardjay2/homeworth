<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css -->
    <link rel="stylesheet" href="css/formfill.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Homeworth</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="">
                <form action="includes/registersub.php" method="POST" enctype="multipart/form-data">

                    <!-- This is for creating alerts for errors or incomplete registration during registration 
                    using $_GET to find errors -->
                    <?php if(isset($_GET['error'])){ ?>
                      <div class="alert alert-danger alert-dismissible">
                         <button class="btn-close" data-bs-dismiss="alert"></button>
                         <p><?php echo $_GET['error'] ?></p>
                     </div>
                    <?php }else if(isset($_GET['success'])){ ?>
                      <div class="alert alert-success alert-dismissible">
                         <button class="btn-close" data-bs-dismiss="alert"></button>
                         <p><?php echo $_GET['success'] ?></p>
                      </div>
                    <?php } ?>

                    <img class="mt-4" src="images/icon/home.png" alt="homeworth Logo" style="margin-left: -25px;">
                    <h3>Register</h3>
                <div class="form-group">
                    <label for="name" 
                    class="sr-only">Fullname</label>
                    <input type="text" name="name" required id="" 
                    class="form-control" placeholder="Fullname"
                    required autofocus>
                </div>

                <div class="form-group">
                    <label for="" 
                    class="sr-only">Phone No.</label>
                    <input type="text" name="phone" required id="" 
                    class="form-control" placeholder="phonenumber"
                    required autofocus>
                </div>

                <div class="form-group">
                    <label for="" 
                    class="sr-only">Email</label>
                    <input type="email" name="email" required id="" 
                    class="form-control" placeholder="Email Address"
                    required autofocus>
                </div>

                <div class="form-group">
                    <label for=""
                    class="sr-only">Password</label>
                    <input type="password" name="password" required id=""
                   class="form-control" placeholder="password">
                </div>

                <div class="form-group">
                        <label for="">Specification</label>
                        <select name="spec" class="form-control" required id="">
                            <option value="Office">Office</option>
                            <option value="Home">Home</option>
                        </select>
                    </div>       

                 

                <div class="form-group">
                   <label for="facebook" 
                    class="sr-only">Facebook Link</label>
                    <input type="text" 
                    class="form-control" name="fac" placeholder=""
                    required id=""
                    required autofocus>
                </div>

                <div class="form-group">
                    <label for="" 
                    class="sr-only">Twitter Link</label>
                    <input type="text" 
                    class="form-control" name="twi" placeholder=""
                    required id=""
                    required autofocus>
                </div>


                <div class="form-group">
                    <label for="" 
                    class="sr-only">Instagram Link</label>
                    <input type="text" 
                    class="form-control" name="inst" placeholder=""
                    required id=""
                    required autofocus>
                </div>

                    <div class="form-group">
                        <label for="">Picture</label><br>
                        <input type="file" class="form-control" name="file" required id="">
                    </div>
                   

                   <div class="form-group mt-3">
                        <button class="btn btn-success" name="submit">submit</button>
                    </div>
                </form>
                <div>
                    <p>already a member? <a href="login.php" class="text-success">click Here</a> to login</p>
                </div><br><br>
            </div>
        </div>
    </div>
    
    <!-- Js Bootstrap -->
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>