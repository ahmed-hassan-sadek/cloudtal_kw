<?php
include("includes/header-ar.php");

?>

<?php 

$id = $_GET['id'];
$sql = "SELECT products.id AS id , products.english_name AS english_name , products.arabic_name AS arabic_name , products.image AS image , products.price_before AS price_before , products.price_after AS price_after , products.description AS description , category.english_name AS english_category , category.arabic_name AS arabic_category , category.id AS cat_id FROM products INNER JOIN category ON products.cat_en_id = category.id AND products.cat_ar_id = category.id WHERE products.id ='$id'";

$result = mysqli_query($conn , $sql);


$english_category = "SELECT id , english_name FROM category";
$result_en = mysqli_query($conn , $english_category);


$arabic_category = "SELECT id , arabic_name FROM category";
$result_ar = mysqli_query($conn , $arabic_category);


?>

<div id="content" class="main-content">
            <div class="layout-px-spacing">

<form enctype="multipart/form-data" method="post" action="../backend/products.php">
                    <h2 class="text-center mt-5 mb-5">Edit Product</h2>
                    <?php while($products = mysqli_fetch_array($result)){?>
                    <div class="row">
                    
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="english_name" value="<?= $products['english_name'] ?>" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="arabic_name" value="<?= $products['arabic_name'] ?>" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                        <div class="form-group">
                        
                            <select name="cat_en_id" class="form-control">
                            <option value="<?=$products['cat_id']?>"><?=$products['english_category']?></option>
                                <?php while($category = mysqli_fetch_array($result_en))
                                {
                                    if($category['english_name'] != $products['english_category']){
                                    ?>
                                    <option value="<?=$category['id']?>"><?=$category['english_name']?></option>
                                <?php }}
                                                ?>
                                                
                                            </select>
                                        
                                        </div>
                            
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                        
                        <select name="cat_ar_id" class="form-control">
                        <option value="<?=$products['cat_id']?>"><?=$products['arabic_category']?></option>
                            <?php while($category = mysqli_fetch_array($result_ar))
                            {
                                if($category['arabic_name'] != $products['arabic_category']){
                                ?>
                                <option value="<?=$category['id']?>"><?=$category['arabic_name']?></option>
                            <?php }}
                                            ?>
                                            
                                        </select>
                                    
                                    </div>
                        
                    </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="description" value="<?= $products['description'] ?>" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="image" value="<?= $products['image'] ?>" type="file" class="form-control"/>
                        <input type="hidden" name="old-image" value="<?= $products['image'] ?>">
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="price_before" value="<?= $products['price_before'] ?>" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="price_after" value="<?= $products['price_after'] ?>" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        <?php } ?>
 
                        <div class="col-lg-12 text-center">
                        
                            <button name="edit-ar" class="btn btn-primary px-5 mt-5">تحديث</button>
                        
                        </div>

                    </div>

                </form>
                
    </div>
</div>
<?php include('includes/footer.php'); ?>