<?php require_once('includes/header2.php') ?>

    <section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-12">
                <h3>Client Enquiries</h3>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-borderd table-hover">
                    <tr>
                        <th>S/N</th>
                        <th>Property Name</th>
                        <th>Property Location</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Comment</th>
                        <th>Time Sent</th>
                    </tr>
                    <?php
                        $msql = "SELECT * FROM messages WHERE designerid = '$id'";
                        $mres = mysqli_query($con, $msql);
                        if(mysqli_num_rows($mres) > 0){
                            $num = 1; 
                            while($mrows = mysqli_fetch_assoc($mres)){
                                $pname = $mrows['pname'];  
                                $plocation = $mrows['plocation'];  
                                $mname = $mrows['name'];  
                                $memail = $mrows['email'];  
                                $mphone = $mrows['phone'];
                                $msubject = $mrows['subject'];  
                                $mmessage = $mrows['message'];  
                                $mcreateddate = $mrows['createddate'];  
                    ?>
                    <tr>
                        <td><?=$num++?></td>
                        <td><?=$pname?></td>
                        <td><?=$plocation?></td>
                        <td><?=$mname?></td>
                        <td><?=$memail?></td>
                        <td><?=$mphone?></td>
                        <td><?=$msubject?></td>
                        <td><?=$mmessage?></td>
                        <td><?=$mcreateddate?></td>
                    </tr>
                        <?php } ?>
                    <?php }else{ ?>
                        <tr>
                            <td><h1>no message yet</h1></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>

</body>

</html>