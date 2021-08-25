<?php
include "include/header-en.php";

$qshow = 'SELECT * FROM site';
$result = mysqli_query($conn , $qshow);
while($product = mysqli_fetch_array($result))
{
  $slider1 = $product['homeimg1'];
  $slider2 = $product['homeimg2'];
  $slider3 = $product['homeimg3'];
  $slider4 = $product['homeimg4'];
}

$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 20";
$product = mysqli_query($conn , $sql);

$sql = "SELECT * FROM category";
$categiry_name = mysqli_query($conn , $sql);




$sql = "SELECT products.id AS id , products.english_name AS english_name , products.arabic_name AS arabic_name , products.image AS image , products.description AS 	description , products.price_before AS price_before , products.price_after AS price_after , category.english_name AS english_category  , category.arabic_name AS arabic_category , category.image AS cat_image FROM products INNER JOIN category ON products.cat_en_id = category.id AND products.cat_ar_id = category.id WHERE category.id = products.cat_ar_id " ;

$category = mysqli_query($conn , $sql);


$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 10";
$last_product = mysqli_query($conn , $sql);

?>
<div class="page-content">
    
    <!--slider-->
    <!--start first slider2-->
    <div class="holder fullwidth full-nopad mt-0">
        <div class="container">
            <div class="bnslider-wrapper">
                <div class="bnslider bnslider--lg keep-scale" id="bnslider-003" data-slick='{"arrows": true, "dots": true}' data-autoplay="false" data-speed="5000"
                     data-start-width='1920' data-start-height='800' data-start-mwidth='375' data-start-mheight='365'>
                    <!--img1-->
                    <div class="bnslider-slide">
                        <div class="bnslider-image-mobile lazyload fade-up-fast" data-bgset="<?php echo $slider2; ?>"></div>
                        <div class="bnslider-image lazyload fade-up-fast" data-bgset="<?php echo $slider1; ?>"></div>
                    </div>
                    <!--img2-->
                    <div class="bnslider-slide">
                        <div class="bnslider-image-mobile lazyload fade-up-fast" data-bgset="<?php echo $slider4; ?>"></div>
                        <div class="bnslider-image lazyload fade-up" data-bgset="<?php echo $slider3; ?>"></div>
                    </div>
                </div>
                <div class="bnslider-arrows container-fluid">
                    <div></div>
                </div>
                <div class="bnslider-dots container-fluid"></div>
            </div>
        </div>
    </div>
    <!--end of first slider2-->
    <!--------------new arrival------------>
	<div class="holder holder-with-bg holder-pb-small bgcolor">
	<div class="container">
		<div class="row">
			<div class="col-sm-11 col-md-13 right-carousel">
				<div class="title-wrap text-center d-none d-sm-block">
					<h2 class="h1-style">New Arrivals</h2>
				</div>
				<div class="prd-grid prd-carousel js-prd-carousel-dots data-to-show-4 data-to-show-md-2 data-to-show-sm-2 data-to-show-xs-2 js-product-grid-sm">
				<?php while($last_products = mysqli_fetch_array($last_product)) { ?>
<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
	<div class="prd-inside">
		<div class="prd-img-area">
			<a href="product-en.php?id=<?= $last_products['id'] ?>" class="prd-img image-hover-scale image-container">
				<img data-src="images/products/<?= $last_products['image'] ?>" alt="Fitness Jumpsuit Khaki/Black" class="js-prd-img lazyload fade-up">
				<div class="shoppingkw-loader"></div>
				<div class="prd-big-circle-labels">
					<?php
				    if($last_products['price_after'] != $last_products['price_before'])
                        {
                            $sale =  100-($last_products['price_after']/$last_products['price_before'])*100;
                        
					echo '<div class="label-sale"><span>' . intval($sale) . '% <span class="sale-text">Sale</span></span></div> ';
					}
                        
                        ?>
				</div>
			</a>
			<div class="prd-circle-labels">
				<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
					<?php if (isset($_SESSION['isLoginkw'])) { 
						$user_id = $_SESSION['id'];
						?>
						
					<input type="hidden" name="product_id" value="<?= $last_products['id'] ?>">
					<input type="hidden" name="user_id" value="<?= $user_id ?>">
					<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button>
					<?php } 
						else {?>
							<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button> 
						<?php }
						?>
				</form>
			</div>
		</div>
		<div class="prd-info prd-info--pad">
			<div class="prd-info-wrap">
				<div class="prd-info-top">
					<div class="prd-tag"><a href="#">shoppingkw</a></div>
				</div>
				<div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
				<div class="prd-tag"><a href="#">shoppingkw</a></div>
				<h2 class="prd-title"><a href="product-en.php?id=<?= $last_products['id'] ?>"><?= $last_products['english_name'] ?></a></h2>
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
						
					<input type="hidden" name="product_id" value="<?= $last_products['id'] ?>">
					<input type="hidden" name="user_id" value="<?= $userid ?>">
					<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button>
					<?php } 
						else {
							echo '<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button> ' ;
						}
						?>
				</form>
			</div>
				<div class="prd-price">
					<div class="price-old">$ <?= $last_products['price_before'] ?></div>
					<div class="price-new">$ <?= $last_products['price_after'] ?></div>
				</div>
				<div class="prd-action">
					<div class="prd-action-left">
						<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
						<?php if (isset($_SESSION['isLoginkw'])) { 
						$user_id = $_SESSION['id'];
						?>
							<input type="hidden" name="product_id" value="<?= $last_products['id'] ?>">
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
			<div class="col-sm-7 col-md-5 right-carousel-image">
				<img data-src="images/banners/banner-index-18.webp" class="lazyload fade-up" alt="Banner">
			</div>
		</div>
	</div>
</div>


 <!-----------------------------------Category------------------------------>

	<?php while($categories = mysqli_fetch_array($categiry_name)) { ?>
<div class="holder holder-with-bg holder-pb-small bgcolor">
	<div class="container">
		<div class="row">
			<div class="col-sm-11 col-md-13 right-carousel">
				<div class="title-wrap text-center d-none d-sm-block">
				<h2 class="prd-title"><a href="category-en.php?id=<?= $categories['id'] ?>"><?= $categories['english_name'] ?></a></h2>
					<?php $cat_id = $categories['id'];
					?>
				</div>
				<?php
	
	$sql = "SELECT * FROM products WHERE cat_ar_id = '$cat_id' ORDER BY id DESC LIMIT 10" ;

	$product_cat = mysqli_query($conn , $sql);

	?>
	
				<div class="prd-grid prd-carousel js-prd-carousel-dots data-to-show-4 data-to-show-md-2 data-to-show-sm-2 data-to-show-xs-2 js-product-grid-sm">
	
	    <?php while($products_category = mysqli_fetch_array($product_cat)) { ?>

<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
	<div class="prd-inside">
		<div class="prd-img-area">
			<a href="product-en.php?id=<?= $products_category['id'] ?>" class="prd-img image-hover-scale image-container">
				<img data-src="images/products/<?= $products_category['image'] ?>" alt="Fitness Jumpsuit Khaki/Black" class="js-prd-img lazyload fade-up">
				<div class="shoppingkw-loader"></div>
				<div class="prd-big-circle-labels">
					<?php
				    if($products_category['price_after'] != $products_category['price_before'])
                        {
                            $sale =  100-($products_category['price_after']/$products_category['price_before'])*100;
                        
					echo '<div class="label-sale"><span>' . intval($sale) . '% <span class="sale-text">Sale</span></span></div> ';
					}
                        
                        ?>
				</div>
			</a>
		<div class="prd-circle-labels">
				<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
					<?php if (isset($_SESSION['isLoginkw'])) { 
						$user_id = $_SESSION['id'];
						?>
						
					<input type="hidden" name="product_id" value="<?= $products_category['id'] ?>">
					<input type="hidden" name="user_id" value="<?= $userid ?>">
					<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button>
					<?php } 
						else {?>
							<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button> 
						<?php }
						?>
				</form>
			</div>
		</div>
		<div class="prd-info prd-info--pad">
			<div class="prd-info-wrap">
				<div class="prd-info-top">
					<div class="prd-tag"><a href="#">shoppingkw</a></div>
				</div>
				<div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
				<div class="prd-tag"><a href="#">shoppingkw</a></div>
				<h2 class="prd-title"><a href="product-en.php?id=<?= $products_category['id'] ?>"><?= $products_category['english_name'] ?></a></h2>
				<div class="prd-description">
					<?= $products_category['description'] ?>
				</div>
			</div>
			<div class="prd-hovers">
				<div class="prd-circle-labels">
				<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
					<?php if (isset($_SESSION['isLoginkw'])) { 
						$user_id = $_SESSION['id'];
						?>
						
					<input type="hidden" name="product_id" value="<?= $products_category['id'] ?>">
					<input type="hidden" name="user_id" value="<?= $userid ?>">
					<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button>
					<?php } 
						else {
							echo '<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button> ' ;
						}
						?>
				</form>
			</div>
				<div class="prd-price">
					<div class="price-old">$ <?= $products_category['price_before'] ?></div>
					<div class="price-new">$ <?= $products_category['price_after'] ?></div>
				</div>
				<div class="prd-action">
					<div class="prd-action-left">
						<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
						<?php if (isset($_SESSION['isLoginkw'])) { 
						$user_id = $_SESSION['id'];
						?>
							<input type="hidden" name="product_id" value="<?= $products_category['id'] ?>">
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
			
			<div class="col-sm-7 col-md-5 right-carousel-image">
				<img src="" data-src="images/banners/<?= $categories['image'] ?>" class="lazyload fade-up" alt="Banner" width="500px" height="650px";>
			</div>
		</div>
	</div>
</div>
<?php } ?>
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
				<img data-src="images/products/<?= $products['image'] ?>" alt="Legging Red/Black" class="js-prd-img lazyload">
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
				<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
					<?php if (isset($_SESSION['isLoginkw'])) { 
						$user_id = $_SESSION['id'];
						?>
						
					<input type="hidden" name="product_id" value="<?= $products['id'] ?>">
					<input type="hidden" name="user_id" value="<?= $userid ?>">
					<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button>
					<?php } 
						else {
							echo '<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button> ' ;
						}
						?>
				</form>
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
					<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button>
					<?php } 
						else {
							echo '<button name="add"><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"></a></button> ' ;
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
        
        <div class="text-center mt-5">
        
<a href="all-products-en.php">  <button class="btn px-5">All Products</button></a>
        
        </div>
        
	</div>
</div>
    
    <!-------------------------customer services--------------------------->  
    
	<div class="holder">
	<div class="container">
		<div class="text-icn-blocks-bg-row">
			<div class="text-icn-block-bg">
				<div class="icn">
					<i class="icon-delivery-truck"></i>
				</div>
				<div class="text">
					<h4>Fast Shipping</h4>
					<p>We will help you send your wishes to your loved ones. We drive to save time.</p>
				</div>
			</div>
			<div class="text-icn-block-bg">
				<div class="icn">
					<i class="icon-return"></i>
				</div>
				<div class="text">
					<h4>Easy Return</h4>
					<p>Items must be returned within 30 Days from date of delivery in its original condition</p>
				</div>
			</div>
			<div class="text-icn-block-bg">
				<div class="icn">
					<i class="icon-call-center"></i>
				</div>
				<div class="text">
					<h4>24/7 Customer Support </h4>
					<p>Customer support is not a service, it’s an attitude. Making every conversation count.</p>
				</div>
			</div>
			<div class="text-icn-block-bg">
				<div class="icn">
					<i class="icon-tag"></i>
				</div>
				<div class="text">
					<h4>Best price</h4>
					<p>A price match guarantee for best prices on all our products</p>
				</div>
			</div>
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
				location.replace("index-en.php");
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
				location.replace("index-en.php");
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

