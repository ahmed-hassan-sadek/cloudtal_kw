<?php

ob_start();

session_start();

include "connect.php";

class Products
{

    //

    public static function AddProductAr()
        {
            global $conn;

            $english_name = mysqli_real_escape_string($conn , $_POST['english_name']);
            $arabic_name = mysqli_real_escape_string($conn , $_POST['arabic_name']);
            $cat_ar_id = mysqli_real_escape_string($conn , $_POST['cat_ar_id']);
            $cat_en_id = mysqli_real_escape_string($conn , $_POST['cat_en_id']);
			$price_before = mysqli_real_escape_string($conn , $_POST['price_before']);
			$price_after = mysqli_real_escape_string($conn , $_POST['price_after']);
			$description = mysqli_real_escape_string($conn , $_POST['description']);
// upload image
			$imgname = mysqli_real_escape_string($conn , $_FILES['image']['name']);
			$imgtype = mysqli_real_escape_string($conn , $_FILES['image']['type']);
			$imgsave = mysqli_real_escape_string($conn , $_FILES['image']['tmp_name']);
						
			$validimg = ['image/jpg' , 'image/jpeg' , 'image/png' , 'image/gif' , 'image/webp'];
			if(in_array($imgtype , $validimg))
			{
				$product_image = rand(1,1000000).$imgname;
				$finalimagetmp ="../images/products/".$product_image;
				move_uploaded_file($imgsave , $finalimagetmp);
	
				$sql = "INSERT INTO products (english_name , arabic_name , 	description , price_before , price_after , image , cat_en_id , cat_ar_id ) VALUES ('$english_name' , '$arabic_name' , '$description' , '$price_before' , '$price_after' , '$product_image' , '$cat_en_id' , '$cat_ar_id' ) ";
				$result = mysqli_query($conn , $sql);
	
				if ($result) {
					echo  '<script type="text/javascript">
					location.replace("../dashboard/products-ar.php");
				  </script>';
				}
				else {
					$_SESSION['error'] = "An error occurred, Add again";
				}
	
			}
		
	
        }

    //

    public static function AddProductEn()
        {
            global $conn;

            $english_name = mysqli_real_escape_string($conn , $_POST['english_name']);
            $arabic_name = mysqli_real_escape_string($conn , $_POST['arabic_name']);
            $cat_ar_id = mysqli_real_escape_string($conn , $_POST['cat_ar_id']);
            $cat_en_id = mysqli_real_escape_string($conn , $_POST['cat_en_id']);
			$price_before = mysqli_real_escape_string($conn , $_POST['price_before']);
			$price_after = mysqli_real_escape_string($conn , $_POST['price_after']);
			$description = mysqli_real_escape_string($conn , $_POST['description']);
// upload image
			$imgname = mysqli_real_escape_string($conn , $_FILES['image']['name']);
			$imgtype = mysqli_real_escape_string($conn , $_FILES['image']['type']);
			$imgsave = mysqli_real_escape_string($conn , $_FILES['image']['tmp_name']);
						
			$validimg = ['image/jpg' , 'image/jpeg' , 'image/png' , 'image/gif' , 'image/webp'];
			if(in_array($imgtype , $validimg))
			{
				$product_image = rand(1,1000000).$imgname;
				$finalimagetmp ="../images/products/".$product_image;
				move_uploaded_file($imgsave , $finalimagetmp);
	
				$sql = "INSERT INTO products (english_name , arabic_name , 	description , price_before , price_after , image , cat_en_id , cat_ar_id ) VALUES ('$english_name' , '$arabic_name' , '$description' , '$price_before' , '$price_after' , '$product_image' , '$cat_en_id' , '$cat_ar_id' ) ";
				$result = mysqli_query($conn , $sql);
	
				if ($result) {
					echo  '<script type="text/javascript">
					location.replace("../dashboard/products-en.php");
				  </script>';
				}
				else {
					$_SESSION['error'] = "An error occurred, Add again";
				}
	
			}
		
	
        }

        //

