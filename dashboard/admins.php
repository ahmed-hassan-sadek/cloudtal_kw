<?php include 'includes/header.php'; ?> 

        
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Admins Datatable</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Number</th>
                                <th>email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>

                            <tbody>
                                
                                <?php
                    
                    $qshow = "select * from admins ORDER BY id DESC";
                    $res = mysqli_query($conn , $qshow);
                    
                    while($admins = mysqli_fetch_array($res))
                    {
                        ?><tr>
                                    <td><?=$admins['name']?></td>
                                    <td><?=$admins['number']?></td>
                                    <td><?=$admins['email']?></td>
                                    <td><a href="admin-edit.php?id='.$admins['id'].'">Edit</a></td>
                                    <td>
                                    <form action="../backend/admin.php" method = "POST" enctype = "multipart/form-data">
                                    <input type="hidden" name="delete_id" value = "<?= $admins['id'];?>">
                                    <input type="hidden" name="script">
                                    <button type="submit" name="delete" class = "btn btn-danger">Delete</button>
                                </form></td>
                                </tr>
                  <?php  }
                                ?>
                                                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
</div> <!-- end row -->

<?php include 'includes/footer.php'; ?> 