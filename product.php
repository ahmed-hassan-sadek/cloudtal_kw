<?php

use Buy as GlobalBuy;
include "include/header.php";

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = '$id' LIMIT 1";
$product = mysqli_query($conn , $sql);
?>
<div class="page-content">
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype = "multipart/form-data">
	<div class="holder">
	    <?php while($products = mysqli_fetch_array($product)) { ?>
	<div class="container js-prd-gallery" id="prdGallery">
		<div class="row prd-block prd-block-under prd-block--prv-bottom">
			<div class="col">
				<div class="js-prd-d-holder">
					<div class="prd-block_title-wrap">
						<div class="prd-block_reviews" data-toggle="tooltip" data-placement="top" title="Scroll To Reviews"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star"></i>
							<span class="reviews-link"><a href="#" class="js-reviews-link"> (17 reviews)</a></span>
						</div>
						<h1 class="prd-block_title"><?= $products['arabic_name'] ?></h1>
					</div>
				</div>
			</div>
			<div class="col-md-auto prd-block-prevnext-wrap">
				<div class="prd-block-prevnext">

</div>
			</div>
		</div>
		<div class="row prd-block prd-block--prv-bottom">
			<div class="col-md-8 col-lg-8 col-xl-8 aside--sticky js-sticky-collision">
				<div class="aside-content">
<div class="mb-2 js-prd-m-holder"></div>
<div class="prd-block_main-image">
	<div class="prd-block_main-image-holder" id="prdMainImage">
		<div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">
			
			
			<div data-value="Beige"><span class="prd-img"><img src="images/products/<?= $products['image'] ?>" /></span></div>
			
			
			<?php $_SESSION['pro_id'] = $products['id']; ?>
		

		</div>
		<div class="prd-block_label-sale-squared justify-content-center align-items-center"><span>Sale</span></div>
	</div>
	
</div>
                    
<div class="product-previews-wrapper">

</div>
				</div>
			</div>
            <!---------description of product and other data------------>
			<div class="col-md-10 col-lg-10 col-xl-10 mt-1 mt-md-0">
				<div class="prd-block_info prd-block_info--style1" data-prd-handle="/products/copy-of-suede-leather-mini-skirt">
	<div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
		<div class="prd-block_price prd-block_price--style2">
			<div class="prd-block_price--actual"><?= $products['price_after'] ?></div>
			<div class="prd-block_price-old-wrap">
				<span class="prd-block_price--old"><?= $products['price_before'] ?></span>
				<?php if($products['price_after'] != $products['price_before'])
                        {
                            $sale_value = $products['price_before']-$products['price_after'];
                            $sale =  100-($products['price_after']/$products['price_before'])*100;
					}
                        
                        ?>
				<span class="prd-block_price--text">You Save: $<?= $sale_value ?> (<?= intval($sale) ?>%)</span>
			</div>
		</div>
		<div class="prd-block_viewed-wrap d-none d-md-flex">
			
		</div>
	</div>
	<div class="prd-block_description prd-block_info_item ">
		<h3>وصف المنتج</h3>
		<p><?= $products['description'] ?></p>
		<div class="mt-1"></div>
		<div class="row vert-margin-less">
		
		</div>
	</div>
	<div class="prd-progress prd-block_info_item" data-left-in-stock="">
		<!--<div class="prd-progress-text">
			Hurry Up! Left <span class="prd-progress-text-left js-stock-left">26</span> in stock
		</div>-->
		<div class="prd-progress-text-null"></div>
		<div class="prd-progress-bar-wrap progress">
			<div class="prd-progress-bar progress-bar active" data-stock="50, 10, 30, 25, 1000, 15000" style="width: 53%;"></div>
		</div>
	</div>
	<div class="prd-block_countdown js-countdown-wrap prd-block_info_item countdown-init">
		<div class="countdown-box-full-text w-md">
			<div class="row no-gutters align-items-center">
				<div class="col-sm-auto text-center">
					<div class="countdown js-countdown" data-countdown="2021/07/01"></div>
				</div>
				<div class="col">
					<div class="countdown-txt"> TIME IS RUNNING OUT!</div>
				</div>
			</div>
		</div>
	</div>
	<div class="prd-block_order-info prd-block_info_item " data-order-time="" data-locale="en">
		<i class="icon-box-2"></i>
		<div>هذا الطلب سوف يصلك فى خلال 48 ساعة </div>
	</div>

                    <br><br><br><br>
	<div class="order-0 order-md-100">
			<div class="prd-block_options">
				
				<div class="prd-size swatches">
					
				
					
				</div>
			</div>
			<div class="prd-block_actions prd-block_actions--wishlist">
		
				<div class="prd-block_qty">
					<div class="qty qty-changer">
						<button class="decrease js-qty-button"></button>	
						<input type="text" class="qty-input" name="quantity" value="1" data-min="1" data-max="1000">
						<button class="increase js-qty-button"></button>
						<input type="hidden" name = "product_id" value="<?= $products['id'] ?>" />
			<input type="hidden" name = "user_id" value="<?= $_SESSION['id'] ?>" />
						
					</div>
				</div>
				<div class="btn-wrap">
					<button name="add" class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart" data-product='{"name":  "Leather Pegged Pants ",  "url ": "product.html",  "path ": "images/skins/fashion/product-page/product-01.webp",  "aspect_ratio ": "0.78"}'>اضف للعربه</button>
				</div>
			</div>
	
		<div class="prd-block_agreement prd-block_info_item order-0 order-md-100 text-right" data-agree>
			<input id="agreementCheckboxProductPage" class="js-agreement-checkbox" data-button=".shopify-payment-agree" name="agreementCheckboxProductPage" type="checkbox">
			<label for="agreementCheckboxProductPage"><a href="#" data-fancybox class="modal-info-link" data-src="#agreementInfo">أوافق على بنود الخدمة المقدمة</a></label>
		</div>
	</div>
                    
	<div class="prd-block_info_item">
		<ul class="prd-block_links list-unstyled">
			<li><i class="icon-size-guide"></i><a href="#">جميع احتياجاتك</a></li>
			<li><i class="icon-delivery-1"></i><a href="#">خدمة التوصيل المقدمة مجانية</a></li>
			<li><i class="icon-email-1"></i><a href="contact.php"  >اسأل على منتجاتك الغير متوفره</a></li>
		</ul>
		<div id="sizeGuide" style="display: none;" class="modal-info-content modal-info-content-lg">
			<div class="modal-info-heading">
				<div class="mb-1"><i class="icon-size-guide"></i></div>
				<h2>Size Guide</h2>
			</div>
		
		</div>
	
		
	</div>

</div>
			</div>
		</div>
        
	</div>
	
	<?php

} ?>
</div>
</form>