        public static function EditProductAr($id)
    {
        
        
        global $conn;
        $english_name = mysqli_real_escape_string($conn , $_POST['english_name']);
        $arabic_name = mysqli_real_escape_string($conn , $_POST['arabic_name']);
        $cat_ar_id = mysqli_real_escape_string($conn , $_POST['cat_ar_id']);
        $cat_en_id = mysqli_real_escape_string($conn , $_POST['cat_en_id']);
        $price_before = mysqli_real_escape_string($conn , $_POST['price_before']);
        $price_after = mysqli_real_escape_string($conn , $_POST['price_after']);
        $description = mysqli_real_escape_string($conn , $_POST['description']);

// upload image
        
        
            $imgname = mysqli_real_escape_string($conn ,$_FILES['image']['name']);
            $imgtype = mysqli_real_escape_string($conn ,$_FILES['image']['type']);
            $imgsave = mysqli_real_escape_string($conn ,$_FILES['image']['tmp_name']);

            if(!empty($imgname))
            {
                        
                $validimg = ['image/jpg' , 'image/jpeg' , 'image/png' , 'image/gif' , 'image/webp'];
                if(in_array($imgtype , $validimg))
                {
                $product_image = rand(1,1000000).$imgname;
                $finalimagetmp ="../images/products/".$product_image;
                move_uploaded_file($imgsave , $finalimagetmp);
                }
            }
        else
        {
            $product_image = $_POST['old-image'];
        }
            $sql = "UPDATE products SET english_name = '$english_name' , arabic_name = '$arabic_name' , description = '$description' , price_before = '$price_before' , price_after = '$price_after' , image = '$product_image' , cat_en_id = '$cat_en_id' , cat_ar_id = '$cat_ar_id'  WHERE id = '$id'";
            $result = mysqli_query($conn , $sql);

            if ($result) {
                echo  '<script type="text/javascript">
                location.replace("../dashboard/products-ar.php");
              </script>';
            }
            else {
                $_SESSION['error'] = "An error occurred, Add again";
            }

        }

        //

        public static function EditProductEn($id)
    {
        global $conn;
        $english_name = mysqli_real_escape_string($conn , $_POST['english_name']);
        $arabic_name = mysqli_real_escape_string($conn , $_POST['arabic_name']);
        $cat_ar_id = mysqli_real_escape_string($conn , $_POST['cat_ar_id']);
        $cat_en_id = mysqli_real_escape_string($conn , $_POST['cat_en_id']);
        $price_before = mysqli_real_escape_string($conn , $_POST['price_before']);
        $price_after = mysqli_real_escape_string($conn , $_POST['price_after']);
        $description = mysqli_real_escape_string($conn , $_POST['description']);

// upload image
        $imgname = mysqli_real_escape_string($conn ,$_FILES['image']['name']);
        $imgtype = mysqli_real_escape_string($conn ,$_FILES['image']['type']);
        $imgsave = mysqli_real_escape_string($conn ,$_FILES['image']['tmp_name']);
                    
        $validimg = ['image/jpg' , 'image/jpeg' , 'image/png' , 'image/gif' , 'image/webp'];
        if(in_array($imgtype , $validimg))
        {
            $product_image = rand(1,1000000).$imgname;
            $finalimagetmp ="../images/products/".$product_image;
            move_uploaded_file($imgsave , $finalimagetmp);

            $sql = "UPDATE products SET english_name = '$english_name' , arabic_name = '$arabic_name' , description = '$description' , price_before = '$price_before' , price_after = '$price_after' , image = '$product_image' , cat_en_id = '$cat_en_id' , cat_ar_id = '$cat_ar_id'  WHERE id = '$id'";
            $result = mysqli_query($conn , $sql);

            if ($result) {
                echo  '<script type="text/javascript">
                location.replace("../dashboard/products-en.php");
              </script>';
            }
            else {
                $_SESSION['error'] = "An error occurred, Add again";
            }

        }
    

        
    }

    //

    public static function deleteProductAr()
    {
        
        global $conn;
        $script = $_POST['script'];
        $userId = $_POST['delete_id'];

        $request =  mysqli_query($conn , "SELECT FROM products WHERE id = userId");
        if(!empty($request))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../dashboard/products-ar.php");
			  </script>';
            die(); 
        }
        if(!empty($script))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../dashboard/products-ar.php");
			  </script>';
            die();
        }

        $sql = "DELETE FROM products WHERE id= $userId";

        if (mysqli_query($conn, $sql)) {

        $_SESSION['message'] = "course was deleted";
        echo '<script type="text/javascript">
				location.replace("../dashboard/products-ar.php");
			  </script>';

        }
            
        
        
    }

    //

    
}

//

if (isset($_POST['add-ar'])) {
	Products::AddProductAr();
}

//

if (isset($_POST['add-en'])) {
	Products::AddProductEn();
}

//

if (isset($_POST['edit-ar'])) {
    Products::EditProductAr($id);
}

//

if (isset($_POST['edit-en'])) {
    Products::EditProductEn($id);
}

//

if (isset($_POST['delete-ar'])) {
    Products::deleteProductAr();
}

//


