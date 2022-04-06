-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2022 at 05:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compass`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(25, 'Lord noble'),
(26, 'Avril à moi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(12, 'Clothes'),
(13, 'Electronics'),
(14, 'Accessories'),
(15, 'Cosmetics'),
(16, 'Bags'),
(17, 'Shoes'),
(18, 'Hair care');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_contact` int(11) NOT NULL,
  `customer_pass` varchar(150) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_contact`, `customer_pass`, `user_role`) VALUES
(2, 'teta', 'teta@gmail.com', 0, '$2y$10$TWLGy88q1orXj4ttzXAILe0TUYITzdJ7p/kTJ0BQ6dIenXEl7pNDG', 1),
(3, 'kamanzi', 'kamanzi@gmail.com', 0, '$2y$10$Hyce0wTR5MBz2MdEeyDRSufhEZxyBAqr28wI4VLjY/t43YhlRvDKy', 1),
(4, 'admin', 'admin@gmail.com', 0, '$2y$10$pqTNdyETQXaGfptiKVSpquO4ULP3rAQfrEwSiYQPKFATnUCnrkaTq', 0),
(6, 'Uwimana Mico', 'uwimana.mico@gamil.com', 0, '$2y$10$YrLFhRsIhDUXnbUsw7Z44OaQSCW0sV2N4CDgqV7mx1lkQUTI6S2Hq', 1),
(8, 'Sheila Bwiza', 'sheila.bwiza@gmail.com', 0, '$2y$10$F1WLnqe5NvlHXl2u6Sjl3ueFVB56Ee1yhFtW.NlmNmuYFt89cPZYm', 1),
(11, 'Alona Comfort', 'alona@gmail.com', 591860712, '$2y$10$o7Lc5H8j8aM0l.p7ioZARedE.L9qxgdFNOv/93bzEAGvbPzQXbiK.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `amount` double NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `am't` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` varchar(500) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_keywords` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `stock`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(11, 12, 25, 'Lord Noble pants', 2, 10000, 'Clothes', '../images/products/Revolution logo.jpg', 'pants'),
(12, 15, 25, 'Avril à Moi dress', 2, 7000, 'dress', '../images/products/avril à moi dress.png', 'dress'),
(13, 12, 25, 'Bags and Beyond', 2, 6000, 'bags', '../images/products/flove tote.png', 'bags'),
(14, 15, 25, 'Manidi250', 2, 10000, 'shoes', '../images/products/manidi shoes.png', 'shoes'),
(15, 14, 25, 'Espresso Lip Balm', 2, 3000, 'lip balm', '../images/products/Espresso-Lipbalm.jpg', 'lip balm'),
(16, 12, 25, 'Iraba hair moisturizer', 2, 12000, 'Hair Butter', '../images/products/iraba hair care.png', 'hair butter'),
(17, 16, 26, 'Higk bracelet', 2, 7000, 'This is minimalist ring is made of sterling silver. It is light, yet durable. ', '../images/products/hiighk bracelete.png', 'minimalist'),
(18, 16, 26, 'Revolution', 0, 8000, 'New collection name derived from Kinyarwanda "kwanda" meaning expansion. We use this to teach people who are not familiar with the Rwandan culture or history. \r\n', '../images/products/revolution t-shirt.png', 't-shirt'),
(19, 16, 26, 'Zirconia Ring', 0, 15000, 'This ring is made of sterling silver and zirconia. Idea for an affordable engagement or promise ring.\r\n', '../images/products/zirconia.jpg', 'zirconia'),
(20, 16, 26, 'Revolve ring', 0, 25000, 'This ring is made of thick sterling silver sheet revolving around itself.', '../images/products/revolve.jpg', 'ring'),
(21, 16, 26, 'Mini-Me Ring', 0, 6000, 'This ring is made of a thin ring of sterling silver. It looks best when one wears a number of them as knuckle rings on different fingers. ', '../images/products/mini-me.jpg', 'Mini-Me'),
(22, 16, 26, 'Loop Ring', 0, 8000, 'This ring is made of a thin whoop of sterling silver which loops around itself. The number of whoops can vary depending on the client’s wishes.', '../images/products/loop.jpg', 'ring'),
(23, 16, 26, 'Love Ring', 0, 8000, 'This ring is made of a thin string of sterling silver, embellished with a hollow heart shape also made out of sterling silver. \r\n', '../images/products/love.jpg', 'ring'),
(24, 16, 26, 'Reindeer Ring', 0, 10000, 'This ring is made of sterling silver, with a reindeer horn design in its center', '../images/products/reindeer.jpg', 'ring'),
(25, 16, 26, 'Bauhaus Ring I', 0, 15000, 'This ring is made of sterling silver. Its design is inspired by the Bauhaus art and design movement ', '../images/products/bauhausI.jpg', 'ring'),
(26, 16, 26, 'Bauhaus Ring II', 0, 15000, 'This ring is made of sterling silver. Its design is inspired by the Bauhaus art and design movement\r\n', '../images/products/bauhausII.png', 'ring'),
(27, 16, 26, 'Stacklable Ring', 0, 20000, 'This ring is made of many sterling silver bands. The customer may customize the ring to have as many stackable bands as they want.\r\n', '../images/products/stackable.jpg', 'ring'),
(28, 16, 26, 'Lava Tree Ring', 0, 15000, 'This bold ring is made of a sterling silver band and a large lava rock engulfed in tree branches made of sterling silver wires. ', '../images/products/lava_tree.jpg', 'ring'),
(29, 17, 26, 'Healing Lava Bracelet', 0, 7000, 'This bracelet is made of ring is made of lava beads and an assortment of different bead spacers. The pores in the lava beads are filled with aroma-therapeutic essential oils.\r\n', '../images/products/bracelet.jpg', 'bracelet'),
(30, 18, 26, 'Healing lava Necklace', 0, 15000, 'This necklace is made of a thin sterling silver chain embellished with a lava bead. This bead is filled with aroma-therapeutic essential oils. \r\n', '../images/products/healing_necklace.jpg', 'Necklace');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `p_id` (`p_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
