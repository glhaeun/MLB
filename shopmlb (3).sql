-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 19, 2023 at 06:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopmlb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutpage`
--

CREATE TABLE `aboutpage` (
  `mainbanner` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `titleA` varchar(100) NOT NULL,
  `contentA` varchar(2000) NOT NULL,
  `contentB` varchar(2000) NOT NULL,
  `contentC` varchar(2000) NOT NULL,
  `contentD` varchar(2000) NOT NULL,
  `minibannerA` varchar(100) NOT NULL,
  `minibannerB` varchar(100) NOT NULL,
  `minibannerC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutpage`
--

INSERT INTO `aboutpage` (`mainbanner`, `cover`, `titleA`, `contentA`, `contentB`, `contentC`, `contentD`, `minibannerA`, `minibannerB`, `minibannerC`) VALUES
('exo.webp', 'banner.jpg', 'WE ARE MLB Official', 'Based on Korea we have a vision ......', 'WELCOME TO MLB', 'Create easy access to majority of Korea Republic citizen to enjoy MLB Products.', '<p>MLB Korea is the official online store for Major League Baseball merchandise in South Korea. Our mission is to provide fans with access to high-quality, authentic MLB products that allow them to show their support for their favorite teams and players. We are dedicated to offering a wide selection of products that meet the needs of all types of fans, from casual supporters to die-hard enthusiasts. Our website is designed to provide a seamless shopping experience, with easy-to-use features, secure payment options, and fast, reliable shipping within South Korea. We are committed to delivering excellent customer service and ensuring that every customer is satisfied with their purchase. Thank you for choosing MLB Korea as your source for official MLB merchandise.</p>', 'banner1b.jpg', 'gridbanner1.jpg', 'A1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name2` varchar(20) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `name2`, `level`) VALUES
(3, 'glhaeun123', 'hello', 'Grace Lee', 'master_admin'),
(12, 'chikachika', 'bombo', 'Grace', 'normal_admin'),
(15, 'admin', '123', 'main', 'normal_admin'),
(41, 'glhaeun', 'hello', 'Ha Eun', 'normal_admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `subtotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`) VALUES
(0, 'All'),
(1, 'Cap'),
(2, 'Beanie'),
(3, 'Hat'),
(4, 'Beret'),
(14, 'Bucket Hat');

-- --------------------------------------------------------

--
-- Table structure for table `landingpage`
--

CREATE TABLE `landingpage` (
  `id` int(11) NOT NULL,
  `banner` varchar(20) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `keyword` varchar(20) NOT NULL,
  `thumbA` varchar(20) NOT NULL,
  `thumbB` varchar(20) NOT NULL,
  `thumbC` varchar(20) NOT NULL,
  `new_release` varchar(100) NOT NULL,
  `sg1` varchar(100) NOT NULL,
  `sg2` varchar(100) NOT NULL,
  `sg3` varchar(100) NOT NULL,
  `sg4` varchar(100) NOT NULL,
  `sg5` varchar(100) NOT NULL,
  `sg6` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landingpage`
--

INSERT INTO `landingpage` (`id`, `banner`, `title`, `description`, `keyword`, `thumbA`, `thumbB`, `thumbC`, `new_release`, `sg1`, `sg2`, `sg3`, `sg4`, `sg5`, `sg6`) VALUES
(1, 'banner.jpg', 'MLB 2023', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a dui luctus, eleifend orci sit amet, molestie risus. Morbi rhoncus ex sed condimentum vestibulum. Quisque et consectetur justo. Fusce pharetra tempus lacus at tincidunt. Nam sodales sapien lectus, ac sagittis diam molestie vel. Nullam risus quam, sodales id nunc in, fringilla pellentesque sem. Maecenas lacinia, nunc vehicula facilisis suscipit, ante nisl dictum arcu, vel finibus mauris sapien at massa.&nbsp;</p>', '#MLB_NEW_ERA', 'product13.png', 'product7A.png', 'product14.png', 'show', 'banner222.jpg', 'banner223.jpg', 'style2.jpg', 'style5.jpg', 'style4.jpg', 'banner123.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `placed_on` date DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `total_products` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `method` varchar(100) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `delivery_status` varchar(100) NOT NULL,
  `details` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `placed_on`, `customer_id`, `customer_name`, `number`, `address`, `total_products`, `total_price`, `method`, `payment_status`, `delivery_status`, `details`) VALUES
(6, '2023-07-19', 3, 'Grace Lee', '08116361444', 'Jl Imam Bonjol No.6', 1, 705000, 'OVO', 'Completed', 'Delivering to customer', '3:Sunny Beach New York YANKEES - 1pc;'),
(8, '2023-07-19', 4, 'Elvina Lim', '08123455566', 'kompleks royal sumatra cluster topaz no 145', 4, 2664000, 'OVO', 'Completed', 'Delivering to customer', '5:Sun Cap NY YANKEES  - 1pc;9:Rabbit Bucket NY YANKEES - 1pc;3:Sunny Beach New York YANKEES - 2pc;'),
(10, '2023-07-19', 5, 'Candra', '082345237789', 'Multatuli blok AA no 123', 4, 2664000, 'BCA', 'Completed', 'Preparing order', '6:Metal Embroidery LA Dodgers - 1pc;9:Rabbit Bucket NY YANKEES - 1pc;3:Sunny Beach New York YANKEES ');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `bannerproduct` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `bannerdetail` varchar(100) NOT NULL,
  `keyworddetail` varchar(100) NOT NULL,
  `wordsdetail` varchar(100) NOT NULL,
  `bannerlogin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`bannerproduct`, `keyword`, `bannerdetail`, `keyworddetail`, `wordsdetail`, `bannerlogin`) VALUES
('aespa.webp', '#Dandy_Trendy_WithMLB', 'banner123.jpg', '#Fashion_MLB', 'Cap off your game day look with our MLB Caps!', 'bannermain.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `otp_expiry`
--

CREATE TABLE `otp_expiry` (
  `id` int(11) NOT NULL,
  `resettoken` varchar(255) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `resettokenexpire` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp_expiry`
--

INSERT INTO `otp_expiry` (`id`, `resettoken`, `is_expired`, `email`, `resettokenexpire`) VALUES
(1, '4fc4f8c6ba9a1ca1113138043c730f3f', 1, 'haeunictsis@gmail.com', '2023-07-19'),
(2, '9a8b26781596f823d56598789cf8d463', 1, 'haeunictsis@gmail.com', '2023-07-19'),
(3, '87f98f87562c36c6f0591174473e9f31', 1, 'haeunictsis@gmail.com', '2023-07-19'),
(4, '21ae27210926bfb80a4ce1c806db37b3', 1, 'haeunictsis@gmail.com', '2023-07-19'),
(5, '3778f78b44c7fbbd01eceb6c6546beae', 1, 'haeunictsis@gmail.com', '2023-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `image_a` varchar(100) NOT NULL,
  `image_b` varchar(100) NOT NULL,
  `image_c` varchar(100) NOT NULL,
  `image_d` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `details`, `price`, `stock`, `image_a`, `image_b`, `image_c`, `image_d`) VALUES
(3, 'Sunny Beach New York YANKEES', 'Cap', 'Sunny Beach New York YANKEES', 705000, '8', 'product3A.png', 'product3B.png', 'product3C.png', 'product3D.png'),
(5, 'Sun Cap NY YANKEES ', 'Cap', 'Stay cool and show your support for the Los Angeles Dodgers with this Basic Sun Cap. The classic design features the Dodgers logo on the front and an adjustable strap in the back for a comfortable and secure fit, making it the perfect accessory for any outdoor activity.', 475000, '0', 'product5A.png', 'product5B.png', 'product5C.png', 'product5D.png'),
(6, 'Metal Embroidery LA Dodgers', 'Cap', 'Show off your support for the Los Angeles Dodgers in style with this Metal Embroidery Cap. The classic design features the Dodgers logo in metallic embroidery on the front and an adjustable strap in the back for a comfortable fit.', 475000, '29', 'product4A.png', 'product4B.png', 'product4C.png', 'product4D.png'),
(7, 'Classic MONOGRAM Boston Red Sox', 'Hat', 'Stay cool and show your support for the Boston Red Sox with this Classic MONOGRAM Sun Cap. The classic design features the iconic Red Sox logo on the front in monogrammed print and an adjustable strap in the back for a comfortable fit.', 705000, '0', 'product7A.png', 'product7B.png', 'product7C.png', 'product7D.png'),
(8, 'Cube MONOGRAM Bucket NY YANKEES', 'Cap', 'Keep cool and show your support for the New York Yankees with this Cube MONOGRAM Bucket Hat. The sleek black design features the Yankees logo in monogrammed print on the front and a breathable fabric to keep you comfortable on warm days. The bucket hat design provides full coverage for your face and neck, making it the perfect accessory for any outdoor activity.\n', 945000, '0', 'product8A.png', 'product8B.png', 'product8C.png', 'product8D.png'),
(9, 'Rabbit Bucket NY YANKEES', 'Hat', 'The sleek navy blue design features the iconic Yankees logo embroidered on the front, giving it a unique and eye-catching look. The bucket hat design provides full coverage for your face and neck, while the breathable fabric keeps you cool and comfortable even on the hottest days.\r\n\r\n', 779000, '27', 'product9A.png', 'product9B.png', 'product9C.png', 'fb.png'),
(10, 'Jelly Beanie NY YANKEES', 'Beanie', 'Stay warm and show your love for the New York Yankees with this New Jelly Beanie. The vibrant blue beanie features the Yankees logo on the front and a soft, jelly-like texture for a unique and stylish look.', 465000, '20', 'product10A.png', 'product10B.png', 'product10C.png', 'product10D.png'),
(14, 'Denim Dia MONOGRAM Newsboy Cap Boston Red Sox\n', 'Cap', 'The striking design features the iconic Dodgers logo embroidered in metal on the front, giving it a unique and eye-catching look. The cap is finished with an adjustable strap for a secure and comfortable fit, and a pre-curved visor to shield your face from the sun.\n\n', 1050000, '21', 'product14A.png', 'product14B.png', 'product14C.png', 'product14D.png'),
(15, 'Knit Beret NEW YORK YANKEES', 'Beret', 'Stay warm and stylish on cold game days with the Knit Beret NEW YORK YANKEES. Made with high-quality acrylic yarn, this beret features a sleek navy blue design with the iconic Yankees logo embroidered in white on the front.', 569000, '42', 'product15A.png', 'product15B.png', 'product15C.png', 'product15D.jpg'),
(16, 'Smile Unstructured Ball Cap Los Angeles Dodgers', 'Cap', 'Add a touch of fun and whimsy to your Dodgers fan gear with this Smile Unstructured Ball Cap. The cap features a simple and classic design with the iconic Dodgers logo on the front, along with an embroidered smiley face that adds a playful touch. The unstructured style of the cap gives it a relaxed and comfortable fit, making it perfect for everyday wear. The cap also has an adjustable strap in the back to ensure a secure and comfortable fit for all head sizes. Show your love for the Dodgers wit', 350000, '38', 'product22A.png', 'product22B.png', 'product22C.png', 'product22D.png'),
(17, 'Stamp Ball Cap LA DODGERS', 'Cap', 'The cap\'s six-panel construction and curved brim provide ample shade and protection from the sun, making it the perfect accessory for outdoor activities like attending games or going for a walk on a sunny day. The adjustable strap at the back ensures a comfortable and secure fit for all head sizes, making it easy to wear for extended periods of time.', 120000, '43', 'product17AA.png', 'product17B.png', 'product17C.png', 'product17D.png'),
(18, 'Basic Beret NEW YORK YANKEES', 'Beret', 'Stay warm and fashionable on game day with the Basic Beret NEW YORK YANKEES. Made with high-quality wool, this beret features a sleek black design with the iconic Yankees logo embroidered in white on the front.\n\n', 768000, '32', 'product18A.png', 'product18B.png', 'product17A.png', 'product17A.png'),
(19, 'Raffia Sun Cap MLB', 'Cap', 'The Raffia Sun Cap MLB is the perfect accessory for any baseball fan looking to stay stylish and protected from the sun. Made with high-quality raffia straw, this cap is both lightweight and durable, making it ideal for outdoor activities like attending games or going for a walk on a sunny day.', 705000, '0', 'product19A.png', 'product19B.png', 'product19C.png', 'product19D.png'),
(20, 'Athleisure Sun Cap NEW YORK YANKEES', 'Cap', 'Stay comfortable and stylish on game day with the Athleisure Sun Cap NEW YORK YANKEES. Made with high-quality polyester, this cap is lightweight and breathable, making it perfect for outdoor activities like attending games or going for a run on a sunny day.', 678000, '43', 'product20A.png', 'product20B.png', 'product20C.png', 'product20D.png'),
(21, 'Basic Color Block Unstructured Ball Cap NEW YORK YANKEES\r\n', 'Cap', 'Looking for a stylish and comfortable way to show your support for the New York Yankees? Look no further than the Basic Color Block Unstructured Ball Cap.\r\n\r\nMade with high-quality cotton twill, this cap is both durable and comfortable, with a classic unstructured design that fits most head sizes. The cap features a sleek color-block design, with the iconic Yankees logo embroidered in white on the front.', 569000, '22', 'product21A.png', 'product21B.png', 'product21C.png', 'product21D.png'),
(23, 'Metal Logo Snapback DETROIT TIGERS', 'Cap', 'Get ready to show your love for the Detroit Tigers with the Metal Logo Snapback! Made with high-quality cotton twill, this cap features a sleek black design with a shiny metal Detroit Tigers logo embroidered on the front.', 479000, '27', 'product23A.png', 'product23B.png', 'product23C.png', 'product23D.png'),
(24, 'Rookie Bucket Hat Boston Red Sox\r\n', 'Hat', 'Stay cool and protected from the sun on game day with the Rookie Bucket Hat Boston Red Sox. Made with high-quality cotton twill, this bucket hat features a sleek navy blue design with the iconic Red Sox logo embroidered in white on the front.\r\n\r\n', 479000, '18', 'product24A.png', 'product24B.png', 'product24C.png', 'product24D.png'),
(40, 'Testing Product', 'Bucket Hat', 'Product Detail', 790000, '20', 'product1C.png', 'product1D.png', 'product1C.png', 'product1D.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `number`, `dob`) VALUES
(2, 'Ha Eun Lee', 'haeunlee@gmail.com', 'haeunLee12!', 'Hotel Aryaduta Lt.2', '0810912931', '2002-12-22'),
(3, 'Grace Lee', 'haeunictsis@gmail.com', 'haeun12!!', 'Jl Imam Bonjol No.6', '08116361444', '2002-12-25'),
(4, 'Elvina Lim', 'pina@gmail.com', '@acacacac12', 'kompleks royal sumatra cluster topaz no 145', '08123455566', '2002-12-25'),
(5, 'Candra', 'candra@gmail.com', 'candra123!', 'Multatuli blok AA no 123', '082345237789', '2002-12-25'),
(6, 'Aldo Candra', 'aldo@gmail.com', 'test123!', 'Jl ABC no 7', '0811223344', '2002-12-25'),
(7, 'Christopher Wijaya', 'cw@gmail.com', 'ayam123!', 'Jl ABC no.881', '081122334455', '2002-12-25'),
(9, 'Grace Lee', 'haeun123@gmail.com', 'haeun12!', 'Jl BCA no.912', '0899778866', '2002-12-25'),
(13, 'haeun lee', 'testing@gmail.com', 'haeun12!', 'jl abcd no.3a', '0812312312', '2003-07-19');

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
-- Indexes for table `landingpage`
--
ALTER TABLE `landingpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `otp_expiry`
--
ALTER TABLE `otp_expiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `landingpage`
--
ALTER TABLE `landingpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `otp_expiry`
--
ALTER TABLE `otp_expiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
