-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 03:59 PM
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
(29, 17, '33', 1, '2022-11-03 16:08:20', 'COD', 'Delivered');

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
(23, 29, 'Delivered', 'done', '2022-11-17 08:35:12');

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
(68, 2, 33, 'Cheesy Bacon Fries', 'Violetea', 69, 99, '<span style=\"color: rgb(32, 33, 36); font-family: arial, sans-serif; font-size: 16px;\">Our natural-cut, skin-on, sea-salted fries are topped with warm, creamy cheese sauce, shredded cheddar, and crispy Applewood smoked bacon.</span><br>', 'cheesy fries.png', 'cheesy fries.png', 'cheesy fries.png', 10, 'In Stock', '2022-11-23 12:23:51', NULL);

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
  `archive` varchar(255) DEFAULT NULL,
  `ingredientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_concept`
--

INSERT INTO `tbl_concept` (`id`, `image`, `archive`, `ingredientID`) VALUES
(1, '640c8cddc1faa5.08813736.jpg', 'false', 4),
(2, '640d9079ccd4f5.70238318.png', 'false', 4),
(5, '641aca787ff884.45055882.png', 'false', 4),
(6, '641bc8a8e14506.56965454.png', 'false', 12),
(7, '641bc67a6909b5.37465254.png', 'false', 12),
(8, '64089846047cf1.10459827.png', 'false', 13),
(9, '64089cffdf6e16.16771529.png', 'false', 14),
(10, '641bcf23afdb42.52497085.png', 'false', 15),
(11, '64096da5862138.79391465.jpg', 'false', 16),
(12, '6409706087d163.04955881.png', 'false', 17),
(13, '6409b4d75e0bf3.87482759.png', 'false', 18),
(14, '6409df1c66bba0.94810314.png', 'false', 19),
(15, '640af7d3839828.67014771.png', 'false', 20),
(16, '640b0222ea7685.98369262.png', 'false', 21),
(17, '640d6a9802ba84.22225653.png', 'false', 22),
(18, '640d89497502a3.19990893.png', 'false', 23),
(19, '640d8cb754dbd4.17131324.png', 'false', 24),
(20, '640d921c8ede94.95482525.png', 'false', 24),
(21, '640d929e90bf99.59890248.jpg', 'false', 24),
(22, '640d93b5af8238.33444824.png', 'false', 24),
(23, '641bcf7f840692.18255490.png', 'false', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, NULL, NULL, 'admin', 'admin'),
(2, 'Kenneth', 'Bonita', 'kenneth', 'test123'),
(3, 'kenet', 'bonita', 'test3', 'test3'),
(4, 'vera', 'rozen', 'vera', 'rozen'),
(5, 'bianca', 'veritas', 'bianca.veritas', 'admin123');

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
(3, 'test23', 'hakdog', 'gusto ko hakdog malaki', 'false'),
(4, 'test123', 'Milktea', 'Milktea malamig maganda', 'false'),
(5, 'abc', 'hamburger', 'malatiks', 'false'),
(7, 'Bonita, Kenneth D.', 'Can\'t login using facebook account', 'malatiks', 'false'),
(8, 'Bonita, Kenneth D.', 'maganda sana kung malamig', 'palamigin ang pagibig', 'false'),
(9, 'Bonita, Kenneth D.', 'ko', 'ko', 'false'),
(10, 'Bonita, Kenneth D.', 'milktea', 'dwasda', 'false'),
(12, 'kenneth', 'hello', 'hello', 'false'),
(13, 'Bonita, Kenneth D.', 'milktea malamig', 'malamig na milktea', 'false'),
(14, 'Bonita, Kenneth D.', 'Milktea', 'Milktea na may taho flavor', 'false'),
(15, 'Bonita, Kenneth D.', 'dw', 'sdwa', 'false'),
(16, 'Bonita, Kenneth D.', 'ss', 'ss', 'false'),
(17, 'Bonita, Kenneth D.', 'milktea', 'milktea na mapait', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredient`
--

CREATE TABLE `tbl_ingredient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `archive` varchar(255) DEFAULT NULL,
  `researchID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ingredient`
--

INSERT INTO `tbl_ingredient` (`id`, `name`, `ingredient`, `description`, `archive`, `researchID`) VALUES
(4, '8', 'sago, taho, pearl', 'sago', 'false', NULL),
(9, 'Dsa', 'dsa', 'dSa', 'false', 8),
(10, 'test2 test2 test2', 'dwasdwa', 'jpegdwa', 'false', 13),
(11, 'matcha', 'sago, pearl', 'dwasd', 'false', 15),
(12, 'username', 'dasdasd', 'sadsa', 'false', 8),
(13, 'test_product', 'sago, okinawa', 'dwf', 'false', 16),
(14, 'test2 prod', 'okinawa, strawberry', 'test2 description', 'false', 17),
(15, 'test2 prod', 'Strawberry', 'Good', 'false', 18),
(16, 'test2 prod', 'sss', 'jpeg', 'false', 18),
(17, 'tes3 prod', 'test ingredients', 'test3 description', 'false', 19),
(18, 'tes3 prod', 'sago', 'sago', 'false', 20),
(19, 'survey_db', 'dsadas', 'dsa', 'false', 21),
(20, 'test3', 'test3', 'test3', 'false', 22),
(21, 'tes3 prod', 'test', 'test3', 'false', 23),
(22, 'Milktea malamig', 'sago, taho, strawberry', 'malamig', 'false', 24),
(23, 'Milktea Taho flavor', 'sago, taho, asukal', 'milktea taho flavor', 'false', 25),
(24, 'ss', 'ss', 'ss', 'false', 26),
(25, 'Milktea Sago', 'Milktea Sago', 'Milktea Sago', 'false', 27),
(26, 'tes3 prod', 'sago', 'sago', 'false', 8),
(27, 'Milktea Okinawa', 'sago, taho, pearl', 'malamig', 'false', 18),
(28, 'test1 test1 test1', 'test3', 'test3', 'false', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_research`
--

CREATE TABLE `tbl_research` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `introduction` varchar(255) DEFAULT NULL,
  `trends` varchar(255) DEFAULT NULL,
  `conclusion` varchar(255) DEFAULT NULL,
  `archive` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_research`
--

INSERT INTO `tbl_research` (`id`, `title`, `introduction`, `trends`, `conclusion`, `archive`) VALUES
(8, '   Matcha Milktea   ', '   Matcha with milktea   ', 'Online Forum', '  All good ', 'false'),
(11, ' Milktea Taho    ', ' Matcha with milktea    ', 'Social Media', ' Masarap pala    ', 'false'),
(12, '  Matcha Milktea and Burgers  ', '  Malamig na milktea  ', 'Social Media', '  masarap pala sulit nice ', 'false'),
(13, ' milk tea pero hiwalay yung tea ', ' pinag hiwalay yung milk saka tea ', 'Online Forum', ' malupet ', 'false'),
(14, ' milk tea pero hiwalay yung tea ', ' Malamig na milktea ', 'Online Forum', ' masarap pala sulit ', 'false'),
(15, ' Matcha Milktea and Burgers ', ' pinag hiwalay yung milk saka tea ', 'Social Media', ' masarap pala sulit ', 'false'),
(16, ' test ', ' test ', 'Customer Survey', ' test ', 'false'),
(17, ' test2 ', ' test2 ', 'Social Media', ' test2 ', 'false'),
(18, '  Milktea matabang Okinawa  ', '  Matabang daw yung okinawa  ', 'Social Media', ' The new flavor is good ', 'false'),
(19, ' Matcha Milktea ', ' Malamig na milktea ', 'Customer Survey', ' masarap naman ', 'false'),
(20, ' Matcha Milktea ', ' Matcha with milktea ', 'Online Forum', ' ang galing ', 'false'),
(21, ' Matcha Milktea ', ' Matcha with milktea ', 'Online Forum', ' masarap pala ', 'false'),
(22, ' test3 ', ' test3 ', 'Social Media', ' test3 ', 'false'),
(23, ' Matcha Milktea ', ' Matcha with milktea ', 'Online Forum', ' masarap pala ', 'false'),
(24, ' Milktea na Malamig ', ' Malamig na milktea ', 'Online Forum', ' masarap pala sulit ', 'false'),
(25, ' milktea taho ', ' milktea na may taho ', 'Social Media', ' masarap pala ', 'false'),
(26, ' Krusty crab ', ' Crabby patty ', 'Online Forum', ' good ', 'false'),
(27, ' Milktea Sago ', ' Milktea Sago ', 'Online Forum', ' Milktea Sago ', 'false'),
(28, ' milktea taho ', ' Matcha with milktea ', 'Online Forum', ' ang galing ', 'false');

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
(26, 'KENNETH DELA CRUZ BONITA', '2023-03-12 08:12:27', 3, 4, 5, NULL, 16),
(27, '', '2023-03-12 08:27:09', 3, 4, 3, NULL, 16),
(28, 'survey_db', '2023-03-12 08:58:36', 2, 1, 4, 'false', 5),
(30, '', '2023-03-24 10:07:46', 4, 4, 4, 'false', 23);

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
(74, 'kenneth.bonita07@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-13 01:27:46', '13-03-2023 06:59:17 AM', 1);

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
(20, 'Bonita, Kenneth D.', 'kenneth.bonita07@gmail.com', 909090909, 'cc03e747a6afbbcbf8be7668acfebee5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 04:27:05', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_ingredient`
--
ALTER TABLE `tbl_ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_research`
--
ALTER TABLE `tbl_research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
