<?php 
  require_once('includes/connection.php');
  require_once('includes/header.php'); 
?>

    <section class="p-4"><br><br>
        <div class="city text-center my-5">
            <h2 style="color: blue;">Our Amazing Designs</h2>
            <h4 style="color: rgb(60, 59, 59);">View our amazing home and office designs</h4>
        </div>
        <div class="container">
            <div class="row">

            <?php
          $sql = "SELECT * FROM properties WHERE deleted = 1";
          $res = mysqli_query($con, $sql);
          if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
              $pname = $row['pname'];  
              $pic = $row['img'];  
              $plocation = $row['plocation'];  
              $pstatus = $row['pstatus'];  
              $ptype = $row['ptype']; 
              $pdescription = $row['pdescription'];   
              $pid = $row['id'];

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
                        
                          <a href="collections-single.php?evans=<?=$pid?>" class="btn btn-primary" style="border-radius: 10px">view our work</a>
                      </div>
                  </div>
 </div>
    
    <?php } ?>
        <?php }else{ ?>

          <div class="col-md-4">
            <h4>no property uploaded yet...</h4>
          </div>
          
        <?php } ?>
        
        </div>
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->
  
<?php require_once('includes/footer.php') ?>