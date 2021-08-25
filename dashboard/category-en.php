<?php include 'includes/header-en.php'; ?> 

<?php

$sql = "SELECT * FROM category";
$result = mysqli_query($conn , $sql);


?>

        
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Category Datatable</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>

                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <?php while($category = mysqli_fetch_array($result)){?>
                            <tbody>
                                <td>
                                    <img width="40" src="../images/banners/<?= $category['image'] ?>"
                                        class="rounded mr-3" alt="Vase">
                                </td>
                            <td>
                                <span><?= $category['english_name'] ?> </span>
                            </td>

                            <td>
                                <form action="../backend/category.php" method = "POST" enctype = "multipart/form-data">
                                <input type="hidden" name="delete_id" value = "<?= $category['id'];?>">
                                <input type="hidden" name="script">
                                <button type="submit" name="delete-en" class = "btn btn-danger">Delete</button>
                                </form>
                            </td>
                            
                        
                            <td><a  class="btn btn-success" href="edit-category-en.php?id=<?=$category['id']?>">Update</a></td>
                                       
                            </tbody>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
</div> <!-- end row -->

<?php include 'includes/footer.php'; ?>   