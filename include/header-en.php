<?php
session_start();
include('dashboard/includes/conn.php');

$login = 0;
if(isset($_SESSION['isLoginkw']))
{
    $login = 1;
    $username = $_SESSION['username'];
    $useremail = $_SESSION['email'];
    $userid = $_SESSION['id'];
}

$qshow = 'SELECT * FROM site';
$result = mysqli_query($conn , $qshow);
$data = $result->fetch_assoc();

$sql = "SELECT * FROM category";
$category = mysqli_query($conn , $sql);
?>

<!DOCTYPE html>
<html lang="en">
<!-------------START LINKS------------------->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>shoppingkw</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
	<link href="css/vendor/bootstrap.min.css" rel="stylesheet">
	<link href="css/vendor/vendor.min.css" rel="stylesheet">
	<link href="css/style-sport.css" rel="stylesheet">
	<link href="fonts/icomoon/icons.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">
</head>
<!----------END LINKS-------------->
<body class="has-smround-btns has-loader-bg equal-height">
    
<header class="hdr-wrap">
    

    <div class="hdr hdr-style2">
  <!------------------------START TOP NAV------------------->
        <div class="hdr-topline js-hdr-top">
            <div class="container">
                <div class="row">
                    
                    <!--social media-->
                    <div class="col hdr-topline-left">
<div class="hdr-line-separate">
<ul class="social-list list-unstyled">
		<li>
			<a href="<?= $data['facebook'] ?>" target="_blank"><i class="icon-facebook"></i></a>
		</li>
		<li>
			<a href="<?= $data['instagram']  ?>" target="_blank"><i class="icon-twitter"></i></a>
		</li>
		<li>
			<a href="<?= $data['twitter']  ?>" target="_blank"><i class="icon-instagram"></i></a>
		</li>
	</ul>
</div>
                    </div>
                    
                    <div class="col hdr-topline-right hide-mobile">
                        <div class="hdr-inline-link">
                            
                            <!--languages-->
<div class="dropdn dropdn_account dropdn_fullheight">
	<a href="index.php" class="dropdn-link js-dropdn-link" ><i class="fas fa-language"></i><span class="dropdn-link-txt">العربية</span></a>
</div>                     
                     <!--user account-->
<div class="dropdn dropdn_account dropdn_fullheight">
	<a href="account-login-en.php" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">
        
        <?php
        
        if($login == 1)
        {
            echo $username;
        }
        else
        {
            echo 'Account';
        }
        
        ?>
        
        </span></a>
</div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
 <!------------------------END TOP NAV------------------->
        <!-------------start Navbar------------>
        <div class="hdr-content">
            <div class="container">
                <div class="row">
                    <div class="col-auto show-mobile">
<div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
                    </div>
                    <div class="col-8 hdr-nav hide-mobile nav-holder">
<ul class="mmenu mmenu-js">
	<li class="mmenu-item--simple"><a href="index-en.php" class="active">Home</a></li>
    <li class="mmenu-item--simple"><a href="about-en.php" class="">About Us</a></li>
	<li class="mmenu-item--simple"><a href="#">Categories</a>
		<div class="mmenu-submenu">
			<ul class="submenu-list">
			    <?php while($categories = mysqli_fetch_array($category)) {?>
                <a href="category-en.php?id=<?=$categories['id']?>" ><li><?=$categories['english_name']?></li></a>
                <?php } ?>
</ul>
		</div>
	</li>
	<li class="mmenu-item--simple"><a href="contact-en.php" class="">Contact Us</a></li>
</ul>
                    </div>
                    <div class="hdr-logo">
                        <a href="index-en.php" class="logo"><img srcset="images/logo.png" alt="Logo"></a>
                    </div>
                    <div class="col col-lg-8 hdr-links-wrap">
                        <div class="hdr-links">
                            <div class="hdr-phone">
                                <a href="tel:+96566663289"> <i class="icon-phone"></i><span>+96566663289</span></a>
                            </div>
                            <div class="hdr-inline-link">
<div class="search_container_desktop">
	<div class="dropdn dropdn_search dropdn_fullwidth">
		<a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
		<div class="dropdn-content">
			<div class="container">
				<form method="get" action="search-en.php" class="search search-off-popular">
					<input name="keyword" type="text" class="search-input input-empty" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"
 placeholder="What are you looking for?">
					<button type="submit" class="search-button" name="search"><i class="icon-search"></i></button>
					<a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="dropdn dropdn_wishlist">
<?php
if (isset($_SESSION['isLoginkw'])) {
	$user_id = $_SESSION['id'];
	// count user from table students
	$sql = "SELECT * FROM users_wishes WHERE user_id = '$user_id'";
	$result = mysqli_query($conn , $sql);
	$count_products = mysqli_num_rows($result);
	?>
	<a href="account-wishlist-en.php" class="dropdn-link only-icon compare-link ">
		<i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span class="compare-qty"><?= $count_products ?></span>
	</a>
	<?php }
	else
	{?>
		<a href="account-wishlist.php" class="dropdn-link only-icon compare-link ">
		<i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span class="compare-qty">0</span>
	</a>
	<?php }?>
