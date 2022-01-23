-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 05:27 AM
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
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(13, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `bill_no` int(5) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_phone` int(10) NOT NULL,
  `payment_mod` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `card_type` varchar(20) NOT NULL,
  `card_number` int(20) NOT NULL,
  `bill_status` varchar(255) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_no`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `payment_mod`, `amount`, `card_type`, `card_number`, `bill_status`, `customer_id`) VALUES
(1, 'Rebecca', 'a block', 'qwerty@gmail.com', 1234567891, 'online', '650.00', 'gpay', 1234, 'Delivered', 5),
(2, 'user1', 'B block', 'user1@gmail.com', 2147483647, 'cod', '150.00', '', 0, 'Delivered', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_totalprice` decimal(10,2) DEFAULT NULL,
  `diet` varchar(255) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `cart_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `product_id`, `product_quantity`, `product_price`, `product_name`, `product_image`, `product_totalprice`, `diet`, `customer_id`, `cart_status`) VALUES
(1, 12, 2, '75.00', 'Buns', 'Food-Name-5629.jpeg', '150.00', 'Eggless', 5, 'inactive'),
(2, 15, 2, '250.00', 'Pizza bread', 'Food-Name-7999.jpeg', '500.00', 'Eggless', 5, 'inactive'),
(4, 11, 1, '150.00', 'Banana Bread', 'Food-Name-5928.jpeg', '150.00', 'Sugar-free', 5, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(9, 'Bread', 'Food_Category_185.jfif', 'Yes', 'Yes'),
(10, 'Brownie', 'Food_Category_273.jfif', 'Yes', 'Yes'),
(11, 'Cake', 'Food_Category_480.jfif', 'Yes', 'Yes'),
(12, 'Cheese Cakes', 'Food_Category_431.jfif', 'Yes', 'Yes'),
(13, 'Cookie', 'Food_Category_817.jfif', 'Yes', 'Yes'),
(14, 'Cupcakes', 'Food_Category_148.jfif', 'Yes', 'Yes'),
(15, 'Muffin', 'Food_Category_506.jfif', 'Yes', 'Yes'),
(16, 'Pastry', 'Food_Category_381.jfif', 'Yes', 'Yes'),
(17, 'Pie', 'Food_Category_72.jfif', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_username` varchar(100) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phoneno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_username`, `customer_password`, `customer_email`, `customer_address`, `customer_phoneno`) VALUES
(1, 'sharon', 'sang', '83a046ffa06d5c37860bca369940cd73', 'sgsharon@gmail.com', 'C Block-804,Goa', 2147483647),
(5, 'user1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1@gmail.com', 'B block', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `customer_name`, `customer_feedback`) VALUES
(1, 'sharon', 'very good service! :)'),
(2, 'user1', 'good service! :)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `discount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`, `discount`) VALUES
(11, 'Banana Bread', 'Who said bread wasn\'t healthy ;) Banana rules!', '150.00', 'Food-Name-5928.jpeg', 9, 'Yes', 'Yes', '0%'),
(12, 'Buns', 'Soft & Pillowy clouds of pure goodness!', '100.00', 'Food-Name-5629.jpeg', 9, 'Yes', 'Yes', '25%'),
(13, 'Churros', 'Cinnamon dusted,deep-fried golden bits of bread', '200.00', 'Food-Name-2848.jpeg', 9, 'Yes', 'Yes', '40%'),
(14, 'Mini Pizza', 'Now, you can eat a whole pizza without feeling guilty about it!', '250.00', 'Food-Name-2374.jpeg', 9, 'Yes', 'Yes', '0%'),
(15, 'Pizza bread', 'A classic veggie pizza with an overload of stringy cheese', '250.00', 'Food-Name-7999.jpeg', 9, 'No', 'Yes', '0%'),
(16, 'White loaf', 'The original version of our freshly baked bread', '125.00', 'Food-Name-9695.jpeg', 9, 'Yes', 'Yes', '0%'),
(18, 'Chocolate Glazed Brownies', 'Luscious brownies dipped into chocolate ganache!', '250.00', 'Food-Name-7711.jpeg', 10, 'Yes', 'Yes', '0%'),
(19, 'Double Chocolate Brownies', 'Dark Chocolate Ganache piped onto our signature brownies', '150.00', 'Food-Name-4738.jpeg', 10, 'Yes', 'Yes', '0%'),
(20, 'Biscoff Brownies', 'Biscoff spread+chocolate brownies= happy days!', '180.00', 'Food-Name-344.jpeg', 10, 'Yes', 'Yes', '0%'),
(21, 'Gooey Brownies', 'That ooze says it all! Gotta love the gooey delciousnes ', '200.00', 'Food-Name-4146.jpeg', 10, 'Yes', 'Yes', '0%'),
(22, 'Loaded Brownies', 'Brownies hidden underneath loads of nuts and chocolates.', '220.00', 'Food-Name-8003.jpeg', 10, 'Yes', 'Yes', '0%'),
(23, 'Nutty Brownies', 'Chocolate + NUTS = The perfect choice for health freaks!', '250.00', 'Food-Name-2347.jpg', 10, 'Yes', 'Yes', '25%'),
(24, 'Black Forest Cake', 'Chocolate cake layers with whipped cream & cherries!', '250.00', 'Food-Name-5950.jpeg', 11, 'Yes', 'Yes', '0%'),
(25, 'Belgian Chocolate Cake', 'The richest chocolate cake you will ever find!', '400.00', 'Food-Name-5809.jpeg', 11, 'Yes', 'Yes', '0%'),
(26, 'Chocolate Truffle Cake', 'This chocolate cake coupled with the luscious whipped ganache will definitely melt in your mouth :)', '450.00', 'Food-Name-5330.jpeg', 11, 'Yes', 'Yes', '0%'),
(27, 'Royale Cake', 'Every princess needs this over-the-top cake! Definitely a banger! You can never go wrong with this one;)', '550.00', 'Food-Name-893.jpeg', 11, 'Yes', 'Yes', '0%'),
(28, 'Vanilla Cake', 'You can never go wrong with good ol\' vanilla ;)', '350.00', 'Food-Name-7562.jpeg', 11, 'No', 'Yes', '0%'),
(29, 'Red Velvet Cake', 'What better way to express your love?', '500.00', 'Food-Name-45.jpeg', 11, 'No', 'Yes', '0%'),
(30, 'Unicorn Cake', 'A real showstopper at kids parties!', '450.00', 'Food-Name-5314.jpeg', 11, 'No', 'Yes', '0%'),
(31, 'Caramel Cake', 'A vanilla based cake completely doused in caramel sauce.', '440.00', 'Food-Name-9847.jpeg', 11, 'No', 'Yes', '0%'),
(32, 'Chocolate Cheesecake', 'Smooth & silky is the name of the game ', '350.00', 'Food-Name-6677.jpeg', 12, 'Yes', 'Yes', '0%'),
(33, 'Strawberry Cheesecake', 'Reinventing the age-old tradition of strawberries and cream.', '380.00', 'Food-Name-1121.jpeg', 12, 'Yes', 'Yes', '0%'),
(34, 'Mango Cheesecake', 'Summer, here we come!', '400.00', 'Food-Name-1265.jpeg', 12, 'No', 'Yes', '0%'),
(35, 'Biscoff Cheesecake', 'Handcrafted for all the biscoff lovers out there!', '250.00', 'Food-Name-6149.jpeg', 12, 'No', 'Yes', '0%'),
(36, 'Blueberry Cheesecake', 'Tart & sweet in every bite :)', '500.00', 'Food-Name-2195.jfif', 12, 'No', 'Yes', '0%'),
(37, 'Chocolate Chip Cookies', 'The original chewy chocolate chip cookies ', '185.00', 'Food-Name-8603.jfif', 13, 'No', 'Yes', '0%'),
(38, 'Double Chocolate Cookies', 'Double the fun!', '250.00', 'Food-Name-8486.jfif', 13, 'No', 'Yes', '0%'),
(39, 'Macarons', 'Ultimate flavor bombs in the disguise of cookie sandwiches ', '325.00', 'Food-Name-6814.jfif', 13, 'No', 'Yes', '0%'),
(40, 'Sugar Cookies', 'Thin cookies topped with a layer of royal icing', '280.00', 'Food-Name-8657.jfif', 13, 'No', 'Yes', '0%'),
(41, 'Palmiers', 'Sugary heart biscuits that have our heart!', '350.00', 'Food-Name-5888.jfif', 13, 'No', 'Yes', '0%'),
(42, 'Vanilla Cupcakes', 'Creamy white frosting piped onto a french vanilla cupcake.', '150.00', 'Food-Name-6274.jpeg', 14, 'No', 'Yes', '0%'),
(43, 'Chocolate Cupcakes', 'Chocolate cupcake topped with peaks of whipped chocolate ganache', '180.00', 'Food-Name-1438.jpeg', 14, 'No', 'Yes', '0%'),
(44, 'Red Velvet Cupcakes', 'Classic Red Velvet but topped with a cream cheese frosting!', '200.00', 'Food-Name-2900.jpeg', 14, 'No', 'Yes', '0%'),
(45, 'Cookies And Cream Cupcakes', 'Vanilla cupcake smothered with an oreo frosting ;)', '210.00', 'Food-Name-8083.jpeg', 14, 'No', 'Yes', '0%'),
(46, 'Strawberry Cupcakes', 'A vanilla cupcake piled up high with strawberry cream.', '190.00', 'Food-Name-806.jfif', 14, 'No', 'Yes', '0%'),
(47, 'Mango Cupcakes', 'Billowy mango icing on a vanilla cupcake.', '230.00', 'Food-Name-472.jfif', 14, 'No', 'Yes', '0%'),
(48, 'Blueberry And Lemon Muffins', 'The ultimate pairing which keeps you coming back for more!', '130.00', 'Food-Name-9728.jfif', 15, 'No', 'Yes', '0%'),
(49, 'Coffee Muffins', 'Caffeine lovers, this is for you! Trust us , you wont be dissapointed;)', '160.00', 'Food-Name-2318.jfif', 15, 'No', 'Yes', '0%'),
(50, 'Carrot And Walnut Muffins', 'Full on Christmas vibes!', '180.00', 'Food-Name-669.jfif', 15, 'No', 'Yes', '0%'),
(51, 'Banana And Chocolate Muffins', 'Nutritious yet decadent...', '190.00', 'Food-Name-6402.jpeg', 15, 'No', 'Yes', '0%'),
(52, 'Chocolate Chip Muffins', 'Classic chocolate muffins studded with chocolate chips', '200.00', 'Food-Name-499.jfif', 15, 'No', 'Yes', '0%'),
(53, 'Lemon Cake', 'A slice of citrus flavoured cake frosted with soft cream cheese', '65.00', 'Food-Name-1712.jpeg', 16, 'No', 'Yes', '0%'),
(54, 'Ombre Cake', 'Vanilla cake, but in so many different shades of colours!', '70.00', 'Food-Name-289.jpeg', 16, 'No', 'Yes', '0%'),
(55, 'Souffle', 'A crispy-top chocolate souffle with a warm gooey centre', '75.00', 'Food-Name-543.jpeg', 16, 'No', 'Yes', '0%'),
(56, 'Cinnamon Rolls', 'Warm fluffy rolls of dough wrapped in cinnamon & glazed with sugar syrup.', '75.00', 'Food-Name-3076.jpeg', 16, 'No', 'Yes', '0%'),
(57, 'Chocolate Mousse', 'This silky chocolate mousse will make your taste-buds and heart sing! ', '80.00', 'Food-Name-5891.jpeg', 16, 'No', 'Yes', '0%'),
(58, 'Cake Pops', 'Mini bites of cake-all in one tiny ball.', '75.00', 'Food-Name-2805.jpeg', 16, 'No', 'Yes', '0%'),
(59, 'Jam Tarts', 'Mini tarts filled with our in-house fruit reserve!', '95.00', 'Food-Name-9657.jpeg', 17, 'No', 'Yes', '0%'),
(60, 'Banoffee Pie', 'Banana,Dulce de Leche and whipped cream. Need we say anymore ;)', '110.00', 'Food-Name-21.jfif', 17, 'No', 'Yes', '0%'),
(61, 'Apple Pie', 'warm stewed apple encapsulated in a buttery pie crust.', '110.00', 'Food-Name-9901.jfif', 17, 'No', 'Yes', '0%'),
(62, 'Caramel Tarts', 'Classic Mini tarts filled with delicious caramel, and a dash of chocolate chips.', '130.00', 'Food-Name-8820.jpeg', 17, 'No', 'Yes', '0%'),
(63, 'Lemon Meringue Pie', 'Lemon curd trapped in a flaky pie crust and covered in blow-torched gooey meringue ', '150.00', 'Food-Name-9823.jfif', 17, 'No', 'Yes', '0%'),
(64, 'Pumpkin Pie', 'A pie with cooked pumpkin puree as the filling', '180.00', 'Food-Name-6357.jfif', 17, 'No', 'Yes', '0%');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  MODIFY `bill_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
