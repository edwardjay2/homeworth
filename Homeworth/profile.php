<?php require_once('includes/header2.php') ?>

<section><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <img src="includes/dp/<?=$img?>" width="100%" height="500vh">
                </div>
                <div class="col-md-6">

                    <div class="col-md-6">
                        <h5> Name:</h5>
                        </div>
                        <div class="col-md-6">
                        <p style="color: black;"><?=$name?></p>
                        </div>
                    <div class="col-md-6">
                        <h5>Phone:</h5>
                        </div>
                        <div class="col-md-6">
                        <p style="color: black;"><?=$phone?></p>
                        </div>
                    <div class="col-md-6">
                        <h5>Email:</h5>
                        </div>
                        <div class="col-md-6">
                        <p style="color: black;"><?=$email?></p>
                        <p class="card-text"><small class="text-muted">Specification: <?=$specification?> Designer</small></p>
                        </div>
                        <div class="social-icons">
                            <a href="<?=$facebook?>"><i class="bx bxl-facebook"></i></a>
                            <a href="<?=$twitter?>"><i class="bx bxl-twitter"></i></a>
                            <a href="<?=$instagram?>"><i class="bx bxl-instagram"></i></a>
                          </div><br>
                          <a href="settings.php?id=<?=$id?>" class="btn btn-primary" style="padding-left: 9px; padding-right: 9px;">Click to Edit account</a>
                </div>
    
    <section>
<?php 
            $propertysql = "SELECT * FROM properties WHERE designerid = '$id' AND deleted = 1";
            $propertyres = mysqli_query($con, $propertysql);
          ?>
          <div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">My Properties (<?=mysqli_num_rows($propertyres)?>)</h3>
            </div>
          </div>

          <div class="row property grid">
            
          <?php
            if(mysqli_num_rows($propertyres) > 0){ 
              while($property = mysqli_fetch_assoc($propertyres)){
                $pname = $property['pname'];
                $plocation = $property['plocation'];
                $ptype = $property['ptype'];
                $pstatus = $property['pstatus'];
                $pbed = $property['pbed'];
                $pdescription = $property['pdescription'];
                $pbath = $property['pbath'];
                $pimg = $property['pimg'];
                $pid = $property['id'];

                $sqlp = "SELECT * FROM img WHERE pid = '$pid' ORDER BY RAND() LIMIT 1";
            $resp = mysqli_query($con, $sqlp);
            $rowsp = mysqli_fetch_assoc($resp);
            $imgp = $rowsp['img'];
          ?>


      
      <div class="col-md-4">
        <div class="card" style="width: 20rem">
            <img src="includes/post/<?=$imgp?>" width="100%" height="350" alt="" class="card-img-top" alt="" style="height: 14rem;" />
            <div class="card-body">
              <h4 style="color: rgb(12, 12, 12);" class="card-title"><?=$pname?></h4>
              <div class="row">
              <div class="col-md-6">
                  <h6 style="color: rgb(91, 87, 87);" class="card-title"><?=$pstatus?></h6>
              </div>
              <div class="col-md-6">
                  <h6 style="color: rgb(91, 87, 87);" class="card-title"><?=$ptype?></h6>
              </div>
              </div>
              <h6 style="color: rgb(91, 87, 87);" class="card-title"><?=$plocation?></h6>
              <p>
                  <?=$pdescription?>
              </p>
              <div class="social-icons">
                            <a href="edit.php?pid=<?=$pid?>"><i class="bx bx-edit"></i></a>
                            <a href="collections-single.php?evans=<?=$pid?>"><i class="bx bx-image"></i></a>
                            <a href="includes/delete.php?pid=<?=$pid?>"><i class="bx bx-trash"></i></a>
                          </div>
            </div>
        </div>
</div>
  <?php } ?>
<?php }else{ ?>
  <div class="col-md-4">
    <h1>no property uploaded yet</h1>
  </div>
<?php } ?>
      </div>
    </section>
    </div>
</div>
    </section>