<?php
include"include/header-en.php";

$id = $_GET['id'];


$sql = "SELECT * FROM category WHERE id = '$id'";
$categiry_name = mysqli_query($conn , $sql);

$sql = "SELECT * FROM category";
$categiry_all = mysqli_query($conn , $sql);


$sql = "SELECT * FROM products WHERE cat_ar_id = '$id'" ;
$category = mysqli_query($conn , $sql);
?>

<div class="page-content">
	<div class="holder breadcrumbs-wrap mt-0">
        <!----home and category------>
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="index.html">Home</a></li>
			<li><span>Category</span></li>
		</ul>
	</div>
</div>
    <!-----category top images------>
	<div class="holder holder-mt-medium">
	<div class="container">
		<div class="row vert-margin-small">
			<div class="col-sm">
				<a href="category.html" class="collection-grid-3-item image-hover-scale">
					<div class="collection-grid-3-item-img image-container" style="padding-bottom: 68.22%">
						<img src="images/fashion.jpg"  class="lazyload fade-up" alt="Banner">
						<div class="foxic-loader"></div>
					</div>
					<div class="collection-grid-3-caption-bg">
						<h3 class="collection-grid-3-title">شوبينج</h3>
						<h4 class="collection-grid-3-subtitle">الإطلالة&nbsp;الافضل&nbsp;على الاطلاق&nbsp</h4>
					</div>
				</a>
			</div>
            
			<div class="col-sm">
				<a href="category.html" class="collection-grid-3-item image-hover-scale">
					<div class="collection-grid-3-item-img image-container" style="padding-bottom: 68.22%">
						<img src="images/fashion.jpg"  class="lazyload fade-up" alt="Banner">
						<div class="foxic-loader"></div>
					</div>
					<div class="collection-grid-3-caption-bg">
						<h3 class="collection-grid-3-title">شوبينج</h3>
						<h4 class="collection-grid-3-subtitle">تميزى &nbsp;بكل &nbsp;مستلزماتك</h4>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
	<div class="holder">
	<div class="container">
	    <?php while($categories = mysqli_fetch_array($categiry_name)) { ?>
		<div class="page-title text-center">
			<h1><?= $categories['english_name'] ?></h1>
		</div>
		
 
		<div class="row">
			<div class="col-lg-4 aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop" data-grid-tab-content>
				<div class="filter-col-content filter-mobile-content">
	<div class="sidebar-block">
		<div class="sidebar-block_title">
			<span><?=$categories['english_name'] ?></span>
		</div>
		<?php } ?>
		
	</div>
	<div class="sidebar-block d-filter-mobile">
		<h3 class="mb-1">SORT BY</h3>
		<div class="select-wrapper select-wrapper-xs">
			<select class="form-control">
				<option value="featured">Featured</option>
				<option value="rating">Rating</option>
				<option value="price">Price</option>
			</select>
		</div>
	</div>
	<div class="sidebar-block filter-group-block open">
		<div class="sidebar-block_title">
			  <span>All Categories</span> 
			<span class="toggle-arrow"><span></span><span></span></span>
		</div>
		<div class="sidebar-block_content">
			<ul class="category-list">
				
				 <?php while($category_data = mysqli_fetch_array($categiry_all)) { ?>
				<li><a href="category-en.php?id=<?= $category_data['id'] ?>" title="<?= $category_data['english_name'] ?>" class="open"><?= $category_data['english_name'] ?></a></li>
				<?php } ?>
				
		</div>
	</div>

</div>
			</div>
			
			<div class="col-lg aside">
				<div class="prd-grid-wrap">
<div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid" data-grid-tab-content>
	<!-------product design start-------->
	<?php while($categories = mysqli_fetch_array($category)) { ?>
    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
        
	<div class="prd-inside">
		<div class="prd-img-area">
			<a href="product-en.php?id=<?= $categories['id'] ?>" class="prd-img image-hover-scale image-container" style="padding-bottom: 128.48%">
				<img src="images/products/<?= $categories['image'] ?>"  alt="Leather Pegged Pants" class="js-prd-img lazyload fade-up">
				<div class="shoppingkw-loader"></div>
				<div class="prd-big-circle-labels">
				    <?php
				    if($categories['price_after'] != $categories['price_before'])
                        {
                            $sale =  100-($categories['price_after']/$categories['price_before'])*100;
                        
					echo '<div class="label-sale"><span>' . intval($sale) . '% <span class="sale-text">Sale</span></span></div> ';
					}
                        
                        ?>
					
				</div>
				
			</a>
            <!----------add to love---->
			<div class="prd-circle-labels">
				<a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
				
			</div>
	
		</div>
		<div class="prd-info">
			<div class="prd-info-wrap">
				<div class="prd-info-top">
					<div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
				</div>
				<div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
				<div class="prd-tag"><a href="#">shopping</a></div>
				<h2 class="prd-title"><a href="product-en.php?id=<?= $categories['id'] ?>"><?= $categories['english_name'] ?></a></h2>
				<div class="prd-description">
					<?= $categories['descraption'] ?>
				</div>
				<div class="prd-action">
					<form action="#">
						<button class="btn js-prd-addtocart" data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
						<button class="btn js-prd-addtocart" data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
					</form>
				</div>
			</div>
			<div class="prd-hovers">
				<div class="prd-circle-labels">
					<div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
					<div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
				</div>
				<div class="prd-price">
					<div class="price-new">$ <?= $categories['price_after'] ?></div>
				</div>
				<div class="prd-action">
					<div class="prd-action-left">
						<form action="#">
							<button class="btn js-prd-addtocart" data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.webp", "url":"product.html", "aspect_ratio":0.778}'>شراء المنتج</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
	<?php } ?>
    <!------product design ends here--------->

				</div>
			</div>
		</div>
	</div>
</div>
	
</div>
<?php
include"include/footer-en.php";
?>