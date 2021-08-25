<?php

ob_start();

session_start();

include "connect.php";

class Category
{
    //

    public static function AddCategoryAr()
        {
            global $conn;

            $arabic_category = mysqli_real_escape_string($conn , $_POST['arabic_category']);
            $english_category = mysqli_real_escape_string($conn , $_POST['english_category']);
            // upload image
			$imgname = mysqli_real_escape_string($conn , $_FILES['image']['name']);
			$imgtype = mysqli_real_escape_string($conn , $_FILES['image']['type']);
			$imgsave = mysqli_real_escape_string($conn , $_FILES['image']['tmp_name']);
						
			$validimg = ['image/jpg' , 'image/jpeg' , 'image/png' , 'image/gif' , 'image/webp'];
			if(in_array($imgtype , $validimg))
			{
				$category_image = rand(1,1000000).$imgname;
				$finalimagetmp ="../images/banners/".$category_image;
				move_uploaded_file($imgsave , $finalimagetmp);

            $sql = "INSERT INTO category (english_name , arabic_name , image) VALUES ('$english_category' , '$arabic_category' , '$category_image' )";
            $result = mysqli_query($conn , $sql);

            if ($result)
            {
                echo '<script type="text/javascript">
				location.replace("../dashboard/category-ar.php");
			  </script>';
            }       

            else {
                $_SESSION['error'] ="category not added";
            }
        }
        }

        //

        public static function AddCategoryEn()
        {
            global $conn;

            $arabic_category = mysqli_real_escape_string($conn , $_POST['arabic_category']);
            $english_category = mysqli_real_escape_string($conn , $_POST['english_category']);
            // upload image
			$imgname = mysqli_real_escape_string($conn , $_FILES['image']['name']);
			$imgtype = mysqli_real_escape_string($conn , $_FILES['image']['type']);
			$imgsave = mysqli_real_escape_string($conn , $_FILES['image']['tmp_name']);
						
			$validimg = ['image/jpg' , 'image/jpeg' , 'image/png' , 'image/gif' , 'image/webp'];
			if(in_array($imgtype , $validimg))
			{
				$category_image = rand(1,1000000).$imgname;
				$finalimagetmp ="../images/banners/".$category_image;
				move_uploaded_file($imgsave , $finalimagetmp);

            $sql = "INSERT INTO category (english_name , arabic_name , image) VALUES ('$english_category' , '$arabic_category' , '$category_image' )";
            $result = mysqli_query($conn , $sql);
           
            
            if ($result)
            {
                echo '<script type="text/javascript">
				location.replace("../dashboard/category-en.php");
			  </script>';
            }       

            else {
                $_SESSION['error'] ="category not added";
            }
        }}

        //

        public static function deleteCategoryAr()
    {
        
        global $conn;
        $script = $_POST['script'];
        $userId = $_POST['delete_id'];

        $request =  mysqli_query($conn , "SELECT FROM category WHERE id = userId");
        if(!empty($request))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
                location.replace("../dashboard/category-ar.php");
            </script>';
            die(); 
        }
        if(!empty($script))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
                location.replace("../dashboard/category-ar.php");
            </script>';
            die();
        }

        $sql = "DELETE FROM category WHERE id= $userId";

        if (mysqli_query($conn, $sql)) {

        $_SESSION['message'] = "course was deleted";
        echo '<script type="text/javascript">
                location.replace("../dashboard/category-ar.php");
            </script>';

        }
            
        
        
    }

    //

    public static function deleteCategoryEn()
    {
        global $conn;
        $script = $_POST['script'];
        $userId = $_POST['delete_id'];

        $request =  mysqli_query($conn , "SELECT FROM category WHERE id = userId");
        if(!empty($request))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
                location.replace("../dashboard/category-en.php");
            </script>';
            die(); 
        }
        if(!empty($script))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
                location.replace("../dashboard/category-en.php");
            </script>';
            die();
        }

        $sql = "DELETE FROM category WHERE id= $userId";

        if (mysqli_query($conn, $sql)) {

        $_SESSION['message'] = "course was deleted";
        echo '<script type="text/javascript">
                location.replace("../dashboard/category-en.php");
            </script>';

        }
            
        
        
    }

    //

    public static function EditCategoryAr()
        {
            global $conn;
            $id = $_GET['id'];

            $arabic_category = mysqli_real_escape_string($conn , $_POST['arabic_category']);
            $english_category = mysqli_real_escape_string($conn , $_POST['english_category']);
// upload image
			$imgname = mysqli_real_escape_string($conn , $_FILES['image']['name']);
			$imgtype = mysqli_real_escape_string($conn , $_FILES['image']['type']);
			$imgsave = mysqli_real_escape_string($conn , $_FILES['image']['tmp_name']);
			
			if(!empty($imgname))
            {
						
    			$validimg = ['image/jpg' , 'image/jpeg' , 'image/png' , 'image/gif' , 'image/webp'];
    			if(in_array($imgtype , $validimg))
    			{
    				$category_image = rand(1,1000000).$imgname;
    				$finalimagetmp ="../images/banners/".$category_image;
    				move_uploaded_file($imgsave , $finalimagetmp);
    			}
            }
            else
            {
                $category_image = $_POST['old-image'];
            }
				
            $sql = "UPDATE category SET english_name = '$english_category' , arabic_name = '$arabic_category' , image = '$category_image' WHERE id = '$id'";
            $result = mysqli_query($conn , $sql);
            
            if ($result)
            {
                echo '<script type="text/javascript">
				location.replace("../dashboard/category-ar.php");
			  </script>';
            }       

            else {
                $_SESSION['error'] ="category not updated";
            }}

        //

        public static function EditCategoryEn()
        {
            global $conn;
            $id = $_GET['id'];

            $arabic_category = mysqli_real_escape_string($conn , $_POST['arabic_category']);
            $english_category = mysqli_real_escape_string($conn , $_POST['english_category']);
// upload image
			$imgname = mysqli_real_escape_string($conn , $_FILES['image']['name']);
			$imgtype = mysqli_real_escape_string($conn , $_FILES['image']['type']);
			$imgsave = mysqli_real_escape_string($conn , $_FILES['image']['tmp_name']);
			
			if(!empty($imgname))
            {
						
    			$validimg = ['image/jpg' , 'image/jpeg' , 'image/png' , 'image/gif' , 'image/webp'];
    			if(in_array($imgtype , $validimg))
    			{
    				$category_image = rand(1,1000000).$imgname;
    				$finalimagetmp ="../images/banners/".$category_image;
    				move_uploaded_file($imgsave , $finalimagetmp);
    			}
            }
            else
            {
                $category_image = $_POST['old-image'];
            }
				
            $sql = "UPDATE category SET english_name = '$english_category' , arabic_name = '$arabic_category' , image = '$category_image' WHERE id = '$id'";
            $result = mysqli_query($conn , $sql);
            
            if ($result)
            {
                echo '<script type="text/javascript">
				location.replace("../dashboard/category-en.php");
			  </script>';
            }       

            else {
                $_SESSION['error'] ="category not updated";
            }}
}

//

if (isset($_POST['add-ar'])) {
	Category::AddCategoryAr();
}

//

if (isset($_POST['add-en'])) {
	Category::AddCategoryEn();
}

//

if (isset($_POST['delete-ar'])) {
    Category::deleteCategoryAr();
}

//

if (isset($_POST['delete-en'])) {
    Category::deleteCategoryEn();
}

//

if (isset($_POST['edit-ar'])) {
	Category::EditCategoryAr();
}

//

if (isset($_POST['edit-en'])) {
	Category::EditCategoryEn();
}