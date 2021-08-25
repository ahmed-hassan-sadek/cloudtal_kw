<?php
include("includes/header-en.php");

?>

<div id="content" class="main-content">
            <div class="layout-px-spacing">

<form enctype="multipart/form-data" method="post" action="../backend/sales.php">
                    <h2 class="text-center mt-5 mb-5">Adding Sale</h2>
                    <div class="row">
                    
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="name" placeholder="name" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="phone" placeholder="number" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="email" placeholder="email" type="email" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="country" placeholder="country" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="city" placeholder="city" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="address" placeholder="address" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                                
                                <select name="paying" placeholder="paying" class="form-control">
                                  <option>الدفع كاش</option>
                                  <option>الدفع كاش خارجي</option>
                                  <option>الدفع كي نت اونلاين</option>
                                  <option>الدفع بواسطة فيزا ماستر</option>
                                  <option>الدفع كي نت يدويا</option>
                                </select>
                                        
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