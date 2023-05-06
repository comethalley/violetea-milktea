-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 06:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-01-24 16:21:18', 'Tue Nov 01 16:13:02 SGT 2022');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(2, 'SNACKS', '', '2022-11-21 14:50:57', NULL),
(3, 'BEVERAGES', '', '2022-11-21 14:51:10', NULL),
(4, 'CAKES & PASTRIES', '', '2022-11-21 14:51:20', '23-11-2022 11:43:57 AM'),
(5, 'PASTAS & MORE', '', '2022-11-21 14:51:26', '23-11-2022 11:44:53 AM');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `max_quantity` int(11) NOT NULL,
  `notify_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `quantity`, `max_quantity`, `notify_quantity`, `created_at`, `updated_at`, `unit`) VALUES
(4, 'Patty', 14, 30, 15, '2023-03-09 08:56:10', '2023-03-09 13:11:10', 'Piece/s'),
(6, 'Cheese', 14, 30, 10, '2023-03-09 11:40:10', '2023-03-09 14:37:01', 'Piece/s'),
(7, 'Bans', 29, 30, 10, '2023-03-09 14:45:31', '2023-03-09 14:45:31', 'Piece/s'),
(8, 'Tomato', 19, 20, 5, '2023-03-09 14:46:41', '2023-03-09 14:46:41', 'Piece/s'),
(9, 'Bacon', 19, 20, 10, '2023-03-09 14:49:11', '2023-03-09 14:49:11', 'Piece/s'),
(10, 'Patty BBQ', 20, 20, 10, '2023-03-09 14:51:32', '2023-03-09 14:51:32', 'Piece/s'),
(11, 'Cucumber', 30, 30, 15, '2023-03-09 14:53:17', '2023-03-09 14:53:17', 'Piece/s'),
(12, '1 Galon Ketchup', 3775, 3785, 1000, '2023-03-09 14:56:45', '2023-03-09 15:03:49', 'Grams'),
(13, 'Crushed Oreo', 1000, 1000, 250, '2023-03-09 15:14:29', '2023-03-09 15:14:29', 'Grams'),
(14, 'Cheesecake Powder', 3000, 3000, 500, '2023-03-09 15:21:01', '2023-03-09 15:27:01', 'Grams'),
(15, 'Cheese Moose', 1000, 1000, 250, '2023-03-09 15:22:47', '2023-03-09 15:22:47', 'Grams'),
(16, 'Fructose', 1000, 1000, 250, '2023-03-09 15:23:39', '2023-03-09 15:23:39', 'Grams'),
(17, 'Tea', 1500, 1500, 500, '2023-03-09 15:26:29', '2023-03-09 15:26:29', 'Grams'),
(18, 'Creamer', 1000, 1000, 250, '2023-03-09 15:28:04', '2023-03-09 15:28:04', 'Grams'),
(19, 'Boba Pearl', 300, 300, 100, '2023-03-09 15:35:07', '2023-03-09 15:35:07', 'Grams'),
(20, 'Ice', 11340, 11340, 1000, '2023-03-09 15:38:32', '2023-03-09 15:38:32', 'Grams'),
(21, 'Mineral Water', 20000, 20000, 2000, '2023-03-09 15:41:40', '2023-03-09 15:41:40', 'Grams'),
(22, 'Nata De Coco', 500, 500, 100, '2023-03-09 15:43:00', '2023-03-09 15:43:00', 'Grams'),
(23, 'Milk Tea Cup', 2000, 2000, 500, '2023-03-10 04:41:04', '2023-03-10 04:41:04', 'Piece/s'),
(24, 'Milk Tea Straw', 2000, 2000, 250, '2023-03-10 04:41:23', '2023-03-10 04:41:23', 'Piece/s');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(26, 17, '32', 1, '2022-05-19 10:05:12', 'COD', 'Delivered'),
(27, 17, '33', 1, '2022-11-01 08:43:42', 'COD', 'in Process'),
(28, 17, '33', 1, '2022-11-03 14:32:36', 'COD', 'In Process'),
(29, 17, '33', 1, '2022-11-03 16:08:20', 'COD', 'Delivered'),
(32, 17, '49', 1, '2023-03-09 12:33:35', 'COD', 'Delivered'),
(33, 20, '50', 1, '2023-04-29 10:00:58', 'COD', NULL),
(34, 20, '54', 1, '2023-05-04 23:36:30', 'COD', NULL),
(35, 20, '50', 1, '2023-05-04 23:44:47', 'COD', NULL),
(36, 20, '56', 1, '2023-05-05 00:01:24', 'COD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(12, 27, 'in Process', 'fffd', '2022-11-01 11:21:45'),
(13, 27, 'in Process', 'sdsfdf', '2022-11-01 11:25:27'),
(14, 26, 'in Process', 'ssffffd', '2022-11-03 15:14:08'),
(15, 26, 'Delivered', 'xscs', '2022-11-03 15:15:56'),
(16, 29, 'In Process', 'dadaad', '2022-11-03 16:49:00'),
(17, 29, 'In Process', 'sffdfdfd', '2022-11-03 16:49:29'),
(18, 29, 'In Process', 'dsds', '2022-11-03 16:51:39'),
(19, 29, 'In Process', 'kaitkid', '2022-11-04 03:54:36'),
(20, 28, 'In Process', 'Waiting for the parvel', '2022-11-04 04:05:07'),
(21, 17, 'Select Status', '', '2022-11-17 06:51:49'),
(22, 17, 'Select Status', '', '2022-11-17 06:51:58'),
(23, 29, 'Delivered', 'done', '2022-11-17 08:35:12'),
(27, 32, 'Delivered', 'delivered', '2023-03-09 13:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `productingredients`
--

CREATE TABLE `productingredients` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productingredients`
--

