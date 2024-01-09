
<?php 
    require_once('includes/header2.php');
    require_once('includes/connection.php');
    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        $sql2 = "SELECT * FROM properties WHERE id = '$pid'";
        $res2 = mysqli_query($con, $sql2);
        $rows2 = mysqli_fetch_assoc($res2);
        $pname = $rows2['pname'];
        $plocation = $rows2['plocation'];
        $ptype = $rows2['ptype'];
        $pstatus = $rows2['pstatus'];
        $parea = $rows2['parea'];
        $pbed = $rows2['pbed'];
        $pbath = $rows2['pbath'];
        $pliving = $rows2['pliving'];
        $pkitchen = $rows2['pkitchen'];
        $poffice = $rows2['poffice'];
        $pdescription = $rows2['pdescription'];
        $pimg = $rows2['pimg'];
        $pprice = $rows2['pprice'];
        $pid = $rows2['id'];

        $sqlp = "SELECT * FROM img WHERE pid = '$pid' ORDER BY RAND() LIMIT 1";
            $resp = mysqli_query($con, $sqlp);
            $rowsp = mysqli_fetch_assoc($resp);
            $imgp = $rowsp['img'];
    }else{
        header('location: dashboard.php');
        return false;
    }
?>

<section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Property</h3>
                <p>fill the form below to edit a post.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">                
                <img src="includes/post/<?=$imgp?>" width="150" height="150" alt="">
            </div>
        <div class="row">
            <div class="col-md-12">
                <form action="includes/editsub.php" method="POST" enctype="multipart/form-data">

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

                    <input type="hidden" name="pid" value="<?=$pid?>" id="">
                    <input type="hidden" name="img" value="<?=$imgp?>" id="">


                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="<?=$pname?>"  id="">

                    </div>
                    <div class="form-group">
                        <label for="">Location</label>
                        <input type="text" class="form-control" name="location"  value="<?=$plocation?>" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Buiilding Type</label>
                        <select name="type" class="form-control" value="<?=$ptype?>"   id="">
                           <option value="Woodland">Woodland</option>
                           <option value="Classic">Classic</option>
                           <option value="Modern">Modern</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control" value="<?=$status?>"  id="">
                            <option value="Office">Office</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Small House">Small House</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Area</label>
                        <input type="number" class="form-control" name="area" value="<?=$parea?>"  id="">
                    </div>
                    <div class="form-group">
                        <label for="">Bed</label>
                        <input type="number" class="form-control" name="bed" value="<?=$pbed?>"  id="">
                    </div>
                    <div class="form-group">
                        <label for="">Bath</label>
                        <input type="number" class="form-control" name="bath" value="<?=$pbath?>"  id="">
                    </div>
                    <div class="form-group">
                        <label for="">Living room</label>
                        <input type="number" class="form-control" name="living" value="<?=$pliving?>"  id="">
                    </div>
                    <div class="form-group">
                        <label for="">Kitchen</label>
                        <input type="number" class="form-control" name="kitchen" value="<?=$pkitchen?>"  id="">
                    </div>
                    <div class="form-group">
                        <label for="">Office</label>
                        <input type="number" class="form-control" name="office" value="<?=$poffice?>"  id="">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="desc" id="" cols="30" rows="10" class="form-control"><?=$pdescription?></textarea>
                    </div>
                
                  
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" multiple class="form-control" name="price" value="<?=$pprice?>" id="">
                    </div>
                  
                    <div class="form-group mt-3">
                        <button class="btn btn-success" name="submit">submit</button>
                    </div>
                </form><br><br>
            </div>
        </div>
    </section>
    <section class="">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Images </h3>
                <form action="includes/editsub.php" method="POST" enctype="multipart/form-data">

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

                    <input type="hidden" name="pid" value="<?=$pid?>" id="">
                    <input type="hidden" name="img" value="<?=$imgp?>" id="">

                    <div class="form-group">
                 <label for="">Picture</label>
                        <input type="file" multiple class="form-control" name="file1" id="">
                    </div>
                  
                    <div class="form-group mt-3">
                        <button class="btn btn-success" name="submit">submit</button>
                    </div>
            <div class="form-group">
                 <label for="">Picture</label>
                        <input type="file" multiple class="form-control" name="file2" id="">
                    </div>
                  
                    <div class="form-group mt-3">
                        <button class="btn btn-success" name="submit">submit</button>
                    </div>
            <div class="form-group">
                 <label for="">Picture</label>
                        <input type="file" multiple class="form-control" name="file3" id="">
                    </div>
                  
                    <div class="form-group mt-3">
                        <button class="btn btn-success" name="submit">submit</button>
                    </div>
            <div class="form-group">
                <label for="">picture</label>
                <input type="file" multiple class="form-control" name="file4" id="">
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-success" name="submit">submit</button>
            </div>
            <div class="form-group">
                <label for="">picture</label>
                <input type="file" multiple class="form-control" name="file5" id="">
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-success" name="submit">submit</button>
            </div>
        </form>
        </div>
      </div>
        
       
    </section>
  

</body>

</html>