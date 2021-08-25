<?php
include 'includes/header-en.php';

$qshow = 'SELECT * FROM site';
$result = mysqli_query($conn , $qshow);
while($product = mysqli_fetch_array($result))
{
  $slider1 = $product['homeimg1'];
  $slider2 = $product['homeimg2'];
  $slider3 = $product['homeimg3'];
  $slider4 = $product['homeimg4'];
}
                              
     if(isset($_POST['register']))
     {
         $topline1 = $_POST['topline1'];
         $topline2 = $_POST['topline2'];
         $topline3 = $_POST['topline3'];
         $topline1en = $_POST['topline1en'];
         $topline2en = $_POST['topline2en'];
         $topline3en = $_POST['topline3en'];

         $qu = "UPDATE site SET topline1 = '$topline1' , topline2 = '$topline2' , topline3 = '$topline3' , topline1en = '$topline1en' , topline2en = '$topline2en' , topline3en = '$topline3en' where id = 3";

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

     if(isset($_POST['img1']))
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
                
                $quimg = "UPDATE site SET homeimg1 = '$imgrecieve' where id = 3";
                $resimg = mysqli_query($conn , $quimg);

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

     if(isset($_POST['img2']))
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
                
                $quimg = "UPDATE site SET homeimg2 = '$imgrecieve' where id = 3";
                $resimg = mysqli_query($conn , $quimg);

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
     
     if(isset($_POST['img3']))
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
                
                $quimg = "UPDATE site SET homeimg3 = '$imgrecieve' where id = 3";
                $resimg = mysqli_query($conn , $quimg);

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
     
     if(isset($_POST['img4']))
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
                
                $quimg = "UPDATE site SET homeimg4 = '$imgrecieve' where id = 3";
                $resimg = mysqli_query($conn , $quimg);

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
                
                <h2 class="mt-5 mb-3">edit - Home - page</h2>
                                    
                    <div class="row">
                    
                        <div class="col-lg-6 mt-3">
                            <form enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                                <img src="../<?php echo $slider1 ?>" class="w-25 mb-3" />
                                <div class="form-group">
                                    <label>Slider Image 1</label>
                                    <input name="profile" type="file" required class="form-control">
                                </div>

                                <button name="img1" type="submit" class="btn btn-primary px-5">Edit image</button>

                            </form>
                        </div>
                        
                        <div class="col-lg-6 mt-3">
                            <form enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                                <img src="../<?php echo $slider2 ?>" class="w-25 mb-3" />
                                <div class="form-group">
                                    <label>Slider Image 1 FOR MOBILE</label>
                                    <input name="profile" type="file" required class="form-control">
                                </div>

                                <button name="img2" type="submit" class="btn btn-primary px-5">Edit image</button>

                            </form>
                        </div>
                        
                        <div class="col-lg-6 mt-3">
                            <form enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                                <img src="../<?php echo $slider3 ?>" class="w-25 mb-3" />
                                <div class="form-group">
                                    <label>Slider Image 2</label>
                                    <input name="profile" type="file" required class="form-control">
                                </div>

                                <button name="img3" type="submit" class="btn btn-primary px-5">Edit image</button>

                            </form>
                        </div>
                        
                        <div class="col-lg-6 mt-3">
                            <form enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                                <img src="../<?php echo $slider4 ?>" class="w-25 mb-3" />
                                <div class="form-group">
                                    <label>Slider Image 2 FOR MOBILE</label>
                                    <input name="profile" type="file" required class="form-control">
                                </div>

                                <button name="img4" type="submit" class="btn btn-primary px-5">Edit image</button>

                            </form>
                        </div>
                    
                    </div>
                
                <h2 class="mt-5 mb-5">Offers</h2>

                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                
                    <div class="row layout-top-spacing">

                        <div class="col-lg-12">
                        
                            <div class="form-group">
                            
                                <input name="topline1" type="text" value="<?php 
                                                             $qshow = 'SELECT topline1 FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['topline1'].'';
                      }
                                                             ?>" required class="form-control">

                            </div>
                        
                        </div>
                                                
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="topline2" type="text" value="<?php 
                                                             $qshow = 'SELECT topline2 FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['topline2'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="topline3" type="text" value="<?php 
                                                             $qshow = 'SELECT topline3 FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['topline3'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="topline1en" type="text" value="<?php 
                                                             $qshow = 'SELECT topline1en FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['topline1en'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="topline2en" type="text" value="<?php 
                                                             $qshow = 'SELECT topline2en FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['topline2en'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12">
                        
                            <div class="form-group">
                                
                    <input name="topline3en" type="text" value="<?php 
                                                             $qshow = 'SELECT topline3en FROM site';
                                                             $result = mysqli_query($conn , $qshow);
                      while($product = mysqli_fetch_array($result))
                      {
                          echo ''.$product['topline3en'].'';
                      }
                                                             ?>" required class="form-control">
                    
                         </div>
                        
                </div>
                        
                        <div class="col-lg-12 text-center mt-5">
                        
                            <button name="register" class="btn btn-primary px-5">Edit</button>
                        
                        </div>
                    
                    </div>
                
                </form>
                                
                <div class="mb-5"></div>
                                
            </div>
        </div>
        <!--  END CONTENT AREA  -->

<?php include 'includes/footer.php'; ?> 