<?php
include("includes/header-en.php");

?>

<div id="content" class="main-content">
            <div class="layout-px-spacing">

<form enctype="multipart/form-data" method="post" action="../backend/admin.php">
                    <h2 class="text-center mt-5 mb-5">Adding Admin</h2>
                    <div class="row">
                    
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="name" placeholder="name" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="phone" placeholder="phone number" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="email" placeholder="email" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="password" placeholder="password" type="password" class="form-control" required />
                    
                    </div>
                        
                        </div>
 
                        <div class="col-lg-12 text-center">
                        
                            <button name="add" class="btn btn-primary px-5 mt-5">Add</button>
                        
                        </div>

                    </div>

                </form>
                
    </div>
</div>
<?php include('includes/footer.php'); ?>