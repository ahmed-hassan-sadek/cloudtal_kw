<?php
include("includes/header-en.php");

?>

<?php 

$english_category = "SELECT id , english_name FROM category";
$result_en = mysqli_query($conn , $english_category);


$arabic_category = "SELECT id , arabic_name FROM category";
$result_ar = mysqli_query($conn , $arabic_category);

?>

<div id="content" class="main-content">
            <div class="layout-px-spacing">

<form enctype="multipart/form-data" method="post" action="../backend/products.php">
                    <h2 class="text-center mt-5 mb-5">Adding new Products</h2>
                    <div class="row">
                    
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="english_name" placeholder="English Product Name" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="arabic_name" placeholder="Arabic Product Name" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                        <div class="form-group">
                        
                            <select name="cat_en_id" class="form-control">
                                
                                <?php while($category = mysqli_fetch_array($result_en))
                                {?>
                                    <option value="<?=$category['id']?>"><?=$category['english_name']?></option>
                                <?php }
                                                ?>
                                                
                                            </select>
                                        
                                        </div>
                            
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                        
                        <select name="cat_ar_id" class="form-control">
                            
                            <?php while($category = mysqli_fetch_array($result_ar))
                            {?>
                                <option value="<?=$category['id']?>"><?=$category['arabic_name']?></option>
                            <?php }
                                            ?>
                                            
                                        </select>
                                    
                                    </div>
                        
                    </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="description" placeholder="description" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="image" placeholder="product image" type="file" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="price_before" placeholder="price before" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="price_after" placeholder="price after" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
 
                        <div class="col-lg-12 text-center">
                        
                            <button name="add-en" class="btn btn-primary px-5 mt-5">Add</button>
                        
                        </div>

                    </div>

                </form>
                
    </div>
</div>
<?php include('includes/footer.php'); ?>