<?php
class Buy
{

	public static function checkQuantity()
	{
		global $conn ;

		$user_id = $_POST['user_id'];
		$product_id = $_POST['product_id'];

		$query = "SELECT counter FROM users_products WHERE user_id = '$user_id' AND product_id = '$product_id' ";
		$result = mysqli_query($conn , $query);
		return $result->fetch_assoc();

	}
	public static function BuyProduct()
	{
		global $conn;

        $quantity = $_POST['quantity'];
		$user_id = $_POST['user_id'];
		$product_id = $_POST['product_id'];
	

		
		$data = Buy::checkQuantity();

		if($data)
		{
			$sql = "UPDATE users_products SET counter = $quantity WHERE user_id = $user_id AND product_id = $product_id";
			$result = mysqli_query($conn , $sql);

			if($result)
			{
				echo '<script type="text/javascript">
            location.replace("index.php");
            </script>';
			}
		}

		else
		{
			$sql = "INSERT INTO users_products (user_id , product_id , counter) VALUES ($user_id , $product_id , $quantity)";
			$result = mysqli_query($conn , $sql);
			
			if($result)
			{?>
				<script type="text/javascript">
            location.replace("product-en.php?id=<?= $product_id['id']?>");
            </script>
			<?php }
		}
	}
}

if(isset($_POST['add']))
{
	Buy::BuyProduct();
}


?>