</div>
                                <div class="hdr_container_mobile show-mobile">
<div class="dropdn dropdn_account dropdn_fullheight">
	<a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
</div>
                                </div>
								<div class="dropdn dropdn_fullheight minicart">
	<a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMinicart">
		<i class="icon-basket"></i>
		<?php 
		if (isset($_SESSION['isLoginkw'])) {
			$user_id = $_SESSION['id'];
			$sql = "SELECT * FROM users_products WHERE user_id = '$user_id'";
	$result = mysqli_query($conn , $sql);
	
	$query = "SELECT products.price_after AS price_after FROM users_products INNER JOIN products ON users_products.product_id = products.id WHERE user_id = '$user_id'";
	$price = mysqli_query($conn , $query);
	$data = $price->fetch_assoc();
	$count_products = mysqli_num_rows($result);
	?>
		<span class="minicart-qty"><?= $count_products ?></span>
		<span class="minicart-total hide-mobile"><?= "$" . $data['price_after'] ?></span>
	
	<?php } 
	else
	{
	?>
		<span class="minicart-qty">0</span>
		<span class="minicart-total hide-mobile">0$</span>
	</a>
	<?php } ?>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------END NAVBAR--------------------------->
        <div class="hdr-promoline hdr-topline hdr-topline--dark">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
					<div class="custom-text js-custom-text-carousel" data-slick='{"speed": 1000, "autoplaySpeed": 3000}'>
	<div class="custom-text-item"><i class="icon-fox"></i><span> <?= $data['topline1']  ?></span></div>
	<div class="custom-text-item"><i class="icon-air-freight"></i><span> <?= $data['topline2']  ?></span></div>
	<div class="custom-text-item"><i class="icon-gift"></i><span> <?= $data['topline3']  ?></span></div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</header>
    
<div class="header-side-panel">
<div class="mobilemenu js-push-mbmenu">
    <!----------start of nav menue Mobile-------------->
	<div class="mobilemenu-content">
		<div class="mobilemenu-close mobilemenu-toggle">Close</div>
		<div class="mobilemenu-scroll">
			<div class="mobilemenu-search"></div>
			<div class="nav-wrapper show-menu">
				<div class="nav-toggle">
					<span class="nav-back"><i class="icon-angle-left"></i></span>
					<span class="nav-title"></span>
					<a href="#" class="nav-viewall">view all</a>
				</div>
				<ul class="nav nav-level-1">
					<li class="active"><a href="index-en.php">Home</a></li>
					<li><a href="about-en.php">About Us</a></li>
					<li><a href="#">Categories<span class="arrow"><i class="icon-angle-right"></i></span></a>
				<ul class="nav-level-2">
			<!--	<ul class="nav-level-3">
				<li><a href="product.html">Product page variant 1<span class="menu-label menu-label--color3">Popular</span></a></li>
                <li><a href="product-2.html">Product page variant 2</a></li>
				<li><a href="product-3.html">Product page variant 3</a></li>
				<li><a href="product-4.html">Product page variant 4</a></li>
				<li><a href="product-5.html">Product page variant 5</a></li>
				<li><a href="product-6.html">Product page variant 6</a></li>
				<li><a href="product-7.html">Product page variant 7</a></li>
				</ul>-->
<?php
			   		$query = "SELECT * FROM category";
					$result = mysqli_query($conn , $query);
					while($category = mysqli_fetch_array($result)){?>
					<li class="mmenu-item--simple"><a href="category.php?id=<?= $category['id'] ?>" class=""><?= $category['english_name'] ?></a></li>

<?php
					}
			   ?>	
						</ul>
					</li>
                    <li><a href="contact-en.php">Contact Us</a></li>
                    <br>
				</ul>
			</div>
			<div class="mobilemenu-bottom">
				<div class="mobilemenu-currency">
<div class="dropdn_currency">
	<div class="dropdn dropdn_caret">
			<a href="#" class="dropdn-link js-dropdn-link">دينار كويتي<i class="icon-angle-down"></i></a>
			<div class="dropdn-content">
					<ul>
						<li class=""><a href="#"><span>US dollars</span></a></li>
					</ul>
			</div>
	</div>
</div>
				</div>
				<div class="mobilemenu-language">
<div class="dropdn_language">
	<div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
		<a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current">English</span><i class="icon-angle-down"></i></a>
		<div class="dropdn-content">
			<ul>
				<li class=""><a href="index.php"><img src="images/flags/en.html" alt="">العربية</a></li>
			</ul>
		</div>
	</div>
</div>
				</div>
			</div>
		</div>
	</div>
    <!---------END NAV MENUE MOBILE--------------->
    
</div>
<?php
	  if (isset($_SESSION['isLoginkw'])) {
		$user_id = $_SESSION['id'];
		$query = "SELECT  users_products.counter AS counter , products.id AS id , products.image AS image , products.english_name AS english_name , products.price_before AS price_before , products.price_after AS price_after FROM users_products INNER JOIN products ON users_products.product_id = products.id WHERE user_id = '$user_id' ORDER BY id DESC";
		$result = mysqli_query($conn , $query);
	  }

	  ?>
    <!--------------cart Section--------------->
<div class="dropdn-content minicart-drop" id="dropdnMinicart">
	<div class="dropdn-content-block">
		<div class="dropdn-close"><span class="js-dropdn-close">Close</span></div>
		<div class="minicart-drop-content js-dropdn-content-scroll">
		<?php while($products = mysqli_fetch_array($result)) { ?>
			<div class="minicart-prd row">
				<div class="minicart-prd-image image-hover-scale-circle col">
					<a href="product-en.php?id=<?= $products['id'] ?>"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/products/<?= $products['image'] ?>" alt=""></a>
				</div>
				<div class="minicart-prd-info col">
					<div class="minicart-prd-tag">shoppingkw</div>
					<h2 class="minicart-prd-name"><a href="product-en.php?id=<?= $products['id'] ?>"><?= $products['english_name'] ?></a></h2>
					<div class="minicart-prd-qty"><span class="minicart-prd-qty-label">Quantity:</span><span class="minicart-prd-qty-value"><?= $products['counter'] ?></span></div>
					<div class="minicart-prd-price prd-price">
						<div class="price-old">$<?= $products['price_before'] ?></div>
						<div class="price-new">$<?= $products['price_after'] ?></div>
					</div>
				</div>
				<div class="minicart-prd-action">
				<?php 
				$id = $products['id'];
				$sql = "SELECT * FROM users_products WHERE product_id = '$id'";
				$users_product = mysqli_query($conn , $sql);
				$final = $users_product->fetch_assoc();
				$_SESSION['user_product_id'] = $products['id'];
				?>
				<form action="backend/products.php" method = "POST" enctype = "multipart/form-data">
					<input type="hidden" name="delete_id" value = "<?= $final['id'];?>">
					<input type="hidden" name="script">
					
					<button name="deleteEn"><a href="#" title="Remove From Wishlist"><i class="icon-recycle"></i></a></button>
				</form>
					
				</div>
			</div>
			<?php } ?>

			<div class="minicart-empty js-minicart-empty d-none">
				<div class="minicart-empty-text">Your cart is empty</div>
				<div class="minicart-empty-icon">
					<i class="icon-shopping-bag"></i>
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z"/></svg>
				</div>
			</div>
			<a href="#" class="minicart-drop-countdown mt-3">
				<div class="countdown-box-full">
					<div class="row no-gutters align-items-center">
						<div class="col-auto"><i class="icon-gift icon--giftAnimate"></i></div>
						<div class="col">
							<div class="countdown-txt">WHEN BUYING TWO
								THINGS A THIRD AS A GIFT
							</div>
							<div class="countdown js-countdown" data-countdown="2021/07/01"></div>
						</div>
					</div>
				</div>
			</a>
			<div class="minicart-drop-info d-none d-md-block">
				<div class="shop-feature-single row no-gutters align-items-center">
					<div class="shop-feature-icon col-auto"><i class="icon-truck"></i></div>
					<div class="shop-feature-text col"><b>SHIPPING!</b> Continue shopping to add more products and receive free shipping</div>
				</div>
			</div>
		</div>
		<?php
		if (isset($_SESSION['isLoginkw'])) {
			$user_id = $_SESSION['id'];
		$query = "SELECT sum(products.price_after) AS price_after  FROM users_products INNER JOIN products ON users_products.product_id = products.id WHERE user_id = '$user_id'";
		$price = mysqli_query($conn , $query);
		$data = $price->fetch_assoc();
		?>
		<div class="minicart-drop-fixed js-hide-empty">
			<div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal=""><span></span></div>
			<div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center">
				<div class="minicart-drop-total-txt col-auto heading-font">Subtotal</div>
				<div class="minicart-drop-total-price col" data-header-cart-total="">$<?=$data['price_after']?></div>
			</div>
		<?php } ?>

			<div class="minicart-drop-actions">
				<a href="cart.html" class="btn btn--md btn--grey"><i class="icon-basket"></i><span>Cart Page</span></a>
				<a href="checkout.html" class="btn btn--md"><i class="icon-checkout"></i><span>Check out</span></a>
			</div>
			<ul class="payment-link mb-2">
				<li><i class="icon-amazon-logo"></i></li>
				<li><i class="icon-visa-pay-logo"></i></li>
				<li><i class="icon-skrill-logo"></i></li>
				<li><i class="icon-klarna-logo"></i></li>
				<li><i class="icon-paypal-logo"></i></li>
				<li><i class="icon-apple-pay-logo"></i></li>
			</ul>
		</div>
	</div>
	<div class="drop-overlay js-dropdn-close"></div>
</div>
   <!-------------end cart section-------------------> 
    </div>