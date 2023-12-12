-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 05:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supplymanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `activityLogsId` varchar(250) NOT NULL,
  `activityLogsUniqueId` varchar(250) NOT NULL,
  `activityLogsDone` varchar(250) NOT NULL,
  `activityLogsDateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryId` varchar(250) NOT NULL,
  `categoryUId` varchar(250) NOT NULL,
  `categoryStatus` int(11) NOT NULL,
  `categoryName` varchar(250) NOT NULL,
  `categoryDesc` varchar(250) NOT NULL,
  `categoryDateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryId`, `categoryUId`, `categoryStatus`, `categoryName`, `categoryDesc`, `categoryDateCreated`) VALUES
(1, 'CAT-001', '4c90acc0b6fb14587cdf5ade5e220b03', 0, 'Polymer', 'Polymer', '2023-11-04 16:11:46'),
(2, 'CAT-002', 'ab54fb4ba2acd0d32d13c403d241d1a0', 0, 'Filler / Hardener', 'Filler / Hardener', '2023-11-04 16:12:17'),
(3, 'CAT-003', '164e647213187cfb2768224b406684c7', 0, 'Processing Aid / Lubricant', 'Processing Aid / Lubricant', '2023-11-04 16:13:11'),
(4, 'CAT-004', 'c71e2bd3dadcef213fcc4850758201a4', 0, 'Anti-Oxidant', 'Anti-Oxidant', '2023-11-04 16:13:23'),
(5, 'CAT-005', 'f2ef846b6bc48e5fe06188887afa7f05', 0, 'Chemicals', 'Chemicals', '2023-11-04 16:13:30'),
(6, 'CAT-006', '00abc6577fc9fcf4321623ca31e5adc8', 0, 'CMB', 'CMB', '2023-11-04 16:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `finish_products`
--

CREATE TABLE `finish_products` (
  `id` int(11) NOT NULL,
  `finishProdId` varchar(250) NOT NULL,
  `finishProdUId` varchar(250) NOT NULL,
  `finishProdName` varchar(250) NOT NULL,
  `finishProdTotalRawMaterials` int(11) NOT NULL,
  `finishProdQuantity` int(11) NOT NULL,
  `finishProdDateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finish_products`
--

INSERT INTO `finish_products` (`id`, `finishProdId`, `finishProdUId`, `finishProdName`, `finishProdTotalRawMaterials`, `finishProdQuantity`, `finishProdDateCreated`) VALUES
(1, 'PROD-001', '7100c819d16242cb67ea7f4fb315d31b', '131313131', 1, 2, '2023-11-26 14:32:28'),
(2, 'PROD-002', '81976a6726da9cd68cc1921ae1562172', 'Product #2', 2, 2, '2023-11-26 15:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `finish_products_materials`
--

CREATE TABLE `finish_products_materials` (
  `id` int(11) NOT NULL,
  `finishProdMaterialUId` varchar(250) NOT NULL,
  `finishProdUId` varchar(250) NOT NULL,
  `materialUId` varchar(250) NOT NULL,
  `finishProdMaterialQty` int(11) NOT NULL,
  `finishProdMaterialDateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finish_products_materials`
--

INSERT INTO `finish_products_materials` (`id`, `finishProdMaterialUId`, `finishProdUId`, `materialUId`, `finishProdMaterialQty`, `finishProdMaterialDateCreated`) VALUES
(1, '81921de7066c55ae805deb813b6a80f9', '81921de7066c55ae805deb813b6a80f9', '9fd45c0c143882aca268d67156ddb268', 1, '2023-11-26 14:30:31'),
(2, '7100c819d16242cb67ea7f4fb315d31b', '7100c819d16242cb67ea7f4fb315d31b', '9fd45c0c143882aca268d67156ddb268', 2, '2023-11-26 14:32:28'),
(3, '81976a6726da9cd68cc1921ae1562172', '81976a6726da9cd68cc1921ae1562172', '9fd45c0c143882aca268d67156ddb268', 1, '2023-11-26 15:15:41'),
(4, '81976a6726da9cd68cc1921ae1562172', '81976a6726da9cd68cc1921ae1562172', 'f2ee9768bc4102e08d33cb7e19cc41cd', 2, '2023-11-26 15:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `materialId` varchar(250) NOT NULL,
  `materialUId` varchar(250) NOT NULL,
  `materialStatus` int(11) NOT NULL,
  `materialName` varchar(250) NOT NULL,
  `materialCategory` varchar(250) NOT NULL,
  `materialUnit` varchar(250) NOT NULL,
  `materialQuantity` int(11) NOT NULL,
  `materialSupplier` varchar(250) NOT NULL,
  `materialDateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `materialId`, `materialUId`, `materialStatus`, `materialName`, `materialCategory`, `materialUnit`, `materialQuantity`, `materialSupplier`, `materialDateCreated`) VALUES
(1, 'MID-001', 'f2ee9768bc4102e08d33cb7e19cc41cd', 0, 'BR-0150/BR0100', 'Categiry 1', '1', 2, '1', '2023-11-05 21:53:04'),
(2, 'MID-002', '9fd45c0c143882aca268d67156ddb268', 0, 'EPT-3062EM', 'Category 2', '1', 2, '1', '2023-11-05 22:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_deliveries`
--

CREATE TABLE `order_deliveries` (
  `id` int(11) NOT NULL,
  `orderDeliveryId` varchar(250) NOT NULL,
  `orderDeliveryUId` varchar(250) NOT NULL,
  `orderDeliveryOrderNo` varchar(250) NOT NULL,
  `orderDeliverySupplier` varchar(250) NOT NULL,
  `orderDeliveryTotalProd` int(11) NOT NULL,
  `orderDeliveryDateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_deliveries`
--

INSERT INTO `order_deliveries` (`id`, `orderDeliveryId`, `orderDeliveryUId`, `orderDeliveryOrderNo`, `orderDeliverySupplier`, `orderDeliveryTotalProd`, `orderDeliveryDateCreated`) VALUES
(1, 'OD-001', '16e5c5793a10a940b4e654075fbb1569', '123', 'Supplier 13', 2, '2023-11-19 19:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_deliveries_materials`
--

CREATE TABLE `order_deliveries_materials` (
  `id` int(11) NOT NULL,
  `orderMaterialUId` varchar(250) NOT NULL,
  `orderDeliveryUId` varchar(250) NOT NULL,
  `materialUId` varchar(250) NOT NULL,
  `orderMaterialQty` int(11) NOT NULL,
  `orderMaterialDateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_deliveries_materials`
--

INSERT INTO `order_deliveries_materials` (`id`, `orderMaterialUId`, `orderDeliveryUId`, `materialUId`, `orderMaterialQty`, `orderMaterialDateCreated`) VALUES
(1, '16e5c5793a10a940b4e654075fbb1569', '16e5c5793a10a940b4e654075fbb1569', '9fd45c0c143882aca268d67156ddb268', 12, '2023-11-19 19:36:03'),
(2, '16e5c5793a10a940b4e654075fbb1569', '16e5c5793a10a940b4e654075fbb1569', 'f2ee9768bc4102e08d33cb7e19cc41cd', 13, '2023-11-19 19:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL,
  `purchaseOrderId` varchar(250) NOT NULL,
  `purchaseOrderUId` varchar(250) NOT NULL,
  `purchaseOrderStatus` int(11) NOT NULL,
  `purchaseOrderNo` varchar(250) NOT NULL,
  `purchaseOrderRawMaterial` varchar(250) NOT NULL,
  `purchaseOrderDateReceived` date NOT NULL DEFAULT current_timestamp(),
  `purchaseOrderSupplier` varchar(250) NOT NULL,
  `purchaseOrderQuantity` int(11) NOT NULL,
  `purchaseOrderPrice` int(11) NOT NULL,
  `purchaseOrderDateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `supplyId` varchar(250) NOT NULL,
  `supplyUId` varchar(250) NOT NULL,
  `supplyStatus` int(11) NOT NULL,
  `supplyRawMaterial` varchar(250) NOT NULL,
  `supplyCategory` varchar(250) NOT NULL,
  `supplyUnit` varchar(250) NOT NULL,
  `supplyStock` int(11) NOT NULL,
  `supplyDateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userUId` varchar(250) NOT NULL,
  `userFirstName` varchar(250) NOT NULL,
  `userLastName` varchar(250) NOT NULL,
  `userEmail` varchar(250) NOT NULL,
  `userPassword` varchar(250) NOT NULL,
  `userCPassword` varchar(250) NOT NULL,
  `userDateCreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userUId`, `userFirstName`, `userLastName`, `userEmail`, `userPassword`, `userCPassword`, `userDateCreated`) VALUES
(1, '', 'Juan', 'Dela Cruz', 'juan@email.com', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '2023-11-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finish_products`
--
ALTER TABLE `finish_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finish_products_materials`
--
ALTER TABLE `finish_products_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_deliveries`
--
ALTER TABLE `order_deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_deliveries_materials`
--
ALTER TABLE `order_deliveries_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `finish_products`
--
ALTER TABLE `finish_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finish_products_materials`
--
ALTER TABLE `finish_products_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_deliveries`
--
ALTER TABLE `order_deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_deliveries_materials`
--
ALTER TABLE `order_deliveries_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
