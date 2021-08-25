<?php
include("includes/header-en.php");

?>

<div id="content" class="main-content">
            <div class="layout-px-spacing">

<form enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <h2 class="text-center mt-5 mb-5">Adding Category</h2>
                    <div class="row">
                    
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="arabic_category" placeholder="Arabic Category" type="text" class="form-control" required />
                    
                    </div>
                        
                    </div>
                        
                    <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="english_category" placeholder="English Category" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="image" placeholder="product image" type="file" class="form-control" required />
                    
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