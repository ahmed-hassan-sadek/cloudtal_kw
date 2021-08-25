<?php include 'includes/header-en.php'; ?> 

<?php
                              
     if(isset($_POST['register']))
     {
         $contact1 = $_POST['face'];
         $contact2 = $_POST['insta'];
         $contact3 = $_POST['twitter'];

         $qu = "UPDATE site SET facebook = '$contact1' , instagram = '$contact2' , twitter = '$contact3' where id = 3";

         $res = mysqli_query($conn , $qu);

         if($res == true)
         {
             echo '<script>alert("Edit success");
             if ( window.history.replaceState )
             {
                window.history.replaceState( null, null, window.location.href );
             }
             </script>';
         }
         else
         {
             echo '<script>alert("Error happened! Please try again");
             if ( window.history.replaceState )
             {
                window.history.replaceState( null, null, window.location.href );
             }
             </script>';
         }   

     }
        
        ?>
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <h2 class="mt-5 mb-5">edit - Social media links - page</h2>

                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                
                    <div class="row layout-top-spacing">

                        <div class="col-lg-12">
                        
                            <div class="form-group">
                            
                                <input name="face" type="text" value="<?php 
                                                             $qshow = 'SELECT facebook FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['facebook'].'';
                      }
                                                             ?>" required class="form-control">

                            </div>
                        
                        </div>
                                                
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="insta" type="text" value="<?php 
                                                             $qshow = 'SELECT instagram FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['instagram'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="twitter" type="text" value="<?php 
                                                             $qshow = 'SELECT twitter FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['twitter'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12 text-center mt-5">
                        
                            <button name="register" class="btn btn-primary px-5">Edit</button>
                        
                        </div>
                    
                    </div>
                
                </form>
                                
            </div>
        </div>
        <!--  END CONTENT AREA  -->

<?php include 'includes/footer.php'; ?> 