INSERT INTO `productingredients` (`id`, `product_id`, `ingredient_id`, `quantity`) VALUES
(1, 49, 4, 1),
(5, 49, 6, 1),
(6, 49, 7, 1),
(7, 49, 8, 1),
(8, 49, 9, 1),
(9, 49, 12, 10),
(10, 50, 10, 1),
(11, 50, 6, 1),
(12, 50, 7, 1),
(13, 50, 8, 1),
(14, 50, 11, 2),
(15, 50, 12, 10),
(16, 50, 9, 1),
(17, 54, 13, 15),
(18, 54, 14, 90),
(19, 54, 15, 40),
(20, 54, 16, 40),
(21, 54, 17, 300),
(22, 54, 18, 90),
(23, 54, 19, 12),
(24, 54, 20, 70),
(25, 54, 21, 300),
(26, 54, 22, 30),
(27, 54, 23, 1),
(28, 54, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(5, 50, 1, 1, 1, 'test2 prod', 'test', 'test', '2023-03-09 10:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(49, 2, 27, 'Bacon Umami Burger', 'Violetea', 139, 199, '<span style=\"color: rgb(0, 0, 0);\"><font size=\"4\" style=\"\" face=\"helvetica\">Our signature patty, American cheese, caramelized onions, grilled bacon, and our special umami sauce.</font></span><br>', 'Untitled design (3).png', 'Untitled design (3).png', 'Untitled design (3).png', 20, 'Out of Stock', '2022-11-23 04:43:21', NULL),
(50, 2, 27, 'BBQ Bacon Burger', 'Violetea', 139, 199, '<span style=\"color: rgb(0, 0, 0); font-size: large;\"><font face=\"helvetica\">Our signature patty, American cheese, barbecue sauce, pickles, bacon, and garlic aioli sauce</font></span><br>', 'burger2.png', 'burger2.png', 'burger2.png', 20, 'In Stock', '2022-11-23 04:44:41', NULL),
(51, 2, 27, 'Frenchie Burger', 'Violetea', 168, 239, '<span style=\"color: rgb(0, 0, 0); font-family: wfont_eb22ff_b57e4be0f5c545ee899b3b0ae0325ae5, wf_b57e4be0f5c545ee899b3b0ae, orig_dm_sans_regular; font-size: large;\">Our signature patty, cheese, Dijon, crispy French fried onions, lettuce, mushrooms, and bacon.</span><br>', 'frenchie.png', 'frenchie.png', 'frenchie.png', 20, 'In Stock', '2022-11-23 04:45:31', NULL),
(52, 2, 27, 'Smash Burger', 'Violetea', 134, 189, '<span style=\"color: rgb(0, 0, 0); font-family: wfont_eb22ff_b57e4be0f5c545ee899b3b0ae0325ae5, wf_b57e4be0f5c545ee899b3b0ae, orig_dm_sans_regular; font-size: large;\">The classic California Double Smash Burger with grilled onions, lettuce, tomatoes, American cheese, and our secret sauce</span><br>', 'smash burger.png', 'smash burger.png', 'smash burger.png', 20, 'In Stock', '2022-11-23 04:47:25', NULL),
(53, 2, 27, 'Birria Burger', 'Violetea', 226, 289, '<span style=\"color: rgb(0, 0, 0); font-family: wfont_eb22ff_b57e4be0f5c545ee899b3b0ae0325ae5, wf_b57e4be0f5c545ee899b3b0ae, orig_dm_sans_regular; font-size: large;\">Marinated beef brisket with chipotle and cilantro, pico, red onions, and chili. Served with consommé for dipping.</span><br>', 'birria burger.png', 'birria burger.png', 'birria burger.png', 20, 'In Stock', '2022-11-23 04:48:08', NULL),
(54, 3, 28, 'Oreo Cheesecake', 'Violetea', 99, 129, '<font size=\"4\" face=\"helvetica\">Enjoy the taste of our best seller oreo cheesecake milk tea</font>', 'cheesecake.png', 'cheesecake.png', 'cheesecake.png', 20, 'In Stock', '2022-11-23 04:50:47', NULL),
(55, 3, 28, 'Okinawa Milk Tea', 'Violetea', 99, 129, 'Enjoy the good flavor of Okinawa Milk tea', 'okinawa.png', 'okinawa.png', 'okinawa.png', 20, 'In Stock', '2022-11-23 04:56:46', NULL),
(56, 3, 30, 'Lychee Fruitea', 'Violetea', 99, 129, '<font face=\"helvetica\" size=\"4\">Enjoy the taste of real fruit with nata. Come and get this Lychee Fruitea</font>', 'lychee.png', 'lychee.png', 'lychee.png', 20, 'In Stock', '2022-11-23 05:01:24', NULL),
(57, 3, 30, 'Strawberry Fruitea', 'Violetea', 99, 129, 'Enjoy the taste of real strawberry with nata bits.&nbsp;', 'strawberry.png', 'strawberry.png', 'strawberry.png', 20, 'In Stock', '2022-11-23 05:05:07', NULL),
(58, 3, 30, 'Green Apple', 'Violetea', 99, 129, '<span style=\"color: rgb(0, 0, 0); font-family: helvetica; font-size: large;\">Enjoy the taste of real green apple with nata bits. Come and get this Green Apple Fruitea</span><br>', 'green apple.png', 'green apple.png', 'green apple.png', 20, 'In Stock', '2022-11-23 06:03:23', NULL),
(59, 3, 29, 'Cookies and Cream Frappe', 'Violetea', 99, 129, '<font size=\"4\" face=\"helvetica\">Enjoy this cookies and cream frappe. Available Large and 1 Liter size</font>', 'frappe.png', 'frappe.png', 'frappe.png', 20, 'In Stock', '2022-11-23 06:06:31', NULL),
(60, 4, 31, 'Vaniila Raspberry Slice', 'Violetea', 175, 250, '<span style=\"color: rgb(0, 0, 0); font-family: scandia-regular; font-size: 16.1px; white-space: pre-wrap;\">Iced and filled with French vanilla buttercream with fresh raspberries whipped in the buttercream.</span><br>', 'raspbery.png', 'raspbery.png', 'raspbery.png', 20, 'In Stock', '2022-11-23 06:26:15', NULL),
(61, 4, 31, 'Lemon Blueberry Slice', 'Violetea', 175, 250, '<span style=\"color: rgb(0, 0, 0); font-family: scandia-regular; font-size: 16.1px; white-space: pre-wrap;\">Light lemon cake filled with fresh blueberries between the layers and then topped with buttercream.</span><span style=\"color: rgb(0, 0, 0); font-family: scandia-regular; font-size: 16.1px; white-space: pre-wrap;\">.</span><br>', 'bluebery.png', 'bluebery.png', 'bluebery.png', 20, 'In Stock', '2022-11-23 06:46:48', NULL),
(62, 4, 31, 'Oreo Cake Slice', 'Violetea', 175, 250, '<span style=\"color: rgb(0, 0, 0); font-family: scandia-regular; font-size: 16.1px; white-space: pre-wrap;\">Oreo cake batter with chunks of Oreo cookie baked in.  This cake is iced and filled with Oreo cookie pieces mixed into the vanilla buttercream</span><br>', 'oreo cake (1).png', 'oreo cake (1).png', 'oreo cake (1).png', 20, 'In Stock', '2022-11-23 06:54:46', NULL),
(63, 4, 31, 'German Cake Slice', 'Violetea', 175, 250, '<span style=\"color: rgb(0, 0, 0); font-family: scandia-regular; font-size: 16.1px; white-space: pre-wrap;\">A moist rich dark chocolate 3-layered cake with coconut filling and iced with the same delicious coconut blend and walnuts on top.</span><br>', 'germany cake.png', 'germany cake.png', 'germany cake.png', 20, 'In Stock', '2022-11-23 07:04:36', NULL),
(64, 5, 32, 'Chicken Alfredo', 'Violetea', 151, 219, '<span style=\"color: rgb(51, 51, 51); font-size: 22px; letter-spacing: 0.27px;\"><font face=\"helvetica\">Our favorite Chicken Alfredo recipe with the pasta cooked right in is perfect comfort food at its finest.</font></span><br>', 'chicken alfredo.png', 'chicken alfredo.png', 'chicken alfredo.png', 20, 'In Stock', '2022-11-23 11:41:07', NULL),
(65, 5, 32, 'Fettuccini Carbonara', 'Violetea', 151, 219, '<span style=\"color: rgba(0, 0, 0, 0.95); font-family: SourceSansPro, Helvetica, sans-serif; font-size: 18px;\">This fettuccine carbonara is a delectable, mouth-watering pile of yummy goodness!</span><br>', 'fettucine.png', 'fettucine.png', 'fettucine.png', 20, 'In Stock', '2022-11-23 11:54:18', NULL),
(66, 5, 32, 'Creole Pasta', 'Violetea', 151, 219, '<span style=\"color: rgb(82, 82, 82); font-family: &quot;Martel Sans&quot;, sans-serif; font-size: 15px; background-color: rgb(250, 249, 245);\">. This zesty meat spaghetti sauce gets a boost of Spanish flavor from goya. Stuffed olives,</span><span style=\"color: rgb(82, 82, 82); font-family: &quot;Martel Sans&quot;, sans-serif; font-size: 15px; background-color: rgb(250, 249, 245);\">&nbsp;savory sofrito, chopped ham, and an authentic blend of Spanish herbs and spices</span><br>', 'spaghetti.png', 'spaghetti.png', 'spaghetti.png', 20, 'In Stock', '2022-11-23 12:07:22', NULL),
(67, 2, 33, 'Violetea Fries', 'Violetea', 64, 89, '<span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">This French fries</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;recipe is made using a clever, proven cooking method that guarantees crispy fries</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;- and they STAY crispy for ages!</span><br>', 'fries.png', 'fries.png', 'fries.png', 10, 'In Stock', '2022-11-23 12:16:57', NULL),
(68, 2, 33, 'Cheesy Bacon Fries', 'Violetea', 69, 99, '<span style=\"color: rgb(32, 33, 36); font-family: arial, sans-serif; font-size: 16px;\">Our natural-cut, skin-on, sea-salted fries are topped with warm, creamy cheese sauce, shredded cheddar, and crispy Applewood smoked bacon.</span><br>', 'cheesy fries.png', 'cheesy fries.png', 'cheesy fries.png', 10, 'In Stock', '2022-11-23 12:23:51', NULL),
(69, 4, 31, '8', 'Business transaction', 150, 200, 'Good cake', '6425641fdbcaf4.52192629.jpg', '6425641fdbcbc3.47689563.jpg', '6425641fdbcbf0.60276871.jpg', 50, 'In Stock', '2023-04-02 12:43:39', NULL),
(70, 4, 31, 'Violetea Cake', 'Business transaction', 150, 200, 'Good', 'White-Chocolate-Raspberry-5a.jpg', 'White-Chocolate-Raspberry-5a.jpg', 'White-Chocolate-Raspberry-5a.jpg', 50, 'In Stock', '2023-04-02 12:52:28', NULL),
(71, 2, 27, '8', 'Violetea', 150, 200, 'Cake', '6425641fdbcaf4.52192629.jpg', '6425641fdbcbc3.47689563.jpg', '6425641fdbcbf0.60276871.jpg', 50, 'In Stock', '2023-04-02 13:06:13', NULL),
(72, 2, 27, '8', 'Violetea', 150, 200, 'Good', '6425641fdbcaf4.52192629.jpg', '6425641fdbcbc3.47689563.jpg', '6425641fdbcbf0.60276871.jpg', 50, 'In Stock', '2023-04-02 13:28:06', NULL),
(73, 3, 28, '8', 'Violetea', 150, 200, 'Good', '6425641fdbcaf4.52192629.jpg', '6425641fdbcbc3.47689563.jpg', '6425641fdbcbf0.60276871.jpg', 50, 'In Stock', '2023-04-02 13:32:17', NULL),
(74, 2, 27, 'Burger', 'Violetea', 150, 200, 'Burger', 'burger2.png', 'burger2.png', 'burger2.png', 50, 'In Stock', '2023-04-05 03:35:32', NULL),
(75, 3, 28, 'Milktea Taho flavor', 'Violetea', 150, 200, 'Milktea Taho flavor', '642cef37718346.00137062.png', 'okinawa.png', 'okinawa.png', 50, 'In Stock', '2023-04-05 04:47:16', NULL),
(76, 3, 28, 'Milktea malamig', 'Violetea', 150, 200, 'Good', '640d6a9802ba84.22225653.png', '640d6a9802ba84.22225653.png', '640d6a9802ba84.22225653.png', 50, 'In Stock', '2023-04-24 07:58:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(27, 2, 'BURGER', '2022-11-23 04:41:56', NULL),
(28, 3, 'MILK TEA', '2022-11-23 04:49:39', NULL),
(29, 3, 'FRAPPE', '2022-11-23 04:49:47', NULL),
(30, 3, 'FRUITEA', '2022-11-23 04:59:12', NULL),
(31, 4, 'CAKES', '2022-11-23 06:24:02', NULL),
(32, 5, 'PASTA', '2022-11-23 11:39:02', NULL),
(33, 2, 'FRIES', '2022-11-23 12:15:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_archive`
--

CREATE TABLE `tbl_archive` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `trends` varchar(255) NOT NULL,
  `conclusion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_archive`
--

INSERT INTO `tbl_archive` (`id`, `title`, `introduction`, `trends`, `conclusion`) VALUES
(1, '0', '0', '', '0'),
(2, '0', '0', '', '0'),
(3, '0', '0', '', '0'),
(4, 'milk tea pero hiwalay yung tea', 'pinag hiwalay yung milk saka tea', '', 'malupet'),
(5, 'Matcha Milktea', 'Matcha with milktea', '', 'masarap pala'),
(6, 'Matcha Milktea', 'Matcha with milktea', '', 'masarap pala'),
(7, 'Matcha Milktea', 'Matcha with milktea', '', 'masarap pala'),
(8, 'milktea taho', 'milktea na may taho', '', 'Di masarap'),
(9, 'milktea taho', 'Matcha with milktea', '', 'masarap pala'),
(10, 'Matcha Milktea', 'Matcha with milktea', '', 'masarap pala sulit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_archive_ingredient`
--

CREATE TABLE `tbl_archive_ingredient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `researchID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_archive_ingredient`
--

INSERT INTO `tbl_archive_ingredient` (`id`, `name`, `ingredient`, `description`, `researchID`) VALUES
(1, 'hwllo', 'uwu', 'dwas', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_archive_user`
--

CREATE TABLE `tbl_archive_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_archive_user`
--

INSERT INTO `tbl_archive_user` (`id`, `username`, `subject`, `body`) VALUES
(1, 'test', 'milktea', 'milktea sobrang masarap'),
(2, 'test', 'milktea2', 'milktea malamig'),
(3, 'test', 'Can\'t login using facebook account', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, iusto dolorum. Debitis magni corporis ipsum eveniet repellat sapiente amet accusantium harum ex placeat deserunt ut aperiam culpa qui, fugit asperiores!'),
(4, 'Bonita, Kenneth D.', 'Milktea', 'Yung milktea matabang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_concept`
--

CREATE TABLE `tbl_concept` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `archive` varchar(255) DEFAULT NULL,
  `isRejected` varchar(255) DEFAULT NULL,
  `ingredientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_concept`
--

INSERT INTO `tbl_concept` (`id`, `image`, `image2`, `image3`, `archive`, `isRejected`, `ingredientID`) VALUES
(1, '6425641fdbcaf4.52192629.jpg', '6425641fdbcbc3.47689563.jpg', '6425641fdbcbf0.60276871.jpg', '1', 'false', 4),
(2, '640d9079ccd4f5.70238318.png', '640d9079ccd4f5.70238318.png', '640d9079ccd4f5.70238318.png', '1', 'true', 4),
(5, '641aca787ff884.45055882.png', '641aca787ff884.45055882.png', '641aca787ff884.45055882.png', '1', 'false', 4),
(6, '641bc8a8e14506.56965454.png', '641bc8a8e14506.56965454.png', '641bc8a8e14506.56965454.png', '1', 'false', 12),
(7, '641bc67a6909b5.37465254.png', '641bc67a6909b5.37465254.png', '641bc67a6909b5.37465254.png', '1', 'false', 12),
(8, '64089846047cf1.10459827.png', '64089846047cf1.10459827.png', '64089846047cf1.10459827.png', '1', 'false', 13),
(9, '64089cffdf6e16.16771529.png', '64089cffdf6e16.16771529.png', '64089cffdf6e16.16771529.png', '1', 'false', 14),
(10, '641bcf23afdb42.52497085.png', '641bcf23afdb42.52497085.png', '641bcf23afdb42.52497085.png', '1', 'false', 15),
(11, '64096da5862138.79391465.jpg', '64096da5862138.79391465.jpg', '64096da5862138.79391465.jpg', '1', 'false', 16),
(12, '6409706087d163.04955881.png', '6409706087d163.04955881.png', '6409706087d163.04955881.png', '1', 'false', 17),
(13, '6409b4d75e0bf3.87482759.png', '6409b4d75e0bf3.87482759.png', '6409b4d75e0bf3.87482759.png', '1', 'false', 18),
(14, '6409df1c66bba0.94810314.png', '6409df1c66bba0.94810314.png', '6409df1c66bba0.94810314.png', '1', 'false', 19),
(15, '640af7d3839828.67014771.png', '640af7d3839828.67014771.png', '640af7d3839828.67014771.png', '1', 'false', 20),
(16, '640b0222ea7685.98369262.png', '640b0222ea7685.98369262.png', '640b0222ea7685.98369262.png', '1', 'false', 21),
(17, '640d6a9802ba84.22225653.png', '640d6a9802ba84.22225653.png', '640d6a9802ba84.22225653.png', '1', 'false', 22),
(18, '640d89497502a3.19990893.png', '640d89497502a3.19990893.png', '640d89497502a3.19990893.png', '1', 'false', 23),
(19, '640d8cb754dbd4.17131324.png', '640d8cb754dbd4.17131324.png', '640d8cb754dbd4.17131324.png', '1', 'false', 24),
(20, '640d921c8ede94.95482525.png', '640d921c8ede94.95482525.png', '640d921c8ede94.95482525.png', '1', 'false', 24),
(21, '640d929e90bf99.59890248.jpg', '640d929e90bf99.59890248.jpg', '640d929e90bf99.59890248.jpg', '1', 'false', 24),
(22, '640d93b5af8238.33444824.png', '640d93b5af8238.33444824.png', '640d93b5af8238.33444824.png', '1', 'false', 24),
(23, '641bcf7f840692.18255490.png', '641bcf7f840692.18255490.png', '641bcf7f840692.18255490.png', '1', 'false', 25),
(24, '642524ef6975d9.55504284.png', '642524ef6975d9.55504284.png', '642524ef6975d9.55504284.png', '1', 'false', 17),
(25, '64252f5ee05be1.47277579.png', '64252f5ee05c77.59657168.png', '64252f5ee05c90.03790937.png', '1', 'false', 9),
(26, '6425750450f513.57468427.png', '6425750450ff63.86042977.png', '6425750450ffd7.43146742.png', '1', 'false', 17),
(27, '642cef37718346.00137062.png', '642cef37718507.52544730.png', '642cef37718531.79390426.png', '1', 'false', 23),
(28, '642cf31a878849.11314232.png', '642cf31a878898.18803495.png', '642cf31a8788a6.69821422.png', '1', 'true', 17),
(29, '642cf3f47d4006.08044816.png', '642cf3f47d4094.71452067.png', '642cf3f47d40b3.84273000.png', '1', 'false', 15),
(30, '642fb4fd57d700.94582301.png', '642fb4fd57d7e6.31517460.png', '642fb4fd57d7f0.52919476.png', '1', 'false', 19),
(31, '6454cf6b378d04.49692770.png', '6454cf6b378dd0.50687968.png', '6454cf6b378e04.71392005.png', 'false', 'false', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `isArchived` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `firstname`, `lastname`, `username`, `password`, `createdAt`, `isArchived`) VALUES
(1, 'Kenneth', 'Bonita', 'admin', 'admin', '2023-05-06 03:46:40', 'false'),
(2, 'Kenneth', 'Bonita', 'kenneth21', 'test123', '2023-05-06 03:46:40', 'false'),
(3, 'kennet', 'bonita', 'test3', 'test3', '2023-05-06 03:46:40', 'false'),
(4, 'vera', 'rozen', 'vera', 'rozen', '2023-05-06 03:46:40', 'false'),
(5, 'bianca', 'veritas', 'bianca.veritas', 'admin123', '2023-05-06 03:46:40', 'false'),
(6, 'Kenneth', 'Bonita', 'kenneth.bonita07@gmail.com', '123', '2023-05-06 03:46:40', 'false'),
(7, 'Kenneth', 'Bonita', 'kenneth', '123', '2023-05-06 03:46:40', 'false'),
(8, 'Kenneth', 'Bonita', 'kenneth123', '123', '2023-05-06 03:46:40', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `archive` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `username`, `subject`, `body`, `archive`) VALUES
(3, 'test23', 'hakdog', 'gusto ko hakdog malaki', 'true'),
(4, 'test123', 'Milktea', 'Milktea malamig maganda', 'true'),
(5, 'abc', 'hamburger', 'malatiks', 'true'),
(7, 'Bonita, Kenneth D.', 'Can\'t login using facebook account', 'malatiks', 'true'),
(8, 'Bonita, Kenneth D.', 'maganda sana kung malamig', 'palamigin ang pagibig', 'true'),
(9, 'Bonita, Kenneth D.', 'ko', 'ko', 'true'),
(10, 'Bonita, Kenneth D.', 'milktea', 'dwasda', 'true'),
(12, 'kenneth', 'hello', 'hello', 'true'),
(13, 'Bonita, Kenneth D.', 'milktea malamig', 'malamig na milktea', 'true'),
(14, 'Bonita, Kenneth D.', 'Milktea', 'Milktea na may taho flavor', 'true'),
(15, 'Bonita, Kenneth D.', 'dw', 'sdwa', 'true'),
(16, 'Bonita, Kenneth D.', 'ss', 'ss', 'true'),
(17, 'Bonita, Kenneth D.', 'milktea', 'milktea na mapait', 'true'),
(18, 'mj', 'BEVERAGES', 'I would like to suggest that you create a new milk tea flavor that is unique and innovative', 'false'),
(19, 'jane', 'SNACKS', 'I would like to suggest that you create a new line of healthy snacks that are both delicious and nutritious.', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredient`
--

CREATE TABLE `tbl_ingredient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_formulation` varchar(255) DEFAULT NULL,
  `ingredient_sourcing` varchar(255) NOT NULL,
  `pricing_strategy` varchar(255) NOT NULL,
  `archive` varchar(255) DEFAULT NULL,
  `researchID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ingredient`
--

INSERT INTO `tbl_ingredient` (`id`, `name`, `product_formulation`, `ingredient_sourcing`, `pricing_strategy`, `archive`, `researchID`) VALUES
(4, '8', NULL, 'sago, taho, pearl', 'sago', 'true', NULL),
(9, 'Dsa', NULL, 'dsa', 'dSa', 'true', 8),
(10, 'test2 test2 test2', NULL, 'dwasdwa', 'jpegdwa', 'true', 13),
(11, 'matcha', NULL, 'sago, pearl', 'dwasd', 'true', 15),
(12, 'username', NULL, 'dasdasd', 'sadsa', 'true', 8),
(13, 'test_product', NULL, 'sago, okinawa', 'dwf', 'true', 16),
(14, 'test2 prod', NULL, 'okinawa, strawberry', 'test2 description', 'true', 17),
(15, 'test2 prod', NULL, 'Strawberry', 'Good', 'true', 18),
(16, 'test2 prod', NULL, 'sss', 'jpeg', 'true', 18),
(17, 'tes3 prod', NULL, 'test ingredients', 'test3 description', 'true', 19),
(18, 'tes3 prod', NULL, 'sago', 'sago', 'true', 20),
(19, 'survey_db', NULL, 'dsadas', 'dsa', 'true', 21),
(20, 'test3', NULL, 'test3', 'test3', 'true', 22),
(21, 'tes3 prod', NULL, 'test', 'test3', 'true', 23),
(22, 'Milktea malamig', NULL, 'sago, taho, strawberry', 'malamig', 'true', 24),
(23, 'Milktea Taho flavor', NULL, 'sago, taho, asukal', 'milktea taho flavor', 'true', 25),
(24, 'ss', NULL, 'ss', 'ss', 'true', 26),
(25, 'Milktea Sago', NULL, 'Milktea Sago', 'Milktea Sago', 'true', 27),
(26, 'tes3 prod', NULL, 'sago', 'sago', 'true', 8),
(27, 'Milktea Okinawa', NULL, 'sago, taho, pearl', 'malamig', 'true', 18),
(28, 'test1 test1 test1', NULL, 'test3', 'test3', 'true', 17),
(29, 'Chatime Milk Tea', 'Black tea: 2 teaspoons loose leaf tea or 2 tea bags\r\nWater: 1 cup\r\nMilk: 1/2 cup\r\nSugar: 2-3 teaspoons, or to taste', 'Ice', 'The pricing strategy is based on the cost of ingredients, \r\nlabor, and overhead, as well as the local market demand and \r\ncompetition. The price can be set to target a specific customer \r\nsegment, such as students or working professionals, and can be adju', 'false', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `archive` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `question`, `archive`) VALUES
(1, 'How satisfied are you with our product?', 'false'),
(2, 'How satisfied are you with our product?', 'false'),
(3, 'How the taste of product?', 'false'),
(4, 'How the taste of product?', 'false'),
(5, 'How are you satisfied with our product?', 'false'),
(6, 'twice', 'true'),
(7, 'twice', 'true'),
(8, 's', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `isAccepted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`id`, `name`, `image`, `image2`, `image3`, `isAccepted`) VALUES
(1, '8', '6425641fdbcaf4.52192629.jpg', '6425641fdbcbc3.47689563.jpg', '6425641fdbcbf0.60276871.jpg', 'true'),
(2, 'Milktea Taho flavor', '642cef37718346.00137062.png', '642cef37718507.52544730.png', '642cef37718531.79390426.png', 'true'),
(3, 'Milktea malamig', '640d6a9802ba84.22225653.png', '640d6a9802ba84.22225653.png', '640d6a9802ba84.22225653.png', 'true'),
(4, 'Milktea Taho flavor', '642cef37718346.00137062.png', '642cef37718507.52544730.png', '642cef37718531.79390426.png', 'false'),
(5, 'Milktea Sago', '641bcf7f840692.18255490.png', '641bcf7f840692.18255490.png', '641bcf7f840692.18255490.png', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_research`
--

CREATE TABLE `tbl_research` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `introduction` varchar(1200) DEFAULT NULL,
  `market` varchar(1200) DEFAULT NULL,
  `user` varchar(1200) DEFAULT NULL,
  `technical` varchar(1200) DEFAULT NULL,
  `conclusion` varchar(1200) DEFAULT NULL,
  `archive` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_research`
--

INSERT INTO `tbl_research` (`id`, `title`, `introduction`, `market`, `user`, `technical`, `conclusion`, `archive`) VALUES
(8, 'Matcha', '    Matcha with milktea    ', NULL, NULL, ' Online Forum ', '   All good  ', 'false'),
(11, 'Chatime Milk Tea', 'Chatime Milk Tea is a popular brand that offers a range of milk  tea flavors, such as classic pearl milk tea, roasted milk tea, and jasmine green milk tea.', '  Market research shows that \r\nChatime has a strong presence in Asia, Australia, \r\nand North America, and that its diverse menu and customizable options appeal to a wide range of customers', ' Social Media  Technical research reveals that Chatime \r\nuses high-quality tea leaves, fresh milk, and natural sweeteners in its milk tea, and that \r\nthe brewing and preparation methods are carefully controlled to ensure optimal taste and texture.', 'Social Media', '  Masarap pala     n conclusion, Chatime Milk Tea is a successful  and innovative product that has captured the attention and loyalty of a global customer base. Its emphasis on quality, variety,  and customization can serve as a model for other milk tea brands and businesses', 'false'),
(12, '  Matcha Milktea and Burgers  ', '  Malamig na milktea  ', NULL, NULL, 'Social Media', '  masarap pala sulit nice ', 'true'),
(13, ' milk tea pero hiwalay yung tea ', ' pinag hiwalay yung milk saka tea ', NULL, NULL, 'Online Forum', ' malupet ', 'true'),
(14, ' milk tea pero hiwalay yung tea ', ' Malamig na milktea ', NULL, NULL, 'Online Forum', ' masarap pala sulit ', 'true'),
(15, ' Matcha Milktea and Burgers ', ' pinag hiwalay yung milk saka tea ', NULL, NULL, 'Social Media', ' masarap pala sulit ', 'true'),
(16, ' test ', ' test ', NULL, NULL, 'Customer Survey', ' test ', 'true'),
(17, ' test2 ', ' test2 ', NULL, NULL, 'Social Media', ' test2 ', 'true'),
(18, '  Milktea matabang Okinawa  ', '  Matabang daw yung okinawa  ', NULL, NULL, 'Social Media', ' The new flavor is good ', 'true'),
(19, ' Matcha Milktea ', ' Malamig na milktea ', NULL, NULL, 'Customer Survey', ' masarap naman ', 'true'),
(20, ' Matcha Milktea ', ' Matcha with milktea ', NULL, NULL, 'Online Forum', ' ang galing ', 'true'),
(21, ' Matcha Milktea ', ' Matcha with milktea ', NULL, NULL, 'Online Forum', ' masarap pala ', 'true'),
(22, ' test3 ', ' test3 ', NULL, NULL, 'Social Media', ' test3 ', 'true'),
(23, ' Matcha Milktea ', ' Matcha with milktea ', NULL, NULL, 'Online Forum', ' masarap pala ', 'true'),
(24, ' Milktea na Malamig ', ' Malamig na milktea ', NULL, NULL, 'Online Forum', ' masarap pala sulit ', 'true'),
(25, ' milktea taho ', ' milktea na may taho ', NULL, NULL, 'Social Media', ' masarap pala ', 'true'),
(26, ' Krusty crab ', ' Crabby patty ', NULL, NULL, 'Online Forum', ' good ', 'true'),
(27, ' Milktea Sago ', ' Milktea Sago ', NULL, NULL, 'Online Forum', ' Milktea Sago ', 'true'),
(28, ' milktea taho ', ' Matcha with milktea ', NULL, NULL, 'Online Forum', ' ang galing ', 'true'),
(29, 'milktea taho', 'Matcha with milktea', NULL, NULL, 'online_forum', 'masarap pala', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey`
--

CREATE TABLE `tbl_survey` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `response1` int(11) NOT NULL,
  `response2` int(11) NOT NULL,
  `response3` int(11) NOT NULL,
  `archive` varchar(255) DEFAULT NULL,
  `conceptID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_survey`
--

INSERT INTO `tbl_survey` (`id`, `username`, `timestamp`, `response1`, `response2`, `response3`, `archive`, `conceptID`) VALUES
(1, 'bonita', '2023-03-23 13:01:52', 2, 3, 4, 'false', 5),
(2, 'vera', '2023-03-11 14:29:41', 4, 4, 3, 'false', 5),
(3, 'vera', '2023-03-11 14:29:46', 2, 4, 4, 'false', 6),
(4, 'bonita', '2023-03-11 14:29:48', 5, 4, 4, 'false', 7),
(5, 'Bonita', '2023-03-11 14:29:51', 5, 5, 5, 'false', 8),
(6, 'bonita', '2023-03-11 14:29:54', 5, 5, 5, 'false', 9),
(7, 'username', '2023-03-11 14:29:56', 4, 5, 4, 'false', 10),
(8, '', '2023-03-11 14:29:58', 5, 5, 3, 'false', 11),
(9, '', '2023-03-11 14:30:00', 5, 4, 5, 'false', 12),
(10, '', '2023-03-11 14:30:02', 2, 2, 2, 'false', 5),
(11, 'bonita', '2023-03-11 14:30:04', 2, 2, 2, 'false', 5),
(12, 'survey_db', '2023-03-11 14:30:09', 5, 5, 5, 'false', 13),
(13, 'survey_db', '2023-03-11 14:30:10', 1, 1, 1, 'false', 5),
(14, 'survey_db', '2023-03-11 14:30:12', 3, 3, 2, 'false', 5),
(15, '', '2023-03-11 14:30:14', 1, 4, 5, 'false', 14),
(16, '', '2023-03-11 14:30:15', 1, 2, 1, 'false', 15),
(17, 'kenneth bonita', '2023-03-11 14:30:17', 3, 4, 4, 'false', 16),
(18, '', '2023-03-12 06:25:50', 5, 4, 4, 'false', 16),
(19, 'KENNETH DELA CRUZ BONITA', '2023-03-12 06:25:57', 1, 2, 2, 'false', 16),
(20, 'kenn', '2023-03-12 06:29:59', 5, 1, 2, 'false', 16),
(21, '', '2023-03-12 06:30:04', 1, 1, 1, 'false', 16),
(22, 'kenet bonita', '2023-03-12 06:32:42', 3, 1, 4, 'false', 16),
(23, 'kenn', '2023-03-12 06:35:27', 5, 5, 5, 'false', 16),
(24, '', '2023-03-12 06:37:02', 1, 4, 4, 'false', 16),
(25, 'KENNETH DELA CRUZ BONITA', '2023-03-12 14:15:57', 2, 5, 4, 'false', 5),
(26, 'KENNETH DELA CRUZ BONITA', '2023-03-30 11:28:05', 3, 4, 5, 'false', 16),
(27, '', '2023-03-30 11:28:15', 3, 4, 3, 'false', 16),
(28, 'survey_db', '2023-03-12 08:58:36', 2, 1, 4, 'false', 5),
(30, '', '2023-03-24 10:07:46', 4, 4, 4, 'false', 23),
(31, '', '2023-03-30 05:58:51', 3, 4, 3, 'false', 12),
(32, '', '2023-04-05 05:12:53', 3, 1, 3, 'true', 1),
(33, '', '2023-03-30 11:18:56', 5, 3, 2, 'false', 2),
(34, '', '2023-03-30 11:40:14', 5, 4, 4, 'false', 26),
(35, '', '2023-03-30 11:41:11', 3, 3, 3, 'false', 26),
(36, '', '2023-03-30 11:41:44', 2, 5, 4, 'false', 26),
(37, '', '2023-04-05 05:25:43', 3, 4, 5, 'false', 29),
(38, '', '2023-04-05 05:25:50', 5, 5, 4, 'false', 29),
(39, '', '2023-04-05 05:25:56', 2, 1, 2, 'false', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surveys`
--

CREATE TABLE `tbl_surveys` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `civilStatus` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `response` varchar(255) DEFAULT NULL,
  `archive` varchar(255) NOT NULL,
  `conceptID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surveys`
--

INSERT INTO `tbl_surveys` (`id`, `username`, `civilStatus`, `gender`, `address`, `age`, `question_id`, `timestamp`, `response`, `archive`, `conceptID`) VALUES
(1, '', NULL, NULL, NULL, NULL, 5, '2023-05-04 00:00:00', '5', 'false', 7),
(2, '', NULL, NULL, NULL, NULL, 1, '2023-05-04 00:00:00', '5', 'false', 7),
(3, '', NULL, NULL, NULL, NULL, 1, '2023-05-04 00:00:00', '1', 'false', 7),
(4, '', NULL, NULL, NULL, NULL, 2, '2023-05-04 00:00:00', '2', 'false', 7),
(5, '', NULL, NULL, NULL, NULL, 3, '2023-05-04 00:00:00', '3', 'false', 7),
(6, '', NULL, NULL, NULL, NULL, 4, '2023-05-04 00:00:00', '4', 'false', 7),
(7, '', NULL, NULL, NULL, NULL, 5, '2023-05-04 00:00:00', '5', 'false', 7),
(8, 'kenneth', NULL, NULL, NULL, NULL, 1, '2023-05-04 00:00:00', '5', 'false', 7),
(9, 'kenneth', NULL, NULL, NULL, NULL, 1, '2023-05-04 00:00:00', '1', 'false', 7),
(10, 'kenneth', NULL, NULL, NULL, NULL, 2, '2023-05-04 00:00:00', '2', 'false', 7),
(11, 'kenneth', NULL, NULL, NULL, NULL, 3, '2023-05-04 00:00:00', '3', 'false', 7),
(12, 'kenneth', NULL, NULL, NULL, NULL, 4, '2023-05-04 00:00:00', '4', 'false', 7),
(13, 'kenneth', NULL, NULL, NULL, NULL, 5, '2023-05-04 00:00:00', '5', 'false', 7),
(14, 's', NULL, NULL, NULL, NULL, 5, '2023-05-04 00:00:00', '5', 'false', 7),
(15, '', NULL, NULL, NULL, NULL, 1, '2023-05-04 00:00:00', '5', 'false', 7),
(16, '', NULL, NULL, NULL, NULL, 1, '2023-05-04 00:00:00', '5', 'false', 7),
(17, '', NULL, NULL, NULL, NULL, 2, '2023-05-04 00:00:00', '5', 'false', 7),
(18, '', NULL, NULL, NULL, NULL, 3, '2023-05-04 00:00:00', '5', 'false', 7),
(19, '', NULL, NULL, NULL, NULL, 4, '2023-05-04 00:00:00', '5', 'false', 7),
(20, '', NULL, NULL, NULL, NULL, 5, '2023-05-04 00:00:00', '5', 'false', 7),
(21, '', NULL, NULL, NULL, NULL, 1, '2023-05-04 00:00:00', '5', 'false', 7),
(22, '', NULL, NULL, NULL, NULL, 2, '2023-05-04 00:00:00', '5', 'false', 7),
(23, '', NULL, NULL, NULL, NULL, 3, '2023-05-04 00:00:00', '5', 'false', 7),
(24, '', NULL, NULL, NULL, NULL, 4, '2023-05-04 00:00:00', '5', 'false', 7),
(25, '', NULL, NULL, NULL, NULL, 5, '2023-05-04 00:00:00', '3', 'false', 7),
(26, 'Kenneth', NULL, NULL, NULL, NULL, 1, '2023-05-04 00:00:00', '1', 'false', 2),
(27, 'Kenneth', NULL, NULL, NULL, NULL, 2, '2023-05-04 00:00:00', '2', 'false', 2),
(28, 'Kenneth', NULL, NULL, NULL, NULL, 3, '2023-05-04 00:00:00', '3', 'false', 2),
(29, 'Kenneth', NULL, NULL, NULL, NULL, 4, '2023-05-04 00:00:00', '4', 'false', 2),
(30, 'Kenneth', NULL, NULL, NULL, NULL, 5, '2023-05-04 00:00:00', '5', 'false', 2),
(31, '', NULL, NULL, NULL, NULL, 1, '2023-05-04 00:00:00', '1', 'false', 11),
(32, '', NULL, NULL, NULL, NULL, 2, '2023-05-04 00:00:00', '2', 'false', 11),
(33, '', NULL, NULL, NULL, NULL, 3, '2023-05-04 00:00:00', '3', 'false', 11),
(34, '', NULL, NULL, NULL, NULL, 4, '2023-05-04 00:00:00', '4', 'false', 11),
(35, '', NULL, NULL, NULL, NULL, 5, '2023-05-04 00:00:00', '5', 'false', 11),
(36, '', NULL, NULL, NULL, NULL, 6, '2023-05-04 00:00:00', '5', 'false', 11),
(37, '', NULL, NULL, NULL, NULL, 7, '2023-05-04 00:00:00', '5', 'false', 11),
(38, '', NULL, NULL, NULL, NULL, 1, '2023-05-04 00:00:00', '2', 'false', 7),
(39, '', NULL, NULL, NULL, NULL, 2, '2023-05-04 00:00:00', '3', 'false', 7),
(40, '', NULL, NULL, NULL, NULL, 3, '2023-05-04 00:00:00', '4', 'false', 7),
(41, '', NULL, NULL, NULL, NULL, 4, '2023-05-04 00:00:00', '5', 'false', 7),
(42, '', NULL, NULL, NULL, NULL, 5, '2023-05-04 00:00:00', '1', 'false', 7),
(43, '', NULL, NULL, NULL, NULL, 6, '2023-05-04 00:00:00', '2', 'false', 7),
(44, '', NULL, NULL, NULL, NULL, 7, '2023-05-04 00:00:00', '3', 'false', 7),
(45, 'kenneth', 'married', 'male', 'sauyo, quezon city', 18, 1, '2023-05-04 00:00:00', '4', 'false', 8),
(46, 'kenneth', 'married', 'male', 'sauyo, quezon city', 18, 2, '2023-05-04 00:00:00', '5', 'false', 8),
(47, 'kenneth', 'married', 'male', 'sauyo, quezon city', 18, 3, '2023-05-04 00:00:00', '5', 'false', 8),
(48, 'kenneth', 'married', 'male', 'sauyo, quezon city', 18, 4, '2023-05-04 00:00:00', '4', 'false', 8),
(49, 'kenneth', 'married', 'male', 'sauyo, quezon city', 18, 5, '2023-05-04 00:00:00', '5', 'false', 8),
(50, 'kenneth', 'married', 'male', 'sauyo, quezon city', 18, 6, '2023-05-04 00:00:00', '4', 'false', 8),
(51, 'kenneth', 'married', 'male', 'sauyo, quezon city', 18, 7, '2023-05-04 00:00:00', '5', 'false', 8),
(52, 'mark jamrs Cariso', 'Single', 'male', 'qc', 22, 1, '2023-05-04 11:32:24', '5', 'false', 1),
(53, 'mark jamrs Cariso', 'Single', 'male', 'qc', 22, 2, '2023-05-04 11:32:24', '5', 'false', 1),
(54, 'mark jamrs Cariso', 'Single', 'male', 'qc', 22, 3, '2023-05-04 11:32:24', '5', 'false', 1),
(55, 'mark jamrs Cariso', 'Single', 'male', 'qc', 22, 4, '2023-05-04 11:32:24', '5', 'false', 1),
(56, 'mark jamrs Cariso', 'Single', 'male', 'qc', 22, 5, '2023-05-04 11:32:24', '5', 'false', 1),
(57, 'mark jamrs Cariso', 'Single', 'male', 'qc', 22, 6, '2023-05-04 11:32:24', '5', 'false', 1),
(58, 'mark jamrs Cariso', 'Single', 'male', 'qc', 22, 7, '2023-05-04 11:32:24', '5', 'false', 1),
(59, 'bonita kennetch', 'single', 'male', 'qc', 222, 1, '2023-05-04 11:33:31', '2', 'false', 6),
(60, 'bonita kennetch', 'single', 'male', 'qc', 222, 2, '2023-05-04 11:33:31', '2', 'false', 6),
(61, 'bonita kennetch', 'single', 'male', 'qc', 222, 3, '2023-05-04 11:33:31', '2', 'false', 6),
(62, 'bonita kennetch', 'single', 'male', 'qc', 222, 4, '2023-05-04 11:33:31', '3', 'false', 6),
(63, 'bonita kennetch', 'single', 'male', 'qc', 222, 5, '2023-05-04 11:33:31', '3', 'false', 6),
(64, 'bonita kennetch', 'single', 'male', 'qc', 222, 6, '2023-05-04 11:33:31', '3', 'false', 6),
(65, 'bonita kennetch', 'single', 'male', 'qc', 222, 7, '2023-05-04 11:33:31', '1', 'false', 6),
(66, 'ako', 'ako', 'male', 'qc', 14, 1, '2023-05-05 08:15:24', '5', 'false', 7),
(67, 'ako', 'ako', 'male', 'qc', 14, 2, '2023-05-05 08:15:24', '5', 'false', 7),
(68, 'ako', 'ako', 'male', 'qc', 14, 3, '2023-05-05 08:15:24', '5', 'false', 7),
(69, 'ako', 'ako', 'male', 'qc', 14, 4, '2023-05-05 08:15:24', '5', 'false', 7),
(70, 'ako', 'ako', 'male', 'qc', 14, 5, '2023-05-05 08:15:24', '5', 'false', 7),
(71, 'ako', 'ako', 'male', 'qc', 14, 6, '2023-05-05 08:15:24', '5', 'false', 7),
(72, 'ako', 'ako', 'male', 'qc', 14, 7, '2023-05-05 08:15:24', '5', 'false', 7),
(73, 'na', 'na', 'male', 'na', 22, 1, '2023-05-05 08:16:39', '1', 'false', 12),
(74, 'na', 'na', 'male', 'na', 22, 2, '2023-05-05 08:16:39', '3', 'false', 12),
(75, 'na', 'na', 'male', 'na', 22, 3, '2023-05-05 08:16:39', '4', 'false', 12),
(76, 'na', 'na', 'male', 'na', 22, 4, '2023-05-05 08:16:39', '5', 'false', 12),
(77, 'na', 'na', 'male', 'na', 22, 5, '2023-05-05 08:16:39', '5', 'false', 12),
(78, 'na', 'na', 'male', 'na', 22, 6, '2023-05-05 08:16:39', '5', 'false', 12),
(79, 'na', 'na', 'male', 'na', 22, 7, '2023-05-05 08:16:39', '5', 'false', 12),
(80, 'Jane Dela Cruz', 'Single', 'male', 'Nova QC', 18, 1, '2023-05-05 17:43:27', '5', 'false', 31),
(81, 'Jane Dela Cruz', 'Single', 'male', 'Nova QC', 18, 2, '2023-05-05 17:43:27', '5', 'false', 31),
(82, 'Jane Dela Cruz', 'Single', 'male', 'Nova QC', 18, 3, '2023-05-05 17:43:27', '5', 'false', 31),
(83, 'Jane Dela Cruz', 'Single', 'male', 'Nova QC', 18, 4, '2023-05-05 17:43:27', '5', 'false', 31),
(84, 'Jane Dela Cruz', 'Single', 'male', 'Nova QC', 18, 5, '2023-05-05 17:43:27', '5', 'false', 31);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(45, 'johnchristian.miniano08@gmail.com', 0x3a3a3100000000000000000000000000, '2022-05-19 10:01:55', '19-05-2022 03:41:46 PM', 1),
(46, 'johnchristian.miniano08@gmail.com', 0x3a3a3100000000000000000000000000, '2022-05-19 10:11:56', '01-11-2022 10:59:23 AM', 1),
(47, 'johnchristian.miniano08@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-01 08:43:26', '03-11-2022 08:01:32 PM', 1),
(48, 'johnchristian.miniano08@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-03 14:32:15', NULL, 1),
(49, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-21 01:06:20', NULL, 0),
(50, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-21 01:06:48', NULL, 0),
(51, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-21 01:07:22', NULL, 0),
(52, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-21 01:07:23', NULL, 0),
(53, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-21 01:07:24', NULL, 0),
(54, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-21 01:07:29', NULL, 1),
(55, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-21 04:25:58', '21-11-2022 10:27:01 AM', 1),
(56, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-23 08:44:36', NULL, 0),
(57, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-23 08:44:40', NULL, 1),
(58, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-27 16:27:42', NULL, 0),
(59, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-27 16:27:46', NULL, 1),
(60, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-07 04:27:21', '07-03-2023 10:49:06 AM', 1),
(61, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-07 05:19:28', NULL, 1),
(62, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-07 12:57:27', NULL, 1),
(63, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-08 14:37:49', NULL, 1),
(64, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-09 10:47:44', '09-03-2023 04:20:52 PM', 1),
(65, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-09 10:51:08', '09-03-2023 04:21:58 PM', 1),
(66, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-09 10:52:13', '09-03-2023 04:22:24 PM', 1),
(67, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-09 10:52:34', '09-03-2023 04:26:36 PM', 1),
(68, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-12 05:53:07', '12-03-2023 01:37:09 PM', 1),
(69, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-12 08:07:21', '12-03-2023 01:48:49 PM', 1),
(70, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-12 08:19:35', '12-03-2023 01:54:25 PM', 1),
(71, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-12 08:24:48', '12-03-2023 01:58:36 PM', 1),
(72, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-12 14:47:35', NULL, 1),
(73, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-13 01:12:33', '13-03-2023 06:50:44 AM', 1),
(74, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-13 01:27:46', '13-03-2023 06:59:17 AM', 1),
(75, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-04-24 07:59:45', NULL, 0),
(76, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-04-24 07:59:54', NULL, 1),
(77, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-04-29 09:58:37', NULL, 0),
(78, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-04-29 09:58:45', '29-04-2023 03:31:33 PM', 1),
(79, 'mj@gmail.com', 0x3a3a3100000000000000000000000000, '2023-05-04 23:35:21', NULL, 0),
(80, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-05-04 23:35:41', NULL, 1),
(81, 'kenneth.bonita07@gmail.com', 0x3139322e3136382e37362e3235300000, '2023-05-04 23:44:01', NULL, 1),
(82, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-05-05 00:01:02', NULL, 1),
(83, 'mj@gmail.com', 0x3a3a3100000000000000000000000000, '2023-05-05 09:24:28', NULL, 0),
(84, 'mj@gmail.com', 0x3a3a3100000000000000000000000000, '2023-05-05 09:24:57', '05-05-2023 02:58:24 PM', 1),
(85, 'jane@gmail.com', 0x3a3a3100000000000000000000000000, '2023-05-05 09:28:56', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(17, 'john Christian Miniano', 'johnchristian.miniano08@gmail.com', 906549691, '81dc9bdb52d04dc20036dbd8313ed055', '673 Quirino Highway, San Bartolome, Novaliches, Quezon City', 'Manila', 'Quezon City', 1106, '673 Quirino Highway, San Bartolome, Novaliches, Quezon City', 'Manila', 'Quezon City', 1106, '2022-05-19 10:01:46', NULL),
(18, 'test1', 'test@gmail.com', 955162667, '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 01:07:14', NULL),
(19, 'eloisa marie baylon', 'test2@gmail.com', 955162667, '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 04:25:41', NULL),
(20, 'Bonita, Kenneth D.', 'kenneth.bonita07@gmail.com', 909090909, 'cc03e747a6afbbcbf8be7668acfebee5', NULL, NULL, NULL, NULL, '25 Robina', 'Bungad', 'Quezon City', 1105, '2023-03-07 04:27:05', NULL),
(21, 'mj', 'mj@gmail.com', 123, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-05 09:24:46', NULL),
(22, 'jane', 'jane@gmail.com', 123, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-05 09:28:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(7, 17, 32, '2022-05-19 10:03:31'),
(11, 20, 54, '2023-03-09 10:51:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productingredients`
--
ALTER TABLE `productingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_archive`
--
ALTER TABLE `tbl_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_archive_ingredient`
--
ALTER TABLE `tbl_archive_ingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `researchID` (`researchID`);

--
-- Indexes for table `tbl_archive_user`
--
ALTER TABLE `tbl_archive_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_concept`
--
ALTER TABLE `tbl_concept`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredientID` (`ingredientID`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ingredient`
--
ALTER TABLE `tbl_ingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `researchID` (`researchID`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_research`
--
ALTER TABLE `tbl_research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conceptID` (`conceptID`);

--
-- Indexes for table `tbl_surveys`
--
ALTER TABLE `tbl_surveys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conceptID` (`conceptID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `productingredients`
--
ALTER TABLE `productingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_archive`
--
ALTER TABLE `tbl_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_archive_ingredient`
--
ALTER TABLE `tbl_archive_ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_archive_user`
--
ALTER TABLE `tbl_archive_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_concept`
--
ALTER TABLE `tbl_concept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_ingredient`
--
ALTER TABLE `tbl_ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_research`
--
ALTER TABLE `tbl_research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_surveys`
--
ALTER TABLE `tbl_surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_archive_ingredient`
--
ALTER TABLE `tbl_archive_ingredient`
  ADD CONSTRAINT `tbl_archive_ingredient_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `tbl_research` (`id`);

--
-- Constraints for table `tbl_concept`
--
ALTER TABLE `tbl_concept`
  ADD CONSTRAINT `tbl_concept_ibfk_1` FOREIGN KEY (`ingredientID`) REFERENCES `tbl_ingredient` (`id`);

--
-- Constraints for table `tbl_ingredient`
--
ALTER TABLE `tbl_ingredient`
  ADD CONSTRAINT `tbl_ingredient_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `tbl_research` (`id`);

--
-- Constraints for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  ADD CONSTRAINT `tbl_survey_ibfk_1` FOREIGN KEY (`conceptID`) REFERENCES `tbl_concept` (`id`);

--
-- Constraints for table `tbl_surveys`
--
ALTER TABLE `tbl_surveys`
  ADD CONSTRAINT `tbl_surveys_ibfk_1` FOREIGN KEY (`conceptID`) REFERENCES `tbl_concept` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
