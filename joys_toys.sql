-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 10:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joys_toys`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountpayable`
--

CREATE TABLE `accountpayable` (
  `VendorName` varchar(50) NOT NULL,
  `AmountOwed` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountpayable`
--

INSERT INTO `accountpayable` (`VendorName`, `AmountOwed`) VALUES
('ABC Company', '5000.00'),
('XYZ Supplies', '2500.00'),
('DEF Distributors', '7500.00'),
('GHI Enterprises', '10000.00'),
('JKL Corporation', '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `accountreceivable`
--

CREATE TABLE `accountreceivable` (
  `newcustomer_id` int(100) DEFAULT NULL,
  `AmountOwed` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountreceivable`
--

INSERT INTO `accountreceivable` (`newcustomer_id`, `AmountOwed`) VALUES
(7, '1619.90'),
(8, '99.70'),
(8, '649.80'),
(9, '2149.80'),
(10, '19.95'),
(10, '64.94'),
(10, '399.90'),
(10, '149.90'),
(10, '39.90'),
(10, '14999.00'),
(4, '153.98'),
(11, '155.00'),
(11, '310.00'),
(12, '79.96');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admins_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admins_id`, `first_name`, `last_name`, `email`, `pass`, `reg_date`) VALUES
(1, 'Samia', 'Kayass', 'skayass@gtcc.edu', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-21 17:08:41'),
(2, 'Tom', 'Smith', 'tsmith@joystoys.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-21 23:12:20'),
(3, 'Tom', 'ks', 'samy@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-21 23:37:12'),
(5, 'joy', 'Johnson', 'jjohnson@joytoy.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-22 15:12:23'),
(6, 'Peter', 'Parker', 'PParker@joytoy.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-25 15:17:18'),
(7, 'hi', 'smith', 'hi@gtcc.edu', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-05-03 15:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `CartID` int(11) NOT NULL,
  `newcustomer_id` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`CartID`, `newcustomer_id`, `ProductID`, `Quantity`, `Price`) VALUES
(18, 9, 1, 10, '149.99'),
(20, 9, 1, 50, '149.99');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'Samia Kayass', 'skayass@gtcc.edu', 'I need 15 barbie toys next sunday '),
(2, 'James Smith', 'jsmith@gmail.com', 'I am looking for a 1000 Chess set.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `PhoneNumber`, `EmailAddress`, `Address`) VALUES
(1, 'James', 'Doe', '555-123-4567', 'jdoe@gmail.com', '123 Main St, Anytown USA'),
(2, 'John', 'Smith', '555-987-6543', 'jsmith@gmail.com', '456 Elm St, Somewhere Else USA'),
(3, 'Bob', 'Johnson', '555-555-1212', 'bobjohnson@gmail.com', '789 Oak St, Nowhere USA'),
(4, 'Robet', 'Lee', '555-555-5555', 'robertlee@gmail.com', '321 Pine St, Anytown USA'),
(5, 'Harry', 'Chen', '555-777-8888', 'hchen@gmail.com', '555 Maple St, Anytown USA');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Responsability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `FirstName`, `LastName`, `Address`, `EmailAddress`, `PhoneNumber`, `Responsability`) VALUES
(1, 'Joy', 'Johnson', '123 Main St, Anytown USA', 'jjohnson@joytoy.com', '555-123-4567', 'Selling and Managing the store'),
(2, 'Peter', 'Parker', '456 Elm St, Somewhere Else USA', 'pparker@joytoy.com', '555-987-6543', 'Marketing Specialist'),
(3, 'Gwen', 'Stacey', '789 Oak St, Nowhere USA', 'gstacey@joytoy.com', '555-555-1212', 'Stock'),
(4, 'Jason', 'Smith', '321 Pine St, Anytown USA', 'jsmith@joytoy.com', '555-555-5555', 'Inventory control'),
(5, 'Bea', 'Bernard', '555 Maple St, Anytown USA', 'bbernard@joytoy.com', '555-777-8888', 'Payroll and Accounts payable');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ProductID`, `Quantity`) VALUES
(1, 199),
(2, 170),
(3, 50),
(4, 18),
(5, 50),
(6, 150),
(7, 16),
(8, 140),
(9, 55),
(10, 49),
(11, 99);

-- --------------------------------------------------------

--
-- Table structure for table `newcustomers`
--

CREATE TABLE `newcustomers` (
  `newcustomer_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newcustomers`
--

INSERT INTO `newcustomers` (`newcustomer_id`, `first_name`, `last_name`, `email`, `pass`, `reg_date`) VALUES
(1, 'Tom', 'ko', 'tko@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-21 23:39:24'),
(2, 'Dan', 'Johnson', 'jdan@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-22 00:01:49'),
(3, 'Aron', 'Smith', 'asmith@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-22 00:04:42'),
(4, 'tawfik', 'el', 'tel@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-22 00:07:25'),
(5, 'Jones', 'Garcia', 'jgarcia@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-22 15:05:21'),
(6, 'Maha', 'Smith', 'maha@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-22 21:35:49'),
(7, 'Tom', 'ks', 'tom@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-24 17:27:00'),
(8, 'samy', 'Smith', 'samy@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-24 18:16:21'),
(9, 'James', 'Madison', 'madison@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-25 00:43:38'),
(10, 'Robert', 'Smith', 'Robert@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-03-25 14:14:58'),
(11, 'samy', 'ks', 'ks@gtcc.edu', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-05-03 15:11:25'),
(12, 'Spring', 'wt', 'wt@gtcc.edu', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-05-03 16:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `newcustomer_id` int(11) DEFAULT NULL,
  `OrderDate` date NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `ProductID`, `newcustomer_id`, `OrderDate`, `Quantity`, `TotalAmount`) VALUES
(1, 1, 4, '2023-03-22', 8, '1199.92'),
(2, 1, 4, '2023-03-22', 5, '749.95'),
(3, 3, 4, '2023-03-22', 2, '399.98'),
(4, 7, 4, '2023-03-22', 6, '119.94'),
(5, 1, 5, '2023-03-22', 5, '749.95'),
(6, 11, 5, '2023-03-22', 4, '15.96'),
(7, 12, 5, '2023-03-22', 4, '48.00'),
(8, 12, 6, '2023-03-23', 1, '12.00'),
(9, 11, 6, '2023-03-23', 15, '59.85'),
(10, 1, 4, '2023-03-24', 4, '599.96'),
(11, 1, 4, '2023-03-24', 3, '449.97'),
(12, 7, 4, '2023-03-24', 4, '79.96'),
(13, 12, 4, '2023-03-24', 8, '96.00'),
(14, 5, 4, '2023-03-24', 1, '2.99'),
(15, 1, 4, '2023-03-24', 3, '449.97'),
(16, 12, 4, '2023-03-24', 4, '48.00'),
(17, 1, 7, '2023-03-24', 3, '449.97'),
(18, 12, 7, '2023-03-24', 3, '36.00'),
(19, NULL, 7, '2023-03-24', 0, '1619.90'),
(20, NULL, 7, '2023-03-24', 0, '1619.90'),
(21, NULL, 7, '2023-03-24', 0, '1619.90'),
(22, NULL, 7, '2023-03-24', 0, '1619.90'),
(23, NULL, 8, '2023-03-24', 0, '99.70'),
(24, NULL, 8, '2023-03-24', 0, '649.80'),
(25, NULL, 9, '2023-03-25', 0, '2149.80'),
(26, NULL, 10, '2023-03-25', 0, '19.95'),
(27, NULL, 10, '2023-03-25', 0, '64.94'),
(28, NULL, 10, '2023-03-25', 0, '399.90'),
(29, NULL, 10, '2023-03-25', 0, '149.90'),
(30, NULL, 10, '2023-03-25', 0, '39.90'),
(31, NULL, 10, '2023-03-26', 0, '14999.00'),
(32, NULL, 4, '2023-03-26', 0, '153.98'),
(33, NULL, 11, '2023-05-03', 0, '155.00'),
(34, NULL, 11, '2023-05-03', 0, '310.00'),
(35, NULL, 12, '2023-05-03', 0, '79.96');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductImage` varchar(255) DEFAULT NULL,
  `Category` varchar(50) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `ProductImage`, `Category`, `Price`, `Quantity`) VALUES
(1, 'LEGO Star Wars Millennium Falcon', 'https://i.imgur.com/cToWKsL.jpeg', 'Toys', '149.99', 199),
(2, 'Nerf N-Strike Elite Disruptor', 'https://i.imgur.com/efdfmMh.jpeg', 'Toys', '14.99', 170),
(3, 'Barbie Dreamhouse', 'https://i.imgur.com/V6Ib56H.jpeg', 'Toys', '199.99', 40),
(4, 'Hot Wheels 20 Car Gift Pack', 'https://i.imgur.com/UkEU0CY.png', 'Toys', '19.99', 18),
(5, 'Play-Doh Classic Colors 4-Pack', 'https://i.imgur.com/xYKLYqb.jpeg', 'Toys', '2.99', 30),
(6, 'Ravensburger Disney Princess Puzzle', 'https://i.imgur.com/JODzaiz.jpeg', 'Puzzles', '24.99', 140),
(7, 'Melissa & Doug Farm Friends Hand Puppets', 'https://i.imgur.com/sry3K5q.jpeg', 'Puppets', '19.99', 16),
(8, 'Classic Games Collection Chess Set', 'https://i.imgur.com/nxgQP3J.jpeg', 'Classic Games', '39.99', 130),
(9, 'Classic Games Collection Checkers Set', 'https://i.imgur.com/jpKfR5y.jpeg', 'Classic Games', '9.99', 55),
(10, 'Classic Games Collection Parcheesi Set', 'https://i.imgur.com/AFdyjOL.jpeg', 'Classic Games', '14.99', 39),
(11, 'Bicycle Standard Playing Cards', 'https://i.imgur.com/kSn3kOe.jpeg', 'Playing Cards', '3.99', 99),
(12, 'Barbie Doll', 'https://imgur.com/SR58dlt.jpeg', 'Toys', '12.00', 10),
(14, 'Barbie', 'https://imgur.com/LWaA4JH.jpeg', 'Toys', '12.00', 7),
(15, 'Doll Clothes', 'https://imgur.com/ANik5o2.jpeg', 'Toys', '122.00', 4),
(16, 'Lego Car', 'https://i.imgur.com/RKqSDi0.jpeg', 'Toys', '155.00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `storeinformation`
--

CREATE TABLE `storeinformation` (
  `StoreName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `zipCode` varchar(20) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `StoreHours` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storeinformation`
--

INSERT INTO `storeinformation` (`StoreName`, `Address`, `City`, `zipCode`, `PhoneNumber`, `EmailAddress`, `StoreHours`) VALUES
('JoysToys', '123 Main St', 'Anytown', '12345', '555-123-4567', 'jtoys@joystoys.com', 'Mon-Fri: 9am-6pm, Sat: 10am-4pm, Sun: Closed');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `TransactionDate` date NOT NULL,
  `TransactionType` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `CustomerID`, `TransactionDate`, `TransactionType`, `Amount`) VALUES
(1, 2, '2022-01-01', 'PURCHASE', '150.00'),
(2, 1, '2022-01-03', 'PURCHASE', '75.00'),
(3, 3, '2022-01-05', 'REFUND', '50.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admins_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `newcustomer_id` (`newcustomer_id`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `newcustomers`
--
ALTER TABLE `newcustomers`
  ADD PRIMARY KEY (`newcustomer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `orders_ibfk_1` (`newcustomer_id`),
  ADD KEY `orders_ibfk_2` (`ProductID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admins_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `newcustomers`
--
ALTER TABLE `newcustomers`
  MODIFY `newcustomer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`newcustomer_id`) REFERENCES `newcustomers` (`newcustomer_id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_fk_product` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`newcustomer_id`) REFERENCES `newcustomers` (`newcustomer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
