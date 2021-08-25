<?php include 'includes/header-en.php'; ?> 

<?php
                              
     if(isset($_POST['register']))
     {
         $contact1 = $_POST['contact1'];
         $contact2 = $_POST['contact2'];
         $contact3 = $_POST['contact3'];
         $contact4 = $_POST['contact4'];

         $qu = "UPDATE site SET contact1 = '$contact1' , contact2 = '$contact2' , contact3 = '$contact3' , contact4 = '$contact4' where id = 3";

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
                
                <h2 class="mt-5 mb-5">edit - Contact Us - page</h2>

                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                
                    <div class="row layout-top-spacing">

                        <div class="col-lg-12">
                        
                            <div class="form-group">
                            
                                <input name="contact1" type="text" value="<?php 
                                                             $qshow = 'SELECT contact1 FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['contact1'].'';
                      }
                                                             ?>" required class="form-control">

                            </div>
                        
                        </div>
                                                
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="contact2" type="text" value="<?php 
                                                             $qshow = 'SELECT contact2 FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['contact2'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="contact3" type="text" value="<?php 
                                                             $qshow = 'SELECT contact3 FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['contact3'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="contact4" type="text" value="<?php 
                                                             $qshow = 'SELECT contact4 FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['contact4'].'';
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