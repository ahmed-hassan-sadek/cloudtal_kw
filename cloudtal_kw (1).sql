-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 10:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloudtal_kw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `name`, `number`) VALUES
(1, 'admin', '123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(8) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `proid` varchar(300) NOT NULL,
  `proimg` varchar(300) NOT NULL,
  `proname` varchar(300) NOT NULL,
  `proprice` varchar(300) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'no',
  `orderusername` varchar(100) NOT NULL DEFAULT 'no',
  `orderusernumber` varchar(100) NOT NULL DEFAULT 'no',
  `orderuseraddress` varchar(200) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `proid`, `proimg`, `proname`, `proprice`, `status`, `orderusername`, `orderusernumber`, `orderuseraddress`) VALUES
(22, '', '4', 'assets/img/upload/993679collection-1.png', 'Samsung', '100', '', 'no', 'no', 'no'),
(24, '', '1', 'assets/img/upload/10711shop-6.jpg', 'gimy', '6500', 'no', 'no', 'no', 'no'),
(26, 'omar@yahoo.com', '4', 'assets/img/upload/993679collection-1.png', 'Samsung', '100', 'yes', 'omar magdy', '91', 'Hawamdia'),
(27, 'omar@yahoo.com', '4', 'assets/img/upload/993679collection-1.png', 'Samsung', '100', 'no', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `english_name` varchar(200) NOT NULL,
  `arabic_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `english_name`, `arabic_name`) VALUES
(2, 'clothes', 'ملابس ');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `number`, `subject`, `message`) VALUES
(2, 'Ahmed abdeltawab', 'omar@yahoo.com', '0162', 'اختبار', 'تم بحمد الله اختبار'),
(7, 'ayman', 'oelghannam50@gmail.com', '92', 'اختبار', 'sasdaad');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `english_name` varchar(200) NOT NULL,
  `arabic_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price_before` varchar(200) NOT NULL,
  `price_after` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `cat_en_id` bigint(20) NOT NULL,
  `cat_ar_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `english_name`, `arabic_name`, `description`, `price_before`, `price_after`, `image`, `cat_en_id`, `cat_ar_id`) VALUES
(6, 't-shirt', 'تيشرت', 't-shirt', '77', '78', '25743437561img-6.png', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `representative`
--

CREATE TABLE `representative` (
  `id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `nationalid` varchar(100) NOT NULL,
  `car` varchar(100) NOT NULL,
  `carnumber` varchar(100) NOT NULL,
  `cartype` varchar(100) NOT NULL,
  `carcolor` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `representative`
--

INSERT INTO `representative` (`id`, `name`, `number`, `nationalid`, `car`, `carnumber`, `cartype`, `carcolor`, `year`) VALUES
(1, 'ayman', '323', '123456', 'BMW', '34223', 'sasa', 'red', '23178');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(8) NOT NULL,
  `number` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `paying` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `number`, `name`, `email`, `country`, `city`, `address`, `paying`) VALUES
(1, '023', 'ahmed', 'ahmed@yahoo.com', 'Egypt', 'Giza', 'Giza , Egypt', 'الدفع كي نت اونلاين');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `aboutimg` varchar(300) NOT NULL,
  `id` int(4) NOT NULL,
  `about1` varchar(100) NOT NULL,
  `about2` varchar(2000) NOT NULL,
  `about1en` varchar(100) NOT NULL,
  `about2en` varchar(2000) NOT NULL,
  `contact1` varchar(2000) NOT NULL,
  `contact2` varchar(100) NOT NULL,
  `contact3` varchar(100) NOT NULL,
  `contact4` varchar(100) NOT NULL,
  `homeimg1` varchar(300) NOT NULL,
  `homeimg2` varchar(300) NOT NULL,
  `homeimg3` varchar(300) NOT NULL,
  `homeimg4` varchar(300) NOT NULL,
  `topline1` varchar(200) NOT NULL,
  `topline2` varchar(200) NOT NULL,
  `topline3` varchar(200) NOT NULL,
  `topline1en` varchar(200) NOT NULL,
  `topline2en` varchar(200) NOT NULL,
  `topline3en` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`aboutimg`, `id`, `about1`, `about2`, `about1en`, `about2en`, `contact1`, `contact2`, `contact3`, `contact4`, `homeimg1`, `homeimg2`, `homeimg3`, `homeimg4`, `topline1`, `topline2`, `topline3`, `topline1en`, `topline2en`, `topline3en`, `facebook`, `instagram`, `twitter`) VALUES
('images/upload/site/332726about-bg.webp', 3, 'معلومات عنا', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.', 'About Us ', 'Founded in 2010, Fox shop is the one stop shop for the barbering world. We provide barbers with the necessary tools to progress their craft and push the industry as far forward as possible.  Based in Cardiff, South Wales, Fox shop operates primarily in the UK, but international sales are welcomed and dispatched daily. We have a trade counter with a shop front and we encourage you to come in and see us!', 'معاك طول الاسبوع في اي وقت', 'الكويت, شارع 123', 'mmmm@yahoo.com', '+96566663289', 'images/upload/site/849437banner1.jpg', 'images/upload/site/559454banner1.jpg', 'images/upload/site/25350banner2.jpg', 'images/upload/site/286939banner2.jpg', 'استخدم كود shoppingkw للحصول علي خصم ب 15%', 'توصيل مجاني للطلبات فوق 250$', 'اليوم فقط! تخفيضان تصل الي 12%', ' Use promocode shoppingkw to get 15% discount!', ' Free plane shipping over $250', ' Today only! Post holiday Flash Sale! 2 for $20', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `age`, `address`, `email`, `password`) VALUES
(1, 'omar magdy', '0117832873', '24', 'giza', 'omar@yahoo.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_ar_id` (`cat_ar_id`),
  ADD KEY `cat_en_id` (`cat_en_id`);

--
-- Indexes for table `representative`
--
ALTER TABLE `representative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `representative`
--
ALTER TABLE `representative`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_ar_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`cat_en_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
