<?php include 'includes/header-en.php'; ?> 

        
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Sales Datatable</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Paying Method</th>
                                <th>Delete</th>
                            </tr>
                            </thead>

                            <tbody>
                                
                                <?php
                    
                    $sql = "select * from sales ORDER BY id DESC";
                    $res = mysqli_query($conn , $sql);
                    
                    while($sales = mysqli_fetch_array($res))
                    {?>
                        <tr>
                                    <td><?= $sales['name'] ?></td>
                                    <td><?= $sales['number'] ?></td>
                                    <td><?= $sales['email'] ?></td>
                                    <td><?= $sales['country'] ?></td>
                                    <td><?= $sales['city'] ?></td>
                                    <td><?= $sales['address'] ?></td>
                                    <td><?= $sales['paying'] ?></td>
                                    <td> <form action="../backend/sales.php" method = "POST" enctype = "multipart/form-data">
                                    <input type="hidden" name="delete_id" value = "<?= $sales['id'];?>">
                                    <input type="hidden" name="script">
                                    <button type="submit" name="delete" class = "btn btn-danger">Delete</button>
                                </form></td>
                                </tr>
                   <?php }
                                ?>
                                                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
</div> <!-- end row -->

<?php include 'includes/footer.php'; ?> 