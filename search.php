<?php
include "include/header.php";

if(ISSET($_GET['search'])){
	$keyword = $_GET['keyword'];


	$query = mysqli_query($conn, "SELECT * FROM `products` WHERE `arabic_name` LIKE '%$keyword%' ORDER BY `arabic_name`") or die(mysqli_error());

?>

<div class="page-content">
	<div class="holder breadcrumbs-wrap mt-0">
        <!----home and category------>
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="index.php">Home</a></li>
			<li><span>Search</span></li>
		</ul>
	</div>
</div>
    <!-----category top images------>
	<div class="holder">
	<div class="container">
		<div class="page-title text-center">
			<h1><?= $keyword ?></h1>
		</div>
		
 			<div class="col-lg aside">
				<div class="prd-grid-wrap">
<div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid" data-grid-tab-content>
	<!-------product design start-------->
	<?php while($products = mysqli_fetch_array($query)) { ?>
    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
        
	<div class="prd-inside">
		<div class="prd-img-area">
			<a href="product.php?id=<?= $products['id'] ?>" class="prd-img image-hover-scale image-container" style="padding-bottom: 128.48%">
				<img src="images/products/<?= $products['image'] ?>"  alt="Leather Pegged Pants" class="js-prd-img lazyload fade-up">
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
            <!----------add to love---->
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
	
		</div>
		<div class="prd-info">
			<div class="prd-info-wrap">
				<div class="prd-info-top">
					<div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
				</div>
				<div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
				<div class="prd-tag"><a href="#">shopping</a></div>
				<h2 class="prd-title"><a href="product.php?id=<?= $products['id'] ?>"><?= $products['arabic_name'] ?></a></h2>
				<div class="prd-description">
					<?= $products['descraption'] ?>
				</div>
				<div class="prd-action">
					<form action="#">
						<button class="btn js-prd-addtocart" data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
						<button class="btn js-prd-addtocart" data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
					</form>
				</div>
			</div>
			<div class="prd-hovers">
			
				<div class="prd-price">
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
							<button name="add-product" class="btn js-prd-addtocart" data-product='{"name": "Fitness Jumpsuit Khaki/Black", "path":"images/products/product-05.webp", "url":"product.html", "aspect_ratio":0.778}'>تسوق معنا الان</button>
							<?php } 
							else
							{?>
								<button name="add-product" class="btn js-prd-addtocart" data-product='{"name": "Fitness Jumpsuit Khaki/Black", "path":"images/products/product-05.webp", "url":"product.html", "aspect_ratio":0.778}'>تسوق معنا الان</button>
							<?php }
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
	<?php }} ?>
    <!------product design ends here--------->

				</div>
			</div>
		</div>
	</div>
</div>
	
</div>
<?php
include "include/footer.php";
?>