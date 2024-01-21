-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 08:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finish_products`
--

INSERT INTO `finish_products` (`id`, `finishProdId`, `finishProdUId`, `finishProdName`, `finishProdTotalRawMaterials`, `finishProdQuantity`, `finishProdDateCreated`) VALUES
(1, 'PROD-001', '7100c819d16242cb67ea7f4fb315d31b', '131313131', 1, 5, '2023-11-26 14:32:28'),
(2, 'PROD-002', '81976a6726da9cd68cc1921ae1562172', 'Product #2', 2, 0, '2023-11-26 15:15:41');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finish_products_materials`
--

INSERT INTO `finish_products_materials` (`id`, `finishProdMaterialUId`, `finishProdUId`, `materialUId`, `finishProdMaterialQty`, `finishProdMaterialDateCreated`) VALUES
(1, '81921de7066c55ae805deb813b6a80f9', '81921de7066c55ae805deb813b6a80f9', '9fd45c0c143882aca268d67156ddb268', 1, '2023-11-26 14:30:31'),
(2, '7100c819d16242cb67ea7f4fb315d31b', '7100c819d16242cb67ea7f4fb315d31b', '9fd45c0c143882aca268d67156ddb268', 1, '2023-11-26 14:32:28'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `materialId`, `materialUId`, `materialStatus`, `materialName`, `materialCategory`, `materialUnit`, `materialQuantity`, `materialSupplier`, `materialDateCreated`) VALUES
(1, 'MID-001', 'f2ee9768bc4102e08d33cb7e19cc41cd', 0, 'BR-0150/BR0100', 'Categiry 1', '1', 0, '1', '2023-11-05 21:53:04'),
(2, 'MID-002', '9fd45c0c143882aca268d67156ddb268', 0, 'EPT-3062EM', 'Category 2', '1', 1, '1', '2023-11-05 22:38:55');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `purchaseOrderId`, `purchaseOrderUId`, `purchaseOrderStatus`, `purchaseOrderNo`, `purchaseOrderRawMaterial`, `purchaseOrderDateReceived`, `purchaseOrderSupplier`, `purchaseOrderQuantity`, `purchaseOrderPrice`, `purchaseOrderDateCreated`) VALUES
(1, 'PO-001', 'af6d2fef88cd64c8729e286b1504de07', 0, '13', '', '2023-12-28', '13', 1, 0, '2023-12-28 21:58:51'),
(2, 'PO-002', 'b5e7fec2c3f18c66ec8531bd7e838a36', 0, '13', '', '2023-12-29', '13', 1, 0, '2023-12-29 19:31:27'),
(3, 'PO-003', '5ad662f371f2b1ba5dc224775586663d', 0, '13', '', '2023-12-29', '13', 1, 0, '2023-12-29 19:32:21'),
(4, 'PO-004', '5d175c19e1866c26d9da9da479e61ee4', 0, '13', '', '2023-12-29', '13', 1, 0, '2023-12-29 19:34:13'),
(5, 'PO-005', 'c119c7c11603f66d2f700789e25768f2', 0, '13', '', '2023-12-29', '13', 1, 0, '2023-12-29 19:44:45'),
(6, 'PO-006', '1ee114f6e36f6dc69071cfb070e54e9d', 0, '123', '', '2023-12-29', '123', 1, 0, '2023-12-29 19:49:20'),
(7, 'PO-007', '598e092e0643b195a56002576552c47d', 0, '1133', '', '2023-12-29', '1133', 1, 0, '2023-12-29 19:50:00'),
(8, 'PO-008', 'ae4bbf59c632f5aaaf52fb09a3b86a63', 0, '1321312', '', '2023-12-29', 'Lawrence', 1, 0, '2023-12-29 19:51:35'),
(9, 'PO-009', '08495f9d140d7f2f0b459b664c28da0d', 0, '13', '', '2023-12-29', 'Try', 1, 0, '2023-12-29 19:54:26'),
(10, 'PO-010', '9a1e834eddc9f5e4a602f87bd60b6b57', 0, '1234', '', '2023-12-29', 'Pam', 2, 0, '2023-12-29 19:57:49'),
(11, 'PO-011', '1d0a648a2516b4bb2f36d725344cbb86', 0, '11331133', '', '2023-12-29', 'Test1133', 1, 0, '2023-12-29 19:59:24'),
(12, 'PO-012', '68e9aabdcf9c38df1758dfc5530c273b', 0, 'Test', '', '2023-12-29', 'Test', 1, 0, '2023-12-29 20:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders_products`
--

CREATE TABLE `purchase_orders_products` (
  `id` int(11) NOT NULL,
  `purchaseProdUId` varchar(250) NOT NULL,
  `purchaseOrderUId` varchar(250) NOT NULL,
  `finishProdUId` varchar(250) NOT NULL,
  `purchaseProdQty` int(11) NOT NULL,
  `purchaseProdDateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_orders_products`
--

INSERT INTO `purchase_orders_products` (`id`, `purchaseProdUId`, `purchaseOrderUId`, `finishProdUId`, `purchaseProdQty`, `purchaseProdDateCreated`) VALUES
(1, '9a1e834eddc9f5e4a602f87bd60b6b57', '9a1e834eddc9f5e4a602f87bd60b6b57', '81976a6726da9cd68cc1921ae1562172', 20, '2023-12-29 19:57:49'),
(2, '9a1e834eddc9f5e4a602f87bd60b6b57', '9a1e834eddc9f5e4a602f87bd60b6b57', '7100c819d16242cb67ea7f4fb315d31b', 2, '2023-12-29 19:57:49'),
(3, '68e9aabdcf9c38df1758dfc5530c273b', '68e9aabdcf9c38df1758dfc5530c273b', '7100c819d16242cb67ea7f4fb315d31b', 3, '2023-12-29 20:02:37');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userId` varchar(250) NOT NULL,
  `userUId` varchar(250) NOT NULL,
  `userType` varchar(250) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `userFirstName` varchar(250) NOT NULL,
  `userLastName` varchar(250) NOT NULL,
  `userEmail` varchar(250) NOT NULL,
  `userPassword` varchar(250) NOT NULL,
  `userCPassword` varchar(250) NOT NULL,
  `userDateCreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `userUId`, `userType`, `userStatus`, `userFirstName`, `userLastName`, `userEmail`, `userPassword`, `userCPassword`, `userDateCreated`) VALUES
(1, 'UID-001', '181dd3221a6ef729cd8d92f225c46c03', 'User', 0, 'Juan', 'Dela Cruz', 'Juan@email.com', '$2y$10$VJXTtJeBbi2vKrflQl3bBOc/BTooKUVrGO2cUJWzLXIKo1w1yNvDu', '$2y$10$VJXTtJeBbi2vKrflQl3bBOc/BTooKUVrGO2cUJWzLXIKo1w1yNvDu', '2024-01-07');

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
-- Indexes for table `purchase_orders_products`
--
ALTER TABLE `purchase_orders_products`
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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase_orders_products`
--
ALTER TABLE `purchase_orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
