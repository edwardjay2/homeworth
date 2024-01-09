<?php 
  require_once('includes/connection.php');
  require_once('includes/header.php'); 
?>

<section class=" p-4"><br><br>
        <div class="city text-center my-5">
            <h2 style="color: blue;">Our Amazing Designers</h2>
            <h4 style="color: rgb(60, 59, 59);">View our amazing designers</h4>
        </div>
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4 py-5 ">
    <?php 
          $sql = "SELECT * FROM designers";
          $res = mysqli_query($con, $sql);
          if(mysqli_num_rows($res) > 0){
            while($rows = mysqli_fetch_assoc($res)){ 
              $aname = $rows['name'];       
              $aimg = $rows['img']; 
              $aspec = $rows['specification'];      
              $aemail = $rows['email'];       
              $aphone = $rows['phone'];       
              $adescription = $rows['description'];       
              $afacebook = $rows['facebook'];       
              $ainstagram = $rows['instagram'];       
              $atwitter = $rows['twitter'];       
              $aid = $rows['id'];       
        ?>

        <div class="col-md-6">
            <div class="card mb-3" style="max-width:100%;">
                <div class="row g-0">
                    <div class="col-md-6 p-0">
                        <img src="includes/dp/<?=$aimg?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                        <h5 class="text-none"><a href="designer-single.php?evin=<?=$aid?>"><?=$aname?></a></h5>
                            <p class="card-text"><?=$aphone?></p>
                            <p class="card-text"><?=$aemail?></p>
                            <p class="card-text"><small class="text-muted">Specification: <?=$aspec?> Designer</small></p>
                            <div class="social-icons">
                                <a href="<?=$afacebook?>"><i class="bx bxl-facebook"></i></a>
                                <a href="<?=$atwitter?>"><i class="bx bxl-twitter"></i></a>
                                <a href="<?=$ainstagram?>"><i class="bx bxl-instagram"></i></a>
                              </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <?php } ?>
          <?php }else{ ?>
            <div class="col-md-4">
              <h1>no realtor has signed up yet...</h1>
            </div>
          <?php } ?>

    </div>
</div>
    </section>
<?php require_once('includes/footer.php') ?>