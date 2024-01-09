<?php 
  require_once('includes/header.php');
  require_once('includes/connection.php');

  if(isset($_GET['evans'])){
    $pid = $_GET['evans'];
    
    $sql = "SELECT * FROM properties WHERE id = '$pid'";
    $res = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($res);
    $pname = $rows['pname'];
    $plocation = $rows['plocation'];
    $pimg = $rows['pimg'];
    $parea = $rows['parea'];
    $pstatus = $rows['pstatus'];
    $ptype = $rows['ptype'];
    $pbath = $rows['pbath'];
    $pbed = $rows['pbed'];
    $pliving = $rows['pliving'];
    $pkitchen = $rows['pkitchen'];
    $poffice = $rows['poffice'];
    $pdescription = $rows['pdescription'];
    $pprice = $rows['pprice'];
    $designerid = $rows['designerid'];


    $sql2 = "SELECT * FROM designers WHERE id = '$designerid'";
    $res2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $name = $row2['name'];
    $img = $row2['img'];
    $description = $row2['description'];
    $phone = $row2['phone'];
    $email = $row2['email'];
    $facebook = $row2['facebook'];
    $instagram = $row2['instagram'];
    $twitter = $row2['twitter'];

    
    $sqlp = "SELECT * FROM img WHERE pid = '$pid' ORDER BY RAND() LIMIT 1";
    $resp = mysqli_query($con, $sqlp);
    $rowsp = mysqli_fetch_assoc($resp);
    $imgp = $rowsp['img'];

  }else{
    header('location: collections-grid.php');
    return false;
  }

  
?>
  
    <section class="features">
    <div class="city text-center my-1">
            <h2 style="color: blue;">Our Amazing Home Designs</h2>
            <h4 style="color: rgb(60, 59, 59);">View our amazing designs</h4>
        </div><br><br>

        <div class="containera">
            <div class="row">
              <div class="col-md-6-center">
                <img src="includes/post/<?=$imgp?>"  alt="" style="height: 50rem;" />
            </div>
            </div>
        </div><br><br>



        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                            <div class="col-md-6">
                            <h5>Building Name:</h5>
                            </div>
                            <div class="col-md-6">
                            <p style="color: black;"><?=$pname?></p>
                            </div>
                            <div class="col-md-6">
                            <h5>Type:</h5>
                            </div>
                            <div class="col-md-6">
                            <p style="color: black;"><?=$ptype?></p>
                            </div>
                            <div class="col-md-6">
                            <h5>Status:</h5>
                            </div>
                            <div class="col-md-6">
                            <p style="color: black;"><?=$pstatus?></p>
                            </div>
                            <div class="col-md-6">
                            <h5>Bed:</h5>
                            </div>
                            <div class="col-md-6">
                            <p style="color: black;"><?=$pbed?></p>
                            </div>
                            <div class="col-md-6">
                            <h5>Kitchen:</h5>
                            </div>
                            <div class="col-md-6">
                            <p style="color: black;"><?=$pkitchen?></p>
                            </div>
                            </div>
                        </div>
                        <div class="proerty dsecription">
                    <p>
                    <?=$pdescription?>
                    </p>
                </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                            <h5>Location:</h5>
                            </div>
                            <div class="col-md-6">
                            <p style="color: black;"><?=$plocation?></p>
                            </div>
                            <div class="col-md-6">
                            <h5>Area:</h5>
                            </div>
                            <div class="col-md-6">
                            <p style="color: black;"><?=$parea?>m
                            <sup>2</sup> 
                        </p>
                            </div>
                            <div class="col-md-6">
                            <h5>Bath:</h5>
                            </div>
                            <div class="col-md-6">
                            <p style="color: black;"><?=$pbath?></p>
                            </div>
                            <div class="col-md-6">
                            <h5>Living:</h5>
                            </div>
                            <div class="col-md-6">
                            <p style="color: black;"><?=$pliving?></p>
                            </div>
                            <div class="col-md-6">
                            <h5>Office:</h5>
                            </div>
                            <div class="col-md-6">
                            <p style="color: black;"><?=$poffice?></p>
                            </div>
                    </div>
                   
                </div>
            </div>
        </div>
     </section>
     <section style="border"  class="gallery">
     <div class="container">
        <h2 class="text-center my-4">Image Gallery</h2>
        <div class="row">
        <?php
            $sql4 = "SELECT * FROM img WHERE pid = '$pid' ORDER BY RAND() ";
            $res4 = mysqli_query($con, $sql4);
            while($rows4 = mysqli_fetch_assoc($res4)){
                $rimg = $rows4['img'];
        ?>

          <div class="col-md-4">
            <a href="includes/post/<?=$rimg?>" data-lightbox="mygallery"><img src="includes/post/<?=$rimg?>"  alt="" style="height: 18rem;" /></a>
          </div>

        <?php } ?>


    <section class="">
        <div class="container">
            <h2>Contact Designer</h2>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <img src="includes/dp/<?=$img?>" style="height: 20rem ;" ><br>
                    <h4 style="color: rgb(4, 21, 103);"><?=$name?></h4><br>
                    <div class="social-icons">
                        <a href="<?=$facebook?>"><i class="bx bxl-facebook"></i></a>
                        <a href="<?=$twitter?>"><i class="bx bxl-twitter"></i></a>
                        <a href="<?=$instagram?>"><i class="bx bxl-instagram"></i></a>
                      </div><br>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Email:</h5>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$email?></p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Phone:</h5>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$phone?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p><?=$description?></p>
                        </div>
                    </div>
                </div>
                <div class="tact col-md-4">
                    <div class="designer contact">

                        <form class="form-a" action="includes/messagesub.php" method="POST">

                            <input type="hidden" name="designerid" value="<?=$designerid?>">
                            <input type="hidden" name="pid" value="<?=$pid?>">
                            <input type="hidden" name="pname" value="<?=$pname?>">
                            <input type="hidden" name="plocation" value="<?=$plocation?>">
        
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
        
                    <div class="col-12">
                        <label for="userName" class="form-label" style="font-weight: bold;">Name</label>
                        <input type="text" class="form-control" placeholder="Jon Doe" id="inputName"
                            aria-labelledby="emailHelp" required name="name">
                    </div>
                    
                    <div class="col-12">
                        <label for="userName" class="form-label" style="font-weight: bold;">Phone No</label>
                        <input type="tel" class="form-control" placeholder="phone" id="inputPhone"
                            aria-labelledby="emailHelp" required name="phone">
                    </div>
                    <div class="col-12">
                        <label for="userName" class="form-label" style="font-weight: bold;">Email Address</label>
                        <input type="email" class="form-control" placeholder="Johndoe@example.com" id="inputEmail"
                            aria-labelledby="emailHelp" required name="email">
                    </div>
                    <div class="col-12">
                        <label for="userName" class="form-label" style="font-weight: bold;">Message Subject</label>
                        <input type="text" required name="subject" class="form-control" placeholder="Enquiries" id="inputSubject"
                            aria-labelledby="emailHelp">
                    </div>
                    <div class="col-12">
                        <label for="userName" class="form-label" style="font-weight: bold;">Enter Message</label>
                        <textarea id="textMessage" name="message" rows="4" class="form-control" placeholder="input details..."></textarea>
                        <button type="submit" name="submit" class="btn btn-primary" style="border-radius: 10px">send message</a>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
          <!-- Add more images within col-md-4 divs as needed -->
        </div>
      </div>
     </section>
<?php require_once('includes/footer.php') ?>