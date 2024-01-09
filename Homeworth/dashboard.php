<?php require_once('includes/header2.php') ?>

    <section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-12">
                <h3>Create Property</h3>
                <p>fill the form below to create a post.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="includes/create.php" method="POST" enctype="multipart/form-data">

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
                        <input type="text" class="form-control" name="name" id="">

                        <input type="number" name="designerid" value="<?=$id?>">
                    </div>
                    <div class="form-group">
                        <label for="">Location</label>
                        <input type="text" class="form-control" name="location" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Buiilding Type</label>
                        <select name="type" class="form-control"  id="">
                           <option value="Woodland">Woodland</option>
                           <option value="Classic">Classic</option>
                           <option value="Modern">Modern</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="Office">Office</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Small House">Small House</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Area</label>
                        <input type="number" class="form-control" name="area" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Bed</label>
                        <input type="number" class="form-control" name="bed" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Bath</label>
                        <input type="number" class="form-control" name="bath" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Living room</label>
                        <input type="number" class="form-control" name="living" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Kitchen</label>
                        <input type="number" class="form-control" name="kitchen" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Office</label>
                        <input type="number" class="form-control" name="office" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Picture</label>
                        <input type="file" multiple class="form-control" name="file[]" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price" id="">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" name="submit">submit</button>
                    </div>
                </form><br><br>
            </div>
        </div>
    </section>
  

</body>

</html>