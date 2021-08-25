<?php include 'includes/header-ar.php'; ?> 

<?php 

$sql = "SELECT products.id AS id , products.english_name AS english_name , products.arabic_name AS arabic_name , products.image AS image , category.english_name AS english_category , category.arabic_name AS arabic_category FROM products INNER JOIN category ON products.cat_en_id = category.id AND products.cat_ar_id = category.id";

$result = mysqli_query($conn , $sql);

?>

        
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title">المنتجات</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                   <th>تعديل</th>
                                      <th>حذف</th>
  <th>النوع</th>
   <th>اسم المنتج</th>

                                <th>الصوره</th>

                            </tr>
                            </thead>
                            <?php while($products = mysqli_fetch_array($result)){?>
                                <tbody>
                                        <td><a  class="btn btn-success" href="edit-product-ar.php?id=<?=$products['id']?>">نعديل</a></td>
                                        <td>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST" enctype = "multipart/form-data">
                                        <input type="hidden" name="delete_id" value = "<?= $products['id'];?>">
                                        <input type="hidden" name="script">
                                        <button type="submit" name="delete" class = "btn btn-danger">حذف</button>
                                    </form>
                            </td>
                                      <td><?=$products['arabic_category'] ?></td>
                                      
                                <td><?=$products['arabic_name'] ?></td>
                                <td>
                                    <img width="40" src="../images/products/<?= $products['image'] ?>"
                                        class="rounded mr-3" alt="Vase">
                                </td>
                        
                      
                                </tbody>
                                <?php } ?>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
</div> <!-- end row -->

<?php include 'includes/footer.php'; ?> 

<?php
class Products
{
    
public static function deleteProduct()
{
    
    global $conn;
    $script = $_POST['script'];
    $userId = $_POST['delete_id'];

    $request =  mysqli_query($conn , "SELECT FROM products WHERE id = $userId");
    if(!empty($request))
    {
        
        $_SESSION['error'] = "Not Allowed";
        echo '<script type="text/javascript">
            location.replace("../dashboard/products-ar.php");
          </script>';
        die(); 
    }
    if(!empty($script))
    {
        $_SESSION['error'] = "Not Allowed";
        echo '<script type="text/javascript">
            location.replace("../dashboard/products-ar.php");
          </script>';
        die();
    }

    $sql = "DELETE FROM products WHERE id= $userId";

    if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "course was deleted";
    echo '<script type="text/javascript">
            location.replace("../dashboard/products-ar.php");
          </script>';

    }
        
}
    
}


if (isset($_POST['delete'])) {
    Products::deleteProduct();
}
    ?>