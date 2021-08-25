<?php include 'includes/header-en.php'; ?> 

<?php
                              
     if(isset($_POST['register']))
     {
         $about1 = $_POST['about1'];
         $about2 = $_POST['about2'];
         $about1en = $_POST['about1en'];
         $about2en = $_POST['about2en'];

         $qu = "UPDATE site SET about1 = '$about1' , about2 = '$about2' , about1en = '$about1en' , about2en = '$about2en' where id = 3";

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

     if(isset($_POST['img']))
     {
            $imgname = $_FILES['profile']['name'];
            $imgsize = $_FILES['profile']['size'];
            $imgtype = $_FILES['profile']['type'];
            $imgsave = $_FILES['profile']['tmp_name'];
            $imgerror = $_FILES['profile']['error'];

            $validimg = ['image/jpg' , 'image/jpeg' , 'image/png' , 'image/gif' , 'image/webp'];

            if(in_array($imgtype , $validimg))
            {
                $imgrecieve = "images/upload/site/".rand(1,1000000).$imgname;
                $finalimagetmp = "../".$imgrecieve;
                move_uploaded_file($imgsave , $finalimagetmp);
                
                $quimg = "UPDATE site SET aboutimg = '$imgrecieve' where id = 3";
                $resimg = mysqli_query($con , $quimg);

                 if($resimg == true)
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
     }
        
        ?>
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <h2 class="mt-5 mb-5">edit - About Us - page</h2>

                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                
                    <div class="row layout-top-spacing">

                        <div class="col-lg-12">
                        
                            <div class="form-group">
                            
                                <input name="about1" type="text" value="<?php 
                                                             $qshow = 'SELECT about1 FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['about1'].'';
                      }
                                                             ?>" required class="form-control">

                            </div>
                        
                        </div>
                                                
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="about2" type="text" value="<?php 
                                                             $qshow = 'SELECT about2 FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['about2'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="about1en" type="text" value="<?php 
                                                             $qshow = 'SELECT about1en FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['about1en'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="about2en" type="text" value="<?php 
                                                             $qshow = 'SELECT about2en FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['about2en'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12 text-center mt-5">
                        
                            <button name="register" class="btn btn-primary px-5">Edit</button>
                        
                        </div>
                    
                    </div>
                
                </form>
                
                <div class="mt-5 mb-3">Background Image</div>
                
                <form enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                
                    <div class="form-group">
                            
                        <input name="profile" type="file" required class="form-control">

                    </div>
                    
                    <button name="img" type="submit" class="btn btn-primary px-5">Edit image</button>
                
                </form>
                
                <div class="mb-5"></div>
                                
            </div>
        </div>
        <!--  END CONTENT AREA  -->

<?php include 'includes/footer.php'; ?> 