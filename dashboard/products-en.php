<?php include 'includes/header-en.php'; ?> 

<?php 

$sql = "SELECT products.id AS id , products.english_name AS english_name , products.arabic_name AS arabic_name , products.image AS image , category.english_name AS english_category , category.arabic_name AS arabic_category FROM products INNER JOIN category ON products.cat_en_id = category.id AND products.cat_ar_id = category.id";

$result = mysqli_query($conn , $sql);

?>

        
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Products Datatable</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>English Name</th>

                                <th>English Category</th>

                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <?php while($products = mysqli_fetch_array($result)){?>
                                <tbody>
                                <td>
                                    <img width="40" src="../images/products/<?= $products['image'] ?>"
                                        class="rounded mr-3" alt="Vase">
                                </td>
                                <td><?=$products['english_name'] ?></td>

                                <td><?=$products['english_category'] ?></td>
                                <td>
                                    <form action="../backend/products.php" method = "POST" enctype = "multipart/form-data">
                                        <input type="hidden" name="delete_id" value = "<?= $products['id'];?>">
                                        <input type="hidden" name="script">
                                        <button type="submit" name="delete-en" class = "btn btn-danger">Delete</button>
                                    </form>
                            </td>
                        
                        <td><a  class="btn btn-success" href="edit-product-en.php?id=<?=$products['id']?>">Update</a></td>
                                </tbody>
                                <?php } ?>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
</div> <!-- end row -->

<?php include 'includes/footer.php'; ?> 