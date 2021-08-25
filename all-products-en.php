<?php
include"include/header-en.php";

$sql = "SELECT * FROM products";
$product = mysqli_query($conn , $sql);

?>
<!-----------------------------all products--------------------------->
    
<div class="holder">
	<div class="container">
		<div class="title-wrap text-center"><h2 class="h1-style">All Products</h2>
			<div class="h-sub maxW-825">Hurry up! Limited</div>
		</div>
		<div class="prd-grid-wrap position-relative">
			<div class="prd-grid data-to-show-5 data-to-show-lg-4 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2 js-category-grid" data-grid-tab-content>
			<?php while($products = mysqli_fetch_array($product)) { ?>
<div class="prd ">
	<div class="prd-inside">
		<div class="prd-img-area">
			<a href="product-en.php?id=<?= $products['id'] ?>" class="prd-img image-hover-scale image-container">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/products/<?= $products['image'] ?>" alt="Legging Red/Black" class="js-prd-img lazyload">
				<div class="shoppingkw-loader"></div>
				<div class="prd-big-circle-labels">
					<?php
				    if($products['price_after'] != $products['price_before'])
                        {
                            $sale =  100-($products['price_after']/$products['price_before'])*100;
                        
					echo '<div class="label-sale"><span>' . intval($sale) . '% <span class="sale-text">Sale</span></span></div> ';
					}
                        
                        ?>
				</div>
			</a>
			<div class="prd-circle-labels">
				<a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
				<div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
					<i class="icon-palette"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
				
				</div>
			</div>
			
		</div>
		<div class="prd-info">
			<div class="prd-info-wrap">
				<div class="prd-info-top">
					<div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
					<div class="prd-tag"><a href="#">shoppingkw</a></div>
				</div>
				<h2 class="prd-title"><a href="product.html"><?= $products['english_name'] ?></a></h2>
				<div class="prd-description">
					Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
				</div>
			</div>
			<div class="prd-hovers">
			<div class="prd-circle-labels">
				<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
					<?php if (isset($_SESSION['isLoginkw'])) { 
						$user_id = $_SESSION['id'];
						?>
						
					<input type="hidden" name="product_id" value="<?= $products['id'] ?>">
					<input type="hidden" name="user_id" value="<?= $userid ?>">
					<button name="add"><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></button>
					<?php } 
						else {
							echo '<button name="add"><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></button> ' ;
						}
						?>
				</form>
</div>
				<div class="prd-price">
					<div class="price-old">$ <?= $products['price_before'] ?></div>
					<div class="price-new">$ <?= $products['price_after'] ?></div>
				</div>
				<div class="prd-action">
					<div class="prd-action-left">
						<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
						<?php if (isset($_SESSION['isLoginkw'])) { 
						$user_id = $_SESSION['id'];
						?>
							<input type="hidden" name="product_id" value="<?= $products['id'] ?>">
							<input type="hidden" name="user_id" value="<?= $user_id ?>">
							<button name="add-product" class="btn js-prd-addtocart" data-product='{"name": "Fitness Jumpsuit Khaki/Black", "path":"images/products/product-05.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
							<?php } 
							else
							{?>
								<button name="add-product" class="btn js-prd-addtocart" data-product='{"name": "Fitness Jumpsuit Khaki/Black", "path":"images/products/product-05.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
							<?php }
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			<?php } ?>
			</div>
		</div>
        
	</div>
</div>


<?php
include "include/footer-en.php";
?>


<?php

class Users
{
  public static function UsersWishes()
  {
    global $conn;

    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];


    $check_wishes = "SELECT * FROM users_wishes WHERE user_id  = '$user_id' AND product_id = '$product_id'";
    $result = mysqli_query($conn , $check_wishes);
    if(mysqli_num_rows($result) > 0)
		{
			$_SESSION['has_product']= "product is already useed";
		}

    else {
			$sql = "INSERT INTO users_wishes (user_id , product_id) VALUES ('$user_id' , '$product_id') ";
			$result = mysqli_query($conn , $sql);

			if ($result) {
				echo  '<script type="text/javascript">
				location.replace("all-products-en.php");
			  </script>';
			}
			else {
				echo  '<script type="text/javascript">
				location.replace("account-login-en.php");
			  </script>';
			}
		}


  }


  public static function UserProducts()
  {
	global $conn;

    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];


    $check_product = "SELECT * FROM users_products WHERE user_id  = '$user_id' AND product_id = '$product_id'";
    $result = mysqli_query($conn , $check_product);
    if(mysqli_num_rows($result) > 0)
		{
			$_SESSION['has_product']= "product is already useed";
		}

    else {
			$sql = "INSERT INTO users_products (user_id , product_id) VALUES ('$user_id' , '$product_id') ";
			$result = mysqli_query($conn , $sql);

			if ($result) {
				echo  '<script type="text/javascript">
				location.replace("all-products-en.php");
			  </script>';
			}
			else {
				echo  '<script type="text/javascript">
				location.replace("account-login-en.php");
			  </script>';
			}
		}
  }
}

if (isset($_POST['add'])) {
	Users::UsersWishes();
}
if (isset($_POST['add-product'])) {
	Users::UserProducts();
}
?>
