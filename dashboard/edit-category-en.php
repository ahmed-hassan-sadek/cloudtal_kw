<?php
include("includes/header-en.php");

?>

<?php 
$id = $_GET['id'];

$sql = "SELECT * FROM category WHERE id = '$id'";
$result = mysqli_query($conn , $sql);

?>

<div id="content" class="main-content">
            <div class="layout-px-spacing">

<form enctype="multipart/form-data" method="post" action="../backend/category.php">
                    <h2 class="text-center mt-5 mb-5">Edit Category</h2>
                    <div class="row">
                    <?php while($category = mysqli_fetch_array($result)) { ?>
                    
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="arabic_category" value="<?= $category['arabic_name'] ?>" type="text" class="form-control" required />
                    
                    </div>
                        
                    </div>
                        
                    <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="english_category" value="<?= $category['english_name'] ?>" type="text" class="form-control" required />
                    
                    </div>
                        
                        </div>
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="image" placeholder="product image" type="file" class="form-control" value="<?= $category['image'] ?>"/>
                        <input type="hidden" name="old-image" value="<?= $category['image'] ?>">
                    
                    </div>
                        
                        </div>
                        <?php } ?>

 
                        <div class="col-lg-12 text-center">
                        
                            <button name="edit-ar" class="btn btn-primary px-5 mt-5">Edit</button>
                        
                        </div>

                    </div>

                </form>
                
    </div>
</div>
 


<?php include('includes/footer.php'); ?>

   
<?php    
class Edit
{
	public static function EditCategory()
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
				location.replace("category-en.php");
			  </script>';
            }       

            else {
                $_SESSION['error'] ="category not updated";
            }}
        
}


if (isset($_POST['edit'])) {
	Edit::EditCategory();
}

?>