<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css -->
    <link rel="stylesheet" href="css/loginanimation.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>homeworth</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="text-center mt-5">
          
                <form action="includes/loginsub.php" method="POST">

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
                    
                    <img class="mt-4" src="images/icon/home.png" alt="homeworth Logo">
                    <h3>Sign In</h3>

                <div class="form-group">
                    <label for="emailAddress" 
                    class="sr-only"></label>
                    <input type="email" name="email" require id=""
                    class="form-control" placeholder="Email Address"
                    >
                </div>

                <div class="form-group">
                    <label for="password"
                    class="sr-only"></label>
                    <input type="password" name="password" required id=""
                   class="form-control" placeholder="password">
                </div>

                   <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remeber me
                    </label>
                   </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-success" name="submit">Sign in</button>
                    </div>
                </form><br>
                <div>
                    <p>not yet a member? <a href="register.php" class="text-success">click Here</a> to register</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Js Bootstrap -->
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>