<?php
include "include/header-en.php";

$id = $_SESSION['id'];

$data = "SELECT products.id AS id , products.image AS image , products.english_name AS english_name , products.description AS description , products.price_after AS price_after FROM users_wishes INNER JOIN products ON users_wishes.product_id = products.id WHERE users_wishes.user_id = '$id'";

    $product = mysqli_query($conn , $data);

?>
<div class="header-side-panel">
<div class="mobilemenu js-push-mbmenu">
	<div class="mobilemenu-content">
		<div class="mobilemenu-close mobilemenu-toggle">Close</div>
		<div class="mobilemenu-scroll">
			<div class="mobilemenu-search"></div>
	
			<div class="mobilemenu-bottom">
			
				<div class="mobilemenu-language">
<div class="dropdn_language">
	<div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
		<a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current">English</span><i class="icon-angle-down"></i></a>
		
	</div>
</div>
				</div>
			</div>
		</div>
	</div>
</div>
  
</div>
<div class="page-content">

	<div class="holder">
	<div class="container">
		<div class="row">
		<?php
            include"include/user-dash-en.php";
            ?>
			<div class="col-md-14 aside">
				<h1 class="mb-3">My Wishlist</h1>
				<div class="empty-wishlist js-empty-wishlist text-center py-3 py-sm-5 d-none" style="opacity: 0;">
					<h3>Your Wishlist is empty</h3>
					<div class="mt-5">
						<a href="index-en.php" class="btn">Continue shopping</a>
					</div>
				</div>
				<div class="prd-grid-wrap position-relative">
					<div class="prd-grid prd-grid--wishlist data-to-show-3 data-to-show-lg-3 data-to-show-md-2 data-to-show-sm-2 data-to-show-xs-1">
						<?php while($products = mysqli_fetch_array($product)){?>
                        <!---your product starts here----->
    <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
	
                            <div class="prd-inside">
		<div class="prd-img-area">
			<a href="product-en.php?id=<?= $products['id'] ?>" class="prd-img image-hover-scale image-container" style="padding-bottom: 128.48%">
				<img src="images/products/<?= $products['image'] ?>"  class="js-prd-img lazyload fade-up">
				<div class="foxic-loader"></div>
				<div class="prd-big-squared-labels">
				</div>
			</a>
			<div class="prd-circle-labels">
				<?php 
				$id = $products['id'];
				$sql = "SELECT * FROM users_wishes WHERE product_id = '$id'";
				$users_wishes = mysqli_query($conn , $sql);
				$data = $users_wishes->fetch_assoc();
				?>
				<form action="<?php $_SERVER['PHP_SELF'] ?>" method = "POST" enctype = "multipart/form-data">
					<input type="hidden" name="delete_id" value = "<?= $data['id'];?>">
					<input type="hidden" name="script">
					<button name="delete"><a href="#" title="Remove From Wishlist"><i class="icon-recycle"></i></a></button>
				</form>
				
			</div>
	
		</div>
		<div class="prd-info">
			<div class="prd-info-wrap">
				<div class="prd-info-top">
					<div class="prd-tag"><a href="#">Bigsteps</a></div>
				</div>
                 <!----------rating section starts here------------->
				<div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                <!----------------print category name here-------------------->
				<div class="prd-tag"><a href="#">Bigsteps</a></div>
				<h2 class="prd-title"><a href="product-en.php?id=<?= $products['id'] ?>"><?= $products['english_name'] ?></a></h2>
				<div class="prd-description">
					<?= $products['description'] ?>
				</div>
			</div>
			<div class="prd-hovers">
				<div class="prd-circle-labels">
                    <div><a href="#" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
					<div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
				</div>
				<div class="prd-price">
					<div class="price-new">$ <?= $products['price_after'] ?></div>
				</div>
				<div class="prd-action">
					<div class="prd-action-left">
							<a href="product-en.php?id=<?= $products['id'] ?>"><button class="btn">View Full Info</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
                        </div> 
						<?php } ?>
                        <!----------------end of product------------------>
			</div>
		</div>
	</div>
</div>
</div>
<?php
include "include/footer.php";
?>

<?php


class Wishes
{
	public static function deleteWishes()
	{
		global $conn;
		$script = $_POST['script'];
		$userId = $_POST['delete_id'];

		$request =  mysqli_query($conn , "SELECT FROM users_wishes WHERE id = $userId");
		if(!empty($request))
		{
			echo '<script type="text/javascript">
				location.replace("account-wishlist-en.php");
			</script>';
			die(); 
		}
		if(!empty($script))
		{
			echo '<script type="text/javascript">
				location.replace("account-wishlist-en.php");
			</script>';
			die();
		}

		$sql = "DELETE FROM users_wishes WHERE id= $userId";

		if (mysqli_query($conn, $sql)) {

		echo '<script type="text/javascript">
				location.replace("account-wishlist-en.php");
			</script>';

		}
	}
			
		
	
}


if (isset($_POST['delete'])) {
	Wishes::deleteWishes();
}
?>

