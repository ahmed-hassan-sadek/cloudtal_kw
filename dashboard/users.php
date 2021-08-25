<?php include 'includes/header-en.php'; ?> 

        
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Users Datatable</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>

                            <tbody>
                                
                                <?php
                    
                    $qshow = "select * from users ORDER BY id DESC";
                    $res = mysqli_query($conn , $qshow);
                    
                    while($users = mysqli_fetch_array($res))
                    {?>
                        <tr>
                                    <td><?= $users['name'] ?></td>
                                    <td><?= $users['number'] ?></td>
                                    <td><?= $users['age'] ?></td>
                                    <td><?= $users['address'] ?></td>
                                    <td><?= $users['email'] ?></td>
                                    <td><a href="users-edit.php?id=<?= $users['id'] ?>">Edit</a></td>
                                    <td><form action="../backend/Users.php" method = "POST" enctype = "multipart/form-data">
                                    <input type="hidden" name="delete_id" value = "<?= $users['id'];?>">
                                    <input type="hidden" name="script">
                                    <button type="submit" name="delete-user" class = "btn btn-danger">Delete</button>
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