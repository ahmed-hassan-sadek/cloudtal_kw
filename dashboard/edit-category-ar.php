<?php
include("includes/header-ar.php");

?>

<?php 
$id = $_GET['id'];

$sql = "SELECT * FROM category WHERE id = '$id'";
$result = mysqli_query($conn , $sql);

?>

<div id="content" class="main-content">
            <div class="layout-px-spacing">

<form enctype="multipart/form-data" method="post" action="../backend/category.php">
                    <h2 class="text-center mt-5 mb-5">Editting Category</h2>
                    <div class="row">
                    <?php while($category = mysqli_fetch_array($result)) { ?>
                    
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="arabic_category" value="<?= $category['arabic_name'] ?>" type="text" class="form-control" required />
                    
                    </div>
                        
                    </div>
                        
                    <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="english_category" value="<?= $category['english_name'] ?>" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="image" placeholder="product image" type="file" class="form-control" value="<?= $category['image'] ?>"  />
                        <input type="hidden" name="old-image" value="<?= $category['image'] ?>">
                    
                    </div>
                        
                        </div>
                        <?php } ?>

 
                        <div class="col-lg-12 text-center">
                        
                            <button name="edit-ar" class="btn btn-primary px-5 mt-5">Edit</button>
                        
                        </div>

                    </div>

                </form>
                
    </div>
</div>
 


<?php include('includes/footer.php'); ?>