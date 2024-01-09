<?php require_once('includes/header2.php') ?>

 
    <section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Account</h3>
                <p>fill the form below to update account.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">                
                <img src="includes/dp/<?=$img?>" width="150" height="150" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="includes/settingssub.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?=$id?>" id="">
                    <input type="hidden" name="img" value="<?=$img?>" id="">

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

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required id="" value="<?=$name?>">
                    </div>
                    <div class="form-group">
                        <label for="">Phone No</label>
                        <input type="text" class="form-control" name="phone" required id="" value="<?=$phone?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" readonly id="" value="<?=$email?>">
                    </div>
                    <div class="form-group">
                        <label for="">Facebook Link</label>
                        <input type="text" class="form-control" name="fac" required id="" value="<?=$facebook?>">
                    </div>
                    <div class="form-group">
                        <label for="">Twitter Link</label>
                        <input type="text" class="form-control" name="twi" required id="" value="<?=$twitter?>">
                    </div>
                    <div class="form-group">
                        <label for="">Instagram Link</label>
                        <input type="text" class="form-control" name="inst" required id="" value="<?=$instagram?>">
                    </div>
                    <div class="form-group">
                        <label for="">Picture</label>
                        <input type="file" class="form-control" name="file"  id="">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary" name="submit">submit</button>
                    </div>
                </form><br><br>
            </div>
        </div>
    </section>

