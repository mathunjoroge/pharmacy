-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2017 at 09:24 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winsor`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date2` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount2` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `confirm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`transaction_id`, `date2`, `name`, `invoice`, `amount2`, `remarks`, `balance`, `type`, `confirm`) VALUES
(20, '02/15/2017', 'wikky', '', '231', '', 0, 'Mpesa', 'xzx');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `expected_date` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`, `prod_name`, `expected_date`, `note`) VALUES
(4, 'wikky', 'kisumu', '1111', '', '', '', ''),
(6, 'jamu', 'nakuru', '1546', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `idno` varchar(12) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `idno`, `qualifications`, `role`, `amount`) VALUES
(3, 'mathu njoroge', '2727', 'bpharm', 'admin', '2000000'),
(4, 'xtine', '5466', 'bpharm', 'cashier', '40000000'),
(5, 'wykky', '133', '', 'cashier', '4500000'),
(6, 'mmmm', '1111', 'bpharm', 'cashier', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `expenselist`
--

CREATE TABLE `expenselist` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `date` varchar(10) NOT NULL,
  `addedby` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenselist`
--

INSERT INTO `expenselist` (`id`, `name`, `date`, `addedby`) VALUES
(7, 'test', '16/01/2017', 'mathu'),
(8, 'electricity', '16/01/2017', 'mathu'),
(9, 'gabage collection', '18/01/2017', 'pamela'),
(10, 'water', '18/01/2017', 'pamela'),
(11, 'papers', '18/01/2017', 'pamela'),
(12, 'printing', '18/01/2017', 'pamela'),
(13, 'photocopy', '18/01/2017', 'pamela'),
(14, 'toiletry', '18/01/2017', 'pamela'),
(15, 'washing', '18/01/2017', 'pamela'),
(16, 'ba', '18/01/2017', 'pamela'),
(17, 'lll', '18/01/2017', 'pamela'),
(18, 'gabage collection', '21/01/2017', 'pamela'),
(19, 'new expense', '23/01/2017', 'pamela'),
(20, 'cleaning and', '23/01/2017', 'pamela'),
(21, 'another expense', '23/01/2017', 'pamela');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `recorded` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `name`, `amount`, `recorded`) VALUES
(3, '01/10/2017', 'electricity', 300, 'mathu'),
(4, '01/17/2017', 'test', 36500, 'pamela'),
(5, '01/17/2017', 'electricity', 368877, 'pamela'),
(6, '01/18/2017', 'gabage collection', 1, 'pamela'),
(7, '01/18/2017', 'photocopy', 10000, 'pamela'),
(8, '01/18/2017', 'electricity', 1000, 'kauti'),
(9, '01/21/2017', 'electricity', 1000, 'pamela'),
(10, '01/21/2017', 'papers', 1000, 'pamela'),
(11, '01/23/2017', 'new expense', 500, 'pamela'),
(12, '01/23/2017', 'cleaning and', 500, 'pamela'),
(13, '01/23/2017', 'another expense', 1000, 'pamela'),
(14, '01/28/2017', 'electricity', 10000, 'pamela'),
(15, '01/28/2017', 'water', 2000, 'pamela');

-- --------------------------------------------------------

--
-- Table structure for table `expiries`
--

CREATE TABLE `expiries` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expiries`
--

INSERT INTO `expiries` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(1, 'INV-3833234', '2', '10', '990', '510', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '99', '', ' 25/01/ 2017, Wednesday'),
(2, 'INV-02323', '2', '10', '990', '510', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '99', '', ' 25/01/ 2017, Wednesday'),
(3, 'INV-04383', '2', '10', '990', '510', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '99', '', ' 28/01/ 2017, Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `expiriestt`
--

CREATE TABLE `expiriestt` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `cashtendered` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expiriestt`
--

INSERT INTO `expiriestt` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `cashtendered`, `name`, `balance`) VALUES
(1, 'INV-3833234', 'pamela', '01/25/2017', 'cash', '990', '', '', '', ''),
(2, 'INV-02323', 'pamela', '01/25/2017', 'cash', '990', '', '', '', ''),
(3, 'INV-04383', 'pamela', '01/28/17', 'cash', '990', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `loginusers`
--

CREATE TABLE `loginusers` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `groupid` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginusers`
--

INSERT INTO `loginusers` (`ID`, `username`, `password`, `email`, `fullname`, `groupid`, `active`) VALUES
(2, 'pamela', 'pamela1974', 'null', 'null', 'null', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentid` int(10) NOT NULL,
  `date2` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount2` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `confirm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentid`, `date2`, `name`, `amount2`, `type`, `confirm`) VALUES
(13, '02/15/2017', 'Kentons Ltd', '10000', 'cash', 'cash'),
(14, '02/15/2017', 'Kentons Ltd', '10000', 'cash', 'cash'),
(15, '02/15/2017', 'jamu', '20000', 'cash', 'cash'),
(16, '02/15/2017', 'jamu', '20000', 'Mpesa', 'lakkmka'),
(17, '02/15/2017', 'Laborex Ltd', '2333', 'cash', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL,
  `opno` varchar(20) NOT NULL,
  `cashier` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `units` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`, `opno`, `cashier`, `type`, `units`) VALUES
(4, 'RS-3352328', '41', '10', '400', '', 'BENACOFF SYRUP', 'BENACOFF', ' PAEDIATRIC', '40', '', '11/01/2017', '', '', '', ''),
(5, 'RS-242309', '2', '10', '400', '', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '40', '', '11/01/2017', '', '', '', ''),
(6, 'RS-242309', '2', '10', '900', '', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '90', '', '11/01/2017', '', '', '', ''),
(7, 'RS-2023352', '1', '10', '400', '', 'TRIHISTAMIN SYRUP 100ML', 'TRIHISTAMIN', 'COUGH SYRUP', '40', '', '11/01/2017', '', '', '', ''),
(8, 'INV-335833', '2', '10', '400', '', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '40', '', '14/01/2017', '', '', '', ''),
(9, 'INV-6202', '2', '7', '87', '', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '12.428571428571', '', '14/01/2017', '', '', '', ''),
(10, 'INV-6202', '5', '71', '64', '', 'UPACOF PLAIN', 'UPACOF', ' DROWSY-CPM/PROMETHAZINE ', '0.90140845070423', '', '14/01/2017', '', '', '', ''),
(11, 'INV-2022332', '4', '18', '87', '', 'UPACOF PAEDIATRIC', 'UPACOF', ' PAEDIATRIC ', '4.8333333333333', '', '14/01/2017', '', '', '', ''),
(12, 'INV-2022332', '4', '77', '60', '', 'UPACOF PAEDIATRIC', 'UPACOF', ' PAEDIATRIC ', '0.77922077922078', '', '14/01/2017', '', '', '', ''),
(13, 'INV-232603', '2', '2', '', '', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '0', '', '21/01/2017', '', '', '', ''),
(14, 'INV-00227', '3', '5', '', '', 'UPACOF DRY', 'UPACOF', 'DRY SYRUP-RED  ', '0', '', '21/01/2017', '', '', '', ''),
(15, 'INV-00538', '258', '18', '540', '', 'BET-23-BETAPYN TABS-18''S', 'BETAPYN', ' TABS    ', '30', '', '21/01/2017', '', '', '', ''),
(16, 'INV-3428349', '1', '10', '500', '', 'TRIHISTAMIN SYRUP 100ML', 'TRIHISTAMIN', 'COUGH SYRUP', '50', '', '21/01/2017', '', '', '', ''),
(17, 'INV-3428349', '258', '18', '540', '', 'BET-23-BETAPYN TABS-18''S', 'BETAPYN', ' TABS    ', '30', '', '21/01/2017', '', '', '', ''),
(18, 'INV-32004250', '258', '56', '100000', '', 'BET-23-BETAPYN TABS-18''S', 'BETAPYN', ' TABS       ', '1785.7142857143', '', '21/01/2017', '', '', '', ''),
(19, 'INV-874442', '2', '100', '500', '', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '5', '', '21/01/2017', '', '', '', ''),
(20, 'INV-4669333', '1', '10', '500', '', 'TRIHISTAMIN SYRUP 100ML', 'TRIHISTAMIN', 'COUGH SYRUP', '50', '', '21/01/2017', '', '', '', ''),
(21, 'INV-250693', '46', '10', '500', '', 'FLUGON P+ SYRUP', 'FLUGON', '120ML ', '50', '', '21/01/2017', '', '', '', ''),
(22, 'INV-250693', '4', '10', '58', '', 'UPACOF PAEDIATRIC', 'UPACOF', ' PAEDIATRIC ', '5.8', '', '21/01/2017', '', '', '', ''),
(23, 'INV-22020', '2', '1', '100', '', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '100', '', '21/01/2017', '', '', '', ''),
(24, 'INV-304020', '134', '10', '500', '', 'TETRACYCLINE SKIN OINTMENT', 'RACYCLINE', '20GM ', '50', '', '23/01/2017', '', '', '', ''),
(25, 'INV-2222302', '19', '10', '700', '', 'TRICOFF 60ML GREEN', 'TRICOFF', ' 60ML-GREEN ', '70', '', '23/01/2017', '', '', '', ''),
(26, 'INV-2222302', '2', '10', '800', '', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '80', '', '23/01/2017', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `onhand_qty` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `date_arrival` varchar(500) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `gen_name`, `product_name`, `cost`, `o_price`, `price`, `profit`, `supplier`, `onhand_qty`, `qty`, `qty_sold`, `expiry_date`, `date_arrival`, `level`) VALUES
(4, 'UPACOF PAEDIATRIC', 'UPACOF', ' PAEDIATRIC ', '', '99', '130', '31', 'Kentons Ltd', 0, 89, 6, 'JUNE  2019', '', ''),
(5, 'UPACOF PLAIN', 'UPACOF', ' DROWSY-CPM/PROMETHAZINE    ', '', '99', '130', '31', 'Kentons Ltd', 0, 328, 5, '', '', '50'),
(8, 'DELASED CHESTY', 'DELASED', 'CHESTY  ', '', '99', '130', '31', 'Kentons Ltd', 0, 1, 4, 'JUNE2019', '', ''),
(9, 'DAWAHIST  SYRUP', 'DAWAHIST', ' 100ML', '', '44.50', '100', '56', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(10, 'DAWAHIST 60ML', 'DAWAHIST', ' 60ML ', '', '33', '50', '17', 'Kentons Ltd', 0, 6, 7, 'Dec-22-2016', '', ''),
(12, 'CADISTIN SYRUP', 'CADISTIN', ' 100ML ', '', '77', '130', '53', 'Kentons Ltd', 0, 22, 22, 'Dec-22-2016', '', ''),
(13, 'COSCOF C LINCTUS SYRUP', 'COSCOF C', '100ML ', '', '135', '190', '55', 'Kentons Ltd', 0, 5, 5, 'Dec-22-2016', '', ''),
(14, 'BROMSAL EXPECTORANT', 'BROMSAL', ' 100ML ', '', '95', '130', '35', 'Kentons Ltd', 0, 45, 8, '', '', ''),
(15, 'TUSPEL PLUS SYRUP', 'TUSPEL', '100L ', '', '139', '200', '61', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(16, 'TUSPEL SYRUP', 'TUSPEL', ' 100ML', '', '144', '220', '76', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(17, 'TRICOFF 100ML GREEN', 'TRICOFF', ' 100ML-GREEN  ', '', '42', '100', '58', 'Kentons Ltd', 0, -1, 10, 'Dec-22-2016', '', ''),
(18, 'TRICOFF100ML RED', 'TRICOFF', '100ML-RED       ', '', '42', '100', '58', 'Kentons Ltd', 0, 8, 8, 'Dec-22-2016', '', ''),
(19, 'TRICOFF 60ML GREEN', 'TRICOFF', ' 60ML-GREEN ', '', '32', '60', '28', 'Kentons Ltd', 0, 31, 21, 'Dec-22-2016', '', ''),
(20, 'TRICOFF 60ML RED', 'TRICOFF', ' 60ML-RED ', '', '32', '60', '28', 'Kentons Ltd', 0, 11, 11, 'Dec-22-2016', '', ''),
(21, 'TRICOFF 60ML BLACK', 'TRICOFF', ' 60ML-BLACK ', '', '29', '50', '21', 'Kentons Ltd', 0, 0, 3, 'Dec-22-2016', '', ''),
(22, 'NOVACOFF SYRUP 500ML BLACK', 'TRICOFF', ' 500ML-BLACK ', '', '59', '80', '21', 'Kentons Ltd', 0, -1, 1, 'Dec-22-2016', '', ''),
(25, 'NOVACOFF SYRUP 500ML GREEN', 'OSSCOFF', ' 500ML-GREEN   ', '', '59', '80', '21', 'Kentons Ltd', 0, 7, 3, '', '', ''),
(26, 'TRIOHIST 100ML', 'TRIOHIST', ' 100ML ', '', '54', '120', '66', 'Kentons Ltd', 0, 5, 5, 'Dec-22-2016', '', ''),
(27, 'TRIOHIST 60ML', 'TRIOHIST', '60ML  ', '', '32', '60', '28', 'Kentons Ltd', 0, 0, 0, 'Dec-22-2016', '', ''),
(28, 'TRIHISTAMIN SYRUP ', 'TRIHISTAMIN', ' 60ML', '', '99', '120', '21', '', 0, 0, 0, 'Dec-22-2016', '', ''),
(29, 'TRICOHIST EXPECTORANT', 'TRICOHIST', ' 100ML', '', '77', '120', '43', 'Kentons Ltd', 0, 0, 0, 'Dec-22-2016', '', ''),
(30, 'TRICOHIST EXPECTORANT', 'TRICOHIST', ' 60ML', '', '65', '90', '25', 'Kentons Ltd', 0, 0, 0, 'Dec-22-2016', '', ''),
(31, 'TRIDEX COUGH MIXTURE', 'TRIDEX', '100ML ', '', '48', '100', '52', 'Kentons Ltd', 0, 0, 0, 'Dec-22-2016', '', ''),
(32, 'TRIDEX COUGH MIXTURE', 'TRIDEX', ' 60ML', '', '35', '60', '25', 'Kentons Ltd', 0, 0, 0, 'Dec-22-2016', '', ''),
(33, 'LUNAHIST EXPECTORANT', 'LUNAHIST', ' 100ML', '', '60', '100', '40', 'Kentons Ltd', 0, 1, 1, 'Dec-22-2016', '', ''),
(34, 'LUNAHIST EXPECTORANT', 'LUNAHIST', '60ML ', '', '39', '60', '21', 'Kentons Ltd', 0, 0, 0, 'Dec-22-2016', '', ''),
(35, 'COLDCAP ORIGINAL SYRUP', 'COLDCAP ORIGINAL', ' 100ML ', '', '99', '150', '51', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(36, 'COLDCAP SYRUP GENERIC', 'DACOLD', '100ML  ', '', '65', '100', '35', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(37, 'PARACETAMOL SYRUP', 'CURAMOL', ' 100ML ', '', '32', '70', '38', 'Kentons Ltd', 0, 4, 8, 'Dec-22-2016', '', ''),
(38, 'PARACETAMOL SYRUP', 'MAXADOL/CURAMOL', '60ML  ', '', '18.80', '50', '32', 'Kentons Ltd', 0, 15, 15, 'Dec-22-2016', '', ''),
(39, 'IBUPROFEN SYRUP', 'DAPROFEN', ' 100ML', '', '35', '80', '45', 'Kentons Ltd', 0, 5, 5, 'Dec-22-2016', '', ''),
(40, 'IBUPROFEN SYRUP', 'IBURIN', '60ML  ', '', '19.90', '50', '31', 'Kentons Ltd', 0, 2, 3, 'Dec-22-2016', '', ''),
(41, 'BENACOFF SYRUP', 'BENACOFF', ' PAEDIATRIC', '', '115', '150', '35', 'Kentons Ltd', 0, 11, 1, 'Dec-22-2016', '', ''),
(42, 'BENACOFF SYRUP', 'BENACOFF', ' LINCTUS', '', '115', '150', '35', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(43, 'BENASED SYRUP', 'BENASED', 'DRY-100ML ', '', '125', '180', '55', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(44, 'BENASED SYRUP', 'BENASED', ' PAEDIATRIC-100ML', '', '125', '180', '55', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(45, 'BENASED SYRUP', 'BENASED', ' CHESTY-100ML', '', '125', '180', '55', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(46, 'FLUGON P+ SYRUP', 'FLUGON', '120ML ', '', '159', '200', '41', 'Kentons Ltd', 0, 12, 2, 'Dec-22-2016', '', ''),
(47, 'FLUGON P+ SYRUP', 'FLUGON', '60ML ', '', '99', '150', '51', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(48, 'FLUGON DM SYRUP', 'FLUGON', ' 120ML', '', '159', '200', '41', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(50, 'ASTYMIN SYRUP', 'ASTYMIN', ' 200ML', '', '289', '400', '111', 'Kentons Ltd', 0, 1, 1, 'Dec-22-2016', '', ''),
(51, 'NUTRIVITA SYRUP', 'NUTRIVITA', ' 100ML ', '', '139', '200', '61', 'Kentons Ltd', 0, 1, 1, 'Dec-22-2016', '', ''),
(52, 'SCOTTS EMULSION', 'SCOTTS', ' ORANGE FLAVOUR-100ML', '', '288', '350', '62', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(53, 'SCOTTS EMULSION', 'SCOTTS', ' ORIGINAL-100ML', '', '288', '350', '62', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(54, 'BRUSTAN SUSPENSION', 'BRUSTAN', ' 100ML', '', '269', '350', '81', 'Kentons Ltd', 0, 1, 1, 'Dec-22-2016', '', ''),
(55, 'SEVEN SEAS OIL 100ML', 'SEVEN SEAS', '100ML  ', '', '375', '500', '125', 'kemsa', 0, 2, 2, 'Dec-22-2016', '', ''),
(56, 'SEVEN SEAS OIL', 'SEVEN SEAS', '170ML ', '', '625', '800', '175', 'kemsa', 0, 0, 0, 'Dec-22-2016', '', ''),
(57, 'CALPOL SYRUP', 'CALPOL', '60ML  ', '', '170', '220', '50', 'Kentons Ltd', 0, 4, 4, 'Dec-22-2016', '', ''),
(58, 'CALPOL SYRUP', 'CALPOL', '100ML ', '', '235', '320', '85', 'Kentons Ltd', 0, 0, 0, 'Dec-22-2016', '', ''),
(59, 'CYPROHEPTADINE HYDROCHRORIDE', 'PLACTINIC', ' 100ML', '', '200', '260', '60', 'Kentons Ltd', 0, 1, 1, 'Dec-22-2016', '', ''),
(60, 'ASCORYL EXPECTORANT', 'ASCORYL', ' 100ML ', '', '172', '240', '68', 'Kentons Ltd', 0, 3, 4, 'Dec-22-2016', '', ''),
(61, 'OSFERON SYRUP', 'OSFERON', ' 200ML', '', '199', '300', '101', 'Kentons Ltd', 0, 1, 1, 'Dec-22-2016', '', ''),
(62, 'RANFERON  SYRUP', 'RANFERON', '200ML  ', '', '299', '380', '81', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(63, 'SAFERON SYRUP', 'SAFERON', '150ML  ', '', '370', '480', '110', 'Kentons Ltd', 0, 28, 2, '', '', ''),
(64, 'FERRO B SYRUP 100ML SYRUP', 'FERRO B', ' 100ML ', '', '49.90', '100', '51', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(65, 'FERRO B 60ML SYRUP', 'FERRO B', '60ML  ', '', '33.90', '70', '37', 'Kentons Ltd', 0, 8, 8, 'Dec-22-2016', '', ''),
(66, 'BONNISAN SYRUP', 'BONNISAN', ' 120ML', '', '260', '320', '60', 'Kentons Ltd', 0, 8, 9, 'Dec-22-2016', '', ''),
(67, 'GRIPE WATER', 'GRIPE WATER', ' 100ML ', '', '36', '100', '64', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(68, 'GRIPE WATER', 'GRIPE WATER', ' 60ML', '', '29.90', '60', '31', 'Kentons Ltd', 0, 0, 0, 'Dec-22-2016', '', ''),
(69, 'GOOD MORNING  LUNG TONIC', 'GOOD MORNING', ' 50ML ', '', '69.90', '100', '31', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(70, 'MULTIVIT SYRUP 60ML DAWAVITE', 'DAWAVITE', '60ML  ', '', '19.90', '50', '31', 'Kentons Ltd', 0, 25, 25, 'Dec-22-2016', '', ''),
(71, 'MULTIVIT SYRUP 100ML DAWAVIT', 'DAWAVITE', ' 100ML ', '', '33', '100', '67', 'Kentons Ltd', 0, 7, 8, 'Dec-22-2016', '', ''),
(72, 'MULTIVIT SYRUP 100ML RINAVIT', 'RINAVIT', '100ML  ', '', '39', '100', '61', 'Kentons Ltd', 0, 4, 4, 'Dec-22-2016', '', ''),
(73, 'MULTIVIT SYRUP 100ML RINAVIT', 'RINAVIT', ' 60ML ', '', '24', '50', '26', 'Kentons Ltd', 0, 0, 0, 'Dec-22-2016', '', ''),
(74, 'TAMEDOL EXTRA SYRUP', 'TAMEDOL', '60ML ', '', '44', '80', '36', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(75, 'METRONIDAZOLE SYRUP', 'TRICOZOLE', '100ML  ', '', '33', '100', '67', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(76, 'METRONIDAZOLE SYRUP', 'TRICOZOLE', '60ML  ', '', '20.90', '50', '30', 'Kentons Ltd', 0, 24, 24, 'Dec-22-2016', '', ''),
(77, 'CETRIZINE SYRUP', 'RINACET', ' 60ML ', '', '29.90', '50', '21', 'Kentons Ltd', 0, 32, 32, 'Dec-22-2016', '', ''),
(78, 'CHLORPHENIRAMINE', 'FENAMINE', '60ML ', '', '19.90', '40', '21', 'Kentons Ltd', 0, 16, 16, 'Dec-22-2016', '', ''),
(79, 'MEDISTOP SYRUP', 'MEDISTOP', '60ML ', '', '37', '60', '23', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(80, 'BUSCOPAN SYRUP', 'NOSPASUM', ' 60ML', '', '39', '80', '41', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(81, 'NYSTATIN ORAL DROP', 'NYSTATIN', '30ML /12ML ', '', '39', '60', '21', 'Kentons Ltd', 0, 8, 8, 'Dec-22-2016', '', ''),
(83, 'METOCLOPRAMIDE SYRUP', 'EMETOP', '60ML ', '', '59', '80', '21', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(84, 'MEBENDAZOLE SYRUP', 'WORMEX', ' 30ML', '', '19.50', '50', '31', 'Kentons Ltd', 0, 3, 3, 'Dec-22-2016', '', ''),
(85, 'ALBENDAZOLE SYRUP', 'ABZ', '10ML ', '', '29.90', '50', '21', 'Kentons Ltd', 0, 5, 5, 'Dec-22-2016', '', ''),
(86, 'ALBENDAZOLE SYRUP', 'TANZOL', ' 10ML ', '', '16.90', '40', '24', 'Kentons Ltd', 0, 0, 0, 'Dec-22-2016', '', ''),
(87, 'SALBUTAMOL SYRUP', 'VENTIL', '60ML  ', '', '19.90', '50', '31', 'Kentons Ltd', 0, 1, 1, 'Dec-22-2016', '', ''),
(88, 'LACTULOSE SYRUP', 'LACTULAC', ' 100ML', '', '199', '250', '51', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(89, 'OSSTHIOL SYRUP', 'OSSTHIOL', '100ML ', '', '189', '240', '51', 'Kentons Ltd', 0, 1, 1, 'Dec-22-2016', '', ''),
(90, 'ZEDEX SYRUP', 'ZEDEX', '100ML ', '', '179', '200', '21', 'Kentons Ltd', 0, 1, 1, 'Dec-22-2016', '', ''),
(91, 'DACOF DRY', 'DACOF', 'EXPECTORANT  ', '', '115', '180', '65', 'Kentons Ltd', 0, 2, 2, 'Dec-22-2016', '', ''),
(92, 'DACOF EXPECTORANT', 'DACOF', 'EXPECTORANT COUGH  ', '', '115', '180', '65', 'Kentons Ltd', 0, 1, 1, 'Dec-22-2016', '', ''),
(93, 'HYDROCORTISON CREAM', 'ELYCORT', '15 ', '', '55', '70', '15', 'Kentons Ltd', 0, 1, 1, 'Dec-23-2016', '', ''),
(94, 'HYDROCORTISON CREAM', 'OLCORT', '15GM  ', '', '25', '50', '25', 'Kentons Ltd', 0, 15, 15, 'Dec-23-2016', '', ''),
(95, 'UNISTEN HC CREAM', 'UNISTEN', '20GM ', '', '99', '150', '51', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(96, 'ELYVATE CREAM', 'BETAMETHASONE', ' 15GM ', '', '44', '70', '26', 'Kentons Ltd', 0, 4, 5, 'Dec-23-2016', '', ''),
(97, 'DAZOLE B CREAM', 'CLOTRIMAZOLE $ BETAMETHASONE', ' 20GMS  ', '', '50', '100', '50', 'Kentons Ltd', 0, 19, 1, '', '', ''),
(98, 'CLOTRIMAZOLE CREAM DAZOLE', 'DAZOLE', ' 20GMS  ', '', '15.90', '50', '35', 'Kentons Ltd', 0, 25, 25, 'Dec-23-2016', '', ''),
(99, 'CLOTRIMAZOLE CREAM LABESTEN', 'LABESTEN', '15GMS  ', '', '20', '50', '30', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(100, 'CLOTRIMAZOLE CREAM BULKOT', 'BULKOT', ' 20GMS ', '', '20', '50', '30', 'Kentons Ltd', 0, 10, 10, 'Dec-23-2016', '', ''),
(101, 'MEDIVEN S OINTMENT', 'MEDIVEN', ' 15GMS ', '', '139', '180', '41', 'Kentons Ltd', 0, 1, 1, 'Dec-23-2016', '', ''),
(102, 'MEDIVEN OIINTMENT', 'MEDIVEN', '15GMS ', '', '44', '70', '26', 'Kentons Ltd', 0, 26, 2, 'Dec-23-2016', '', ''),
(103, 'MEDIVEN CREAM', 'MEDIVEN', ' 15GM  ', '', '44', '70', '26', 'Kentons Ltd', 0, 15, 6, '', '', ''),
(104, 'RELCER GEL SYRUP', 'ANTACID', ' 180ML', '', '248', '300', '52', 'Kentons Ltd', 0, 6, 6, 'Dec-23-2016', '', ''),
(105, 'ALUGEL SUSPENSION', 'ANTACID', '100ML ', '', '45.50', '80', '35', 'Kentons Ltd', 0, 4, 4, 'Dec-23-2016', '', ''),
(106, 'STOPACID', 'ANTACID', '100ML ', '', '44.50', '70', '26', 'Kentons Ltd', 0, 13, 13, 'Dec-23-2016', '', ''),
(107, 'PHARMASAL CREAM', 'PHARMASAL', '25GMS  ', '', '55', '70', '15', 'Kentons Ltd', 0, 1, 1, 'Dec-23-2016', '', ''),
(108, 'VOLINI GEL', 'VOLINI', '30GMS ', '', '169', '220', '51', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(109, 'NAUMA BALM', 'NAUMA', '20GMS ', '', '49.90', '70', '21', 'Kentons Ltd', 0, 6, 6, 'Dec-23-2016', '', ''),
(110, 'DEEP HEAT ', 'DEEP HEAT RUB', '15GMS', '', '169', '220', '51', 'Kentons Ltd', 0, 3, 3, 'Dec-23-2016', '', ''),
(111, 'DEEP HEAT', 'DEEP HEAT RUB', ' 35GMS ', '', '199', '280', '81', 'Kentons Ltd', 0, 0, 0, 'Dec-23-2016', '', ''),
(112, 'DEEP HEAT', 'DEEP HEAT SPRAY', '150ML ', '', '499', '600', '101', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(113, 'BULKOT MIXI CREAM', 'BULKOT', '20GMS  ', '', '99', '150', '51', 'Kentons Ltd', 0, 3, 3, 'Dec-23-2016', '', ''),
(114, 'BULKOT B CREAM', 'BULKOT', '20GMS  ', '', '39.90', '80', '41', 'Kentons Ltd', 0, 20, 20, 'Dec-23-2016', '', ''),
(115, 'CANDID CREAM', 'CANDID', '20GMS ', '', '221', '280', '59', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(116, 'CANDID B CREAM', 'CANDID', ' 15GMS ', '', '146', '200', '54', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(117, 'CANDID MOUTH PAINT', 'CANDID', '15ML  ', '', '150', '200', '50', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(118, 'CANDI V6 PESSARIES', 'CANDID', '6S   ', '', '335', '450', '115', 'Kentons Ltd', 0, 1, 1, 'Dec-23-2016', '', ''),
(119, 'CANDID V3 PESSARIES', 'CANDID', ' 3S', '', '235', '370', '135', 'Kentons Ltd', 0, 0, 0, 'Dec-23-2016', '', ''),
(120, 'CANDID POWDER', 'CANDID', '30GM ', '', '186', '250', '64', 'Kentons Ltd', 0, 0, 0, 'Dec-23-2016', '', ''),
(121, 'XTRADERM CREAM', 'XTRADERM', ' 20GM ', '', '129', '170', '41', 'Kentons Ltd', 0, 9, 9, 'Dec-23-2016', '', ''),
(122, 'BECLOMIN OINTMENT', 'BECLOMIN', ' 20GM ', '', '129', '170', '41', 'Kentons Ltd', 0, 6, 6, 'Dec-23-2016', '', ''),
(123, 'GRABACIN 3 OINTMENT', 'GRABACIN', ' 20GM', '', '239', '280', '41', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(124, 'GRABACIN POWDER', 'GRABACIN', '10GM  ', '', '69.90', '90', '21', 'Kentons Ltd', 0, 7, 3, 'Dec-23-2016', '', ''),
(125, 'BETASON CREAM', 'BETASON', '20GM ', '', '49', '70', '21', 'Kentons Ltd', 0, 0, 1, 'Dec-23-2016', '', ''),
(126, 'BETAMED CREAM', 'BETAMED', ' 20GM', '', '44', '60', '16', 'Kentons Ltd', 0, 4, 4, 'Dec-23-2016', '', ''),
(127, 'ACYCLOVIR CREAM', 'ACIRAX', '10GM ', '', '99', '150', '51', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(128, 'CLOB B CREAM', 'CLOB', ' 15GM', '', '59', '100', '41', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(130, 'KETOCONAZOLE CREAM', 'KONAZOLE/KENAZOLE', ' 20GM   ', '', '69', '100', '31', 'Kentons Ltd', 0, 5, 5, 'Dec-23-2016', '', ''),
(131, 'BURN CREAM/SSD', 'PROZIN', ' 20GM ', '', '29', '50', '21', 'Kentons Ltd', 0, 3, 3, 'Dec-23-2016', '', ''),
(132, 'WHITFIELD OINTMENT', 'WHITFIELD', '20GM  ', '', '19', '50', '31', 'Kentons Ltd', 0, 2, 2, 'Dec-23-2016', '', ''),
(133, 'FUNGISTAT CREAM', 'FUNGISTAT', '20GM  ', '', '69', '100', '31', 'Kentons Ltd', 0, 5, 5, 'Dec-23-2016', '', ''),
(134, 'TETRACYCLINE SKIN OINTMENT', 'RACYCLINE', '20GM ', '', '29', '50', '21', 'Kentons Ltd', 0, 12, 2, 'Dec-23-2016', '', ''),
(135, 'FLUGON DM 120ML', 'FLUGON', '120ML ', '', '159', '200', '41', 'Kentons Ltd', 0, 1, 1, 'Dec-29-2016', '', ''),
(136, 'SULPHUR OINTMENT', 'SULPHUR', '20GMS ', '', '19.90', '50', '31', 'Kentons Ltd', 0, 4, 4, 'Dec-29-2016', '', ''),
(137, 'P ALAXIN TABS', 'P ALAXIN', ' 9''S', '', '222', '300', '78', 'Kentons Ltd', 0, 8, 8, 'Dec-29-2016', '', ''),
(138, 'P ALAXIN SYRUP', 'P ALAXIN', ' 100ML', '', '289', '350', '61', 'Kentons Ltd', 0, 1, 1, 'Dec-29-2016', '', ''),
(139, 'D ARTEPP', 'D ARTEPP', '9''S ', '', '300', '169', '-131', 'Kentons Ltd', 0, 1, 1, 'Dec-29-2016', '', ''),
(140, 'DUOCOTECXIN', 'DUOCOTEXCIN', '9''S ', '', '333', '450', '117', 'Kentons Ltd', 0, 0, 1, 'Dec-29-2016', '', ''),
(141, 'MALODAR', 'MALODAR', ' 3''S', '', '28.90', '50', '22', 'Kentons Ltd', 0, 3, 3, 'Dec-29-2016', '', ''),
(142, 'AL 24''S', 'ARTEFAN', ' 24''S ', '', '45', '90', '45', 'Kentons Ltd', 0, 23, 23, 'Dec-29-2016', '', ''),
(143, 'AL 6''S', 'AL', ' 6''S', '', '30', '50', '20', 'Kentons Ltd', 0, 0, 1, 'Dec-29-2016', '', ''),
(144, 'AL SYRUP', 'LUFENART', ' 60ML', '', '133', '250', '117', 'Kentons Ltd', 0, 4, 4, 'Dec-29-2016', '', ''),
(145, 'PROGUANIL TABS', 'PROGUANIL', ' ', '', '6', '10', '4', '', 0, 56, 56, 'Dec-29-2016', '', ''),
(146, 'FEMIPLAN PILLS', 'PILLS', ' 28''S  ', '', '28', '40', '12', 'Kentons Ltd', 0, 58, 59, 'Dec-29-2016', '', ''),
(147, 'CITAL SYRUP', 'CITAL', ' 100ML', '', '199', '250', '51', 'Kentons Ltd', 0, 4, 4, 'Dec-29-2016', '', ''),
(148, 'SALOREX SYRUP', 'SALOREX', ' 100ML', '', '58', '100', '42', 'kemsa', 0, 2, 2, 'Dec-29-2016', '', ''),
(149, 'CLOTRINE MOUTH PAINT', 'CLOTRINE', '15ML ', '', '58', '100', '42', 'Kentons Ltd', 0, 1, 1, 'Dec-29-2016', '', ''),
(150, 'ELASTOPLAST', 'NEXAPLAST', ' ', '', '3', '5', '2', 'Kentons Ltd', 0, 84, 84, 'Dec-29-2016', '', ''),
(151, 'RILIF MR TABS', 'RILIF', ' TABS', '', '32', '40', '8', 'Kentons Ltd', 0, 20, 20, 'Dec-29-2016', '', ''),
(152, 'ACEPAR TABS', 'ACEPAR', ' ', '', '16', '20', '4', 'Kentons Ltd', 0, 13, 13, 'Dec-29-2016', '', ''),
(153, 'ZULU TABS', 'ZULU', ' ', '', '23', '30', '7', 'Kentons Ltd', 0, 21, 21, 'Dec-29-2016', '', ''),
(154, 'RILIF PLUS TABS', 'RILIF', ' ', '', '22', '30', '8', 'Kentons Ltd', 0, 20, 20, 'Dec-29-2016', '', ''),
(155, 'GLUTAMIN TABS', 'GLUTAMIN', ' ', '', '8', '10', '2', 'Kentons Ltd', 0, 30, 30, 'Dec-29-2016', '', ''),
(156, 'DOLOACT MR', 'DOLOACT', '  ', '', '18.80', '25', '7', 'Kentons Ltd', 0, 2, 2, 'Dec-29-2016', '', ''),
(157, 'MYOSPAZ TABS', 'MYOSPAZ', ' ', '', '17.70', '25', '8', 'Kentons Ltd', 0, 103, 103, 'Dec-29-2016', '', ''),
(158, 'SUBSYDE CR', 'SUBSYDE', ' ', '', '12.9', '20', '8', 'Kentons Ltd', 0, 31, 31, 'Dec-29-2016', '', ''),
(159, 'RANFERON CAPS', 'RANFERON', ' ', '', '12.9', '15', '3', 'Kentons Ltd', 0, 30, 30, 'Dec-29-2016', '', ''),
(160, 'BRUSTAN TABS', 'BRUSTAN', ' ', '', '9.9', '15', '6', 'Kentons Ltd', 0, 30, 30, 'Dec-29-2016', '', ''),
(161, 'OSTEOCARE TABS', 'OSTEOCARE', ' ', '', '22', '30', '8', 'Kentons Ltd', 0, 42, 42, 'Dec-29-2016', '', ''),
(162, 'CARTIL FORTE TABS', 'CARTIL FORTE', ' ', '', '46', '55', '9', 'Kentons Ltd', 0, 33, 33, 'Dec-29-2016', '', ''),
(163, 'TRAMADOL CAPS 50MG', 'TRAMADOL', ' ', '', '3', '5', '2', 'Kentons Ltd', 0, 98, 98, 'Dec-29-2016', '', ''),
(164, 'ASCARD TABS', 'ASCARD', ' ', '', '3.30', '5', '2', 'Kentons Ltd', 0, 161, 161, 'Dec-29-2016', '', ''),
(165, 'ROBB', 'ROBB', ' ', '', '11', '20', '9', 'Kentons Ltd', 0, 12, 12, 'Dec-29-2016', '', ''),
(166, 'MENTHOPLUS', 'MENTHO', ' ', '', '29', '40', '11', 'Kentons Ltd', 0, 12, 12, 'Dec-29-2016', '', ''),
(167, 'DICLOFENAC GEL', 'DICLOKANT', ' ', '', '20', '50', '30', 'Kentons Ltd', 0, 6, 6, 'Dec-29-2016', '', ''),
(168, 'AMOXYL SYRUP 60ML', 'SPAMOX', ' ', '', '22', '50', '28', 'Kentons Ltd', 0, 59, 62, 'Dec-29-2016', '', ''),
(169, 'AMOXYL SYRUP 100ML', 'SPAMOX/KEMOXYL', ' ', '', '32', '80', '48', 'Kentons Ltd', 0, 23, 23, 'Dec-29-2016', '', ''),
(170, 'AMPICLOX SYRUP 60ML', 'AMPICLOX', ' ', '', '38', '60', '22', 'Kentons Ltd', 0, 4, 4, 'Dec-29-2016', '', ''),
(171, 'AMPICLOX SYRUP 100ML', 'AMPICLOX', ' ', '', '49.90', '100', '51', 'Kentons Ltd', 0, 21, 21, 'Dec-29-2016', '', ''),
(172, 'CLOXACILIN SYRUP 100ML', 'CLOXY', ' ', '', '49', '100', '51', 'Kentons Ltd', 0, 2, 2, 'Dec-29-2016', '', ''),
(173, 'ERYTHROMYCIN SYRUP 100ML', 'ERYTHROMYCIN', ' ', '', '52', '100', '48', 'Kentons Ltd', 0, 2, 2, 'Dec-29-2016', '', ''),
(174, 'ERYTHROMYCIN SYRUP 60ML', 'ERYTHROMYCIN', ' ', '', '32', '60', '28', 'Kentons Ltd', 0, 6, 6, 'Dec-29-2016', '', ''),
(175, 'CO-TRIMOXAZOLE SYRUP 60ML', 'SEPTRIM', ' ', '', '19', '50', '31', 'Kentons Ltd', 0, 3, 3, 'Dec-29-2016', '', ''),
(176, 'CO-TRIMOXAZOLE SYRUP 100ML', 'SEPTRIM', ' ', '', '42', '80', '38', 'Kentons Ltd', 0, 1, 1, 'Dec-29-2016', '', ''),
(177, 'CEFALEXIN SYRUP', 'ORACEF', ' ', '', '88', '150', '62', 'Kentons Ltd', 0, 4, 4, 'Dec-29-2016', '', ''),
(178, 'FLUCLOXACILIN SYRUP 100ML', 'FLOXAPEN', ' ', '', '88', '150', '62', 'Kentons Ltd', 0, 4, 4, 'Dec-29-2016', '', ''),
(179, 'AMOXICLAV SYRUP', 'AUGUMENTINE', ' ', '', '189', '300', '111', 'Kentons Ltd', 0, 15, 16, 'Dec-29-2016', '', ''),
(180, 'AUGUMENTINE SYRUP ORIGINAL', 'AUGUMENTINE', ' ', '', '569', '800', '231', 'Kentons Ltd', 0, 3, 3, 'Dec-29-2016', '', ''),
(181, 'CEFUROXIME SYRUP', 'ZOLIDON', ' ', '', '299', '400', '101', 'Kentons Ltd', 0, 1, 1, 'Dec-29-2016', '', ''),
(182, 'TOUCH &GO ', 'AYRTOMS', ' SUSPENSION', '', '169', '280', '111', 'kemsa', 0, 1, 1, 'Dec-29-2016', '', ''),
(183, 'ZENTEL TABS', 'ZENTEL', ' 1''S', '', '169', '200', '31', 'Kentons Ltd', 0, 2, 2, 'Dec-29-2016', '', ''),
(184, 'ABZ TABS', 'ALBENDAZOLE', ' ', '', '16.90', '50', '34', 'Kentons Ltd', 0, 7, 7, 'Dec-29-2016', '', ''),
(185, 'ALBENDOL TABS', 'ALBENDAZOLE', ' ', '', '7', '15', '8', 'Kentons Ltd', 0, 21, 21, 'Dec-30-2016', '', ''),
(186, 'CEFUROXIME TABS 500MG', 'CEFASIN', ' ', '', '23.5', '40', '17', 'Kentons Ltd', 0, 30, 30, 'Dec-30-2016', '', ''),
(187, 'CEFUROXIME TABS 250MG', 'CETIL', ' ', '', '19.9', '25', '6', 'Kentons Ltd', 0, 0, 10, 'Dec-30-2016', '', ''),
(188, 'AZITTHROMYCIN TABS 500MG', 'ZATHRIN', '3''S ', '', '66', '100', '34', 'Kentons Ltd', 0, 4, 4, 'Dec-30-2016', '', ''),
(189, 'AZITHROMYCIN SYRUP', 'AZITHREE', '15ML ', '', '88', '150', '62', 'Kentons Ltd', 0, 1, 1, 'Dec-30-2016', '', ''),
(190, 'LEVOFLOXACIN TABS 500MG', 'VOFAX', ' ', '', '19.9', '30', '11', 'Kentons Ltd', 0, 120, 120, 'Dec-30-2016', '', ''),
(191, 'LEVOBACT 500MG', 'LEVOBACT', ' ', '', '19.9', '30', '11', 'Laborex Ltd', 0, 10, 10, 'Dec-30-2016', '', ''),
(192, 'NEUROFORTE TABS', 'NEUROBINE', ' ', '', '14.95', '20', '6', 'Kentons Ltd', 0, 58, 60, 'Dec-30-2016', '', ''),
(193, 'ESOSE 40MG', 'ESOSE', ' ', '', '49.90', '60', '11', 'Kentons Ltd', 0, 8, 8, 'Dec-30-2016', '', ''),
(194, 'ESOMPRAZOLE GENERIC 40MG', 'ESOFRED', ' ', '', '19', '30', '11', 'Kentons Ltd', 0, 147, 147, 'Dec-30-2016', '', ''),
(195, 'ESOMPRAZOLE GENERIC 20MG', 'ZOMEP', ' ', '', '13', '20', '7', 'Kentons Ltd', 0, 9, 9, 'Dec-30-2016', '', ''),
(196, 'CEFTRIAXONE INJECTION', 'CEF', ' 1GM', '', '29.90', '50', '21', 'Kentons Ltd', 0, 1, 2, 'Dec-30-2016', '', ''),
(197, 'CALAMINE LOTION', 'CALAMINE', ' ', '', '29.90', '80', '51', 'Kentons Ltd', 0, 3, 3, 'Dec-30-2016', '', ''),
(198, 'SALBUTAMOL INHALOR', 'ASTHAMIN', ' ', '', '139', '200', '61', 'Kentons Ltd', 0, 1, 1, 'Dec-30-2016', '', ''),
(199, 'VENTOLIN EVOHALER', 'VENTOLIN', ' ', '', '269', '330', '61', 'Kentons Ltd', 0, 1, 1, 'Dec-30-2016', '', ''),
(200, 'P2 GENERIC', 'OPTION 2', ' 2''S', '', '19.90', '100', '81', 'Kentons Ltd', 0, 37, 37, 'Dec-30-2016', '', ''),
(201, 'AUGUMENTINE TABS ORIGINAL', 'AUGUMENTINE', '  ', '', '92', '120', '28', 'Kentons Ltd', 0, 35, 35, 'Dec-30-2016', '', ''),
(202, 'AMOXICLAV/ BACTOCLAV 625', 'BACTOCLAV', ' ', '', '21', '35', '14', 'Kentons Ltd', 0, 199, 201, 'Dec-30-2016', '', ''),
(203, 'P2 ORIGINAL', 'POSTINOR 2', '2''S ', '', '104.90', '150', '46', 'Kentons Ltd', 0, 13, 5, 'Dec-30-2016', '', ''),
(204, 'CIPROINTA 10''S', 'CIPROFLOXACIN', ' 10''S', '', '88', '120', '32', 'Kentons Ltd', 0, 4, 4, 'Dec-30-2016', '', ''),
(205, 'BACTOCLAV 375', 'BACTOCLAV', ' ', '', '19.90', '30', '11', 'Kentons Ltd', 0, 56, 56, 'Dec-30-2016', '', ''),
(206, 'DILAZOLE TABS', 'METRONIDAZOLE&DILOXANIDE FUROATE', ' ', '', '99', '200', '101', 'Kentons Ltd', 0, 3, 3, 'Dec-30-2016', '', ''),
(207, 'ANUSOL SUPPOSITORIES', 'ANUSOL', ' ', '', '69', '80', '11', 'Kentons Ltd', 0, 10, 10, 'Dec-30-2016', '', ''),
(208, 'HEMSYL TABS', 'ETAMSYLATE', ' ', '', '32', '50', '18', 'Kentons Ltd', 0, 5, 5, 'Dec-30-2016', '', ''),
(209, 'CLOTRIMAZOLE PESSARIES', 'CANAZOLE', ' 6''S', '', '29.90', '100', '71', 'Kentons Ltd', 0, 6, 6, 'Dec-30-2016', '', ''),
(210, 'NELGRA 100MG', 'NELGRA', '  ', '', '11', '25', '14', 'Kentons Ltd', 0, 21, 22, '', '', ''),
(211, 'MYGRA 100MG', 'MYGRA', ' ', '', '7.25', '25', '18', 'Kentons Ltd', 0, 30, 32, 'Dec-30-2016', '', ''),
(212, 'NELGRA 50MG', 'NELGRA', ' ', '', '7.25', '25', '18', 'Kentons Ltd', 0, 12, 12, 'Dec-30-2016', '', ''),
(213, 'PROBETA N EYE DROP', 'PROBETA', ' 7.5ML', '', '75', '100', '25', 'Kentons Ltd', 0, 12, 13, 'Dec-30-2016', '', ''),
(214, 'GENTAMYCIN EYE DROP', 'ABGENTA', ' 10ML', '', '19.90', '50', '31', 'Kentons Ltd', 0, 6, 6, 'Dec-30-2016', '', ''),
(215, 'CHLORAMPHENICAL EYE DROP', 'ROGOPHEN', ' 10ML', '', '29', '50', '21', 'Kentons Ltd', 0, 4, 4, 'Dec-30-2016', '', ''),
(216, 'CHLORAMPHENICAL EAR DROP', 'BIOPHENICOL', ' ', '', '29', '50', '21', 'Kentons Ltd', 0, 0, 1, 'Dec-30-2016', '', ''),
(217, 'XBETA N EYE DROP', 'XBETA', '10ML ', '', '69.90', '100', '31', 'Kentons Ltd', 0, 1, 1, 'Dec-30-2016', '', ''),
(218, 'IVYDEXGENT EYE DROP', 'IVYDEXGENTA', ' 5ML', '', '88', '130', '42', 'Kentons Ltd', 0, 4, 4, 'Dec-30-2016', '', ''),
(219, 'HYDROCORTISON EYE DROP', 'HYCORUM', ' 5ML', '', '66', '100', '34', 'Kentons Ltd', 0, 4, 4, 'Dec-30-2016', '', ''),
(220, 'ERYTHROMYCIN TABS 500MG', 'ASOMYCIN', ' ', '', '6.60', '10', '4', 'Kentons Ltd', 0, 170, 170, 'Dec-30-2016', '', ''),
(221, 'ERYTHROMYCIN TABS 250MG', 'EROCIN', ' ', '', '2.5', '5', '3', 'Kentons Ltd', 0, 10, 10, 'Dec-30-2016', '', ''),
(222, 'CIPROFLOXACIN TABS 500MG', 'CIPCINA', '   ', '', '2.5', '7', '5', 'Kentons Ltd', 0, 520, 540, '', '', ''),
(223, 'NORFLOXACIN TABS 400MG', 'MEGAFLOX', ' ', '', '1.99', '4', '3', 'Kentons Ltd', 0, 190, 190, 'Dec-30-2016', '', ''),
(224, 'DOXYCYCLINE TABS', 'CAREDOXY', '100MG ', '', '1.19', '2', '1', 'Kentons Ltd', 0, 490, 500, 'Dec-30-2016', '', ''),
(225, 'GLUCOPHAGE TABS 500MG', 'GLUCOPHAGE', '  ', '', '5', '10', '5', 'Kentons Ltd', 0, 69, 69, 'Dec-30-2016', '', ''),
(226, 'GLUCOPHAGE TABS 1000MG', 'GLUCOPHAGE', ' ', '', '16', '20', '4', 'Kentons Ltd', 0, 53, 53, 'Dec-30-2016', '', ''),
(227, 'NOGLUC-GLIBENCLAMIDE 5MG', 'NOGLUC', '5MG  ', '', '2.25', '5', '3', 'Kentons Ltd', 0, 224, 224, 'Dec-30-2016', '', ''),
(228, 'GLUCOMET-METFORMIN  TABS 500MG', 'GLUCOMET', ' 500MG ', '', '3.6', '5', '2', 'Kentons Ltd', 0, 54, 54, 'Dec-30-2016', '', ''),
(229, 'METMIN-METFORMIN 500MG', 'METMIN', ' 500MG', '', '1.99', '5', '4', 'Kentons Ltd', 0, 20, 20, 'Dec-30-2016', '', ''),
(230, 'PROPRANOLOL TABS', 'INDERAL', ' 40MG', '', '7.8', '20', '13', 'Kentons Ltd', 0, 14, 14, 'Dec-30-2016', '', ''),
(231, 'HCTZ 50MG', 'HYDROCHLOROTHIZIDE', ' ', '', '7.8', '20', '13', 'Kentons Ltd', 0, 17, 17, 'Dec-30-2016', '', ''),
(232, 'HEMOSAN CAPS', 'HEMOSAN', ' ', '', '12', '15', '3', 'Kentons Ltd', 0, 60, 60, 'Dec-30-2016', '', ''),
(233, 'FRUSEMIDE TABS', 'LASIX', '40MG ', '', '7.8', '20', '13', 'Kentons Ltd', 0, 37, 37, 'Dec-30-2016', '', ''),
(234, 'ENALAPRIL 5MG', 'ENCARDIL', ' ', '', '3', '5', '2', 'Kentons Ltd', 0, 85, 85, 'Dec-30-2016', '', ''),
(235, 'ENALAPRIL 10MG', 'ENCARDIL', '  ', '', '6', '10', '4', 'Kentons Ltd', 0, 13, 13, 'Dec-30-2016', '', ''),
(236, 'LOSARTAS-50', 'LOSARTAN POTASSIUM', ' 50MG', '', '26', '35', '9', 'Kentons Ltd', 0, 26, 26, 'Dec-30-2016', '', ''),
(237, 'LOSARTAS-HT', 'LOSARTAN POTASSIUM&HCTZ', ' ', '', '31', '40', '9', 'Kentons Ltd', 0, 41, 41, 'Dec-30-2016', '', ''),
(238, 'ALLOPURINOL', 'ALEZE-100', ' 100MG', '', '4', '5', '1', 'Kentons Ltd', 0, 30, 30, 'Dec-30-2016', '', ''),
(239, 'AMLONG 5MG-AMLODIPINE', 'AMLONG', '  ', '', '13', '20', '7', 'Kentons Ltd', 0, 35, 35, 'Dec-30-2016', '', ''),
(240, 'VARINIL-AMLODIPINE', 'VARINIL', '5MG ', '', '3', '5', '2', 'Kentons Ltd', 0, 18, 18, 'Dec-30-2016', '', ''),
(241, 'ARTOVASTATIN-AVAS -20', 'AVAS-20', '  ', '', '10', '15', '5', 'Kentons Ltd', 0, 56, 56, 'Dec-30-2016', '', ''),
(242, 'ANGIZAAR H TABS', 'ANGIZAAR', ' ', '', '14', '25', '11', 'Kentons Ltd', 0, 51, 51, 'Dec-30-2016', '', ''),
(243, 'AMLONG 10', 'AMLONG', ' ', '', '23', '30', '7', 'Kentons Ltd', 0, 30, 30, 'Dec-30-2016', '', ''),
(244, 'AMLOZAAR TABS', 'AMLOZAAR', '  ', '', '42', '50', '8', 'Kentons Ltd', 0, 39, 39, 'Dec-30-2016', '', ''),
(245, 'NATRILIX SR TABS', 'NATRILIX', ' ', '', '23', '30', '7', 'Kentons Ltd', 0, 17, 17, 'Dec-30-2016', '', ''),
(246, 'IROVELA H TABS', 'IROVELA H', ' ', '', '51', '60', '9', 'Kentons Ltd', 0, 10, 10, 'Dec-30-2016', '', ''),
(247, 'NILOL TABS', 'NILOL', ' ', '', '25', '30', '5', 'Kentons Ltd', 0, 25, 25, 'Dec-30-2016', '', ''),
(248, 'NIFEDIPINE', 'CALCIGARD', ' ', '', '1.99', '5', '4', 'Kentons Ltd', 0, 115, 149, 'Dec-30-2016', '', ''),
(249, 'CARDITAN 50MG', 'LOSARTAN POTASSIUM', ' ', '', '7', '10', '3', 'Kentons Ltd', 0, 14, 14, 'Dec-30-2016', '', ''),
(250, 'ATENOLOL-BETACARD', 'BETACARD', ' ', '', '1.99', '5', '4', 'Kentons Ltd', 0, 176, 176, 'Dec-30-2016', '', ''),
(251, 'BETANASE TABS 30''S', 'BETANASE', ' ', '', '38', '50', '12', 'Kentons Ltd', 0, 4, 4, 'Dec-30-2016', '', ''),
(252, 'LOPERAMIDE CAPS', 'ASTODIUM', ' 6''S', '', '11', '30', '19', 'Kentons Ltd', 0, 29, 29, 'Dec-30-2016', '', ''),
(253, 'FLUCONAZOLE 150MG', 'FREDLUCO', ' 1''S', '', '26', '50', '24', 'Kentons Ltd', 0, 10, 10, 'Dec-30-2016', '', ''),
(254, 'SECNIDAZOLE TABS 2''S', 'DAWASEC/FRAMBI', ' 2''S', '', '29.90', '50', '21', 'Kentons Ltd', 0, 8, 8, 'Dec-30-2016', '', ''),
(255, 'GRISEOFULVIN TABS 500MG', 'GRISOFULVIN', ' 500MG', '', '6', '10', '4', 'Kentons Ltd', 0, 113, 113, 'Dec-30-2016', '', ''),
(256, 'GRISEOFULVIN TABS 250MG', 'GRISOFULVIN', '250MG ', '', '3', '7', '4', 'Kentons Ltd', 0, 75, 75, 'Dec-30-2016', '', ''),
(257, 'GRISEOFULVIN TABS 125MG', 'GRISOFULVIN', ' 125MG', '', '2.5', '5', '3', 'Kentons Ltd', 0, 255, 255, 'Dec-30-2016', '', ''),
(258, 'BET-23-BETAPYN TABS-18''S', 'BETAPYN', ' TABS       ', '', '14', '20', '6', 'Kentons Ltd', 0, 44, 30, '', '', '36'),
(259, 'Panadol advance pair', 'paracetamol 500mg', ' analgesics   ', '', '6', '10', '4', 'Kentons Ltd', 0, 130, 52, '', '', '100'),
(260, 'flagyl 200mg', 'metronidazole tab 200mg', ' antiprotozoal agents    ', '', '.7', '1', '', 'Kentons Ltd', 0, 940, 1000, '', '', '100'),
(261, 'maramoja', 'maramoja', ' analgesic', '', '5', '10', '5', 'Kentons Ltd', 0, 100, 100, '', '', ''),
(262, 'ciprobay 500mg', 'ciprofloxacin', ' antibiotics  ', '', '400', '500', '100', 'Kentons Ltd', 0, 90, 100, '', '', '90'),
(263, 'bactiflox', 'ciprofloxacin', ' mepha  ', '', '300', '350', '50', 'Laborex Ltd', 0, 149, 100, '', '', '100'),
(264, 'bactiflox 750mg', 'ciprofloxacin 750mg', ' antibiotics', '', '350', '500', '150', 'Kentons Ltd', 0, 60, 100, '', '', '50'),
(265, 'test product', 'test product', ' ', '', '300', '333', '33', 'Kentons Ltd', 0, 300, 300, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `project2_audit`
--

CREATE TABLE `project2_audit` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(40) NOT NULL,
  `user` varchar(300) DEFAULT NULL,
  `table` varchar(300) DEFAULT NULL,
  `action` varchar(250) NOT NULL,
  `description` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project2_audit`
--

INSERT INTO `project2_audit` (`id`, `datetime`, `ip`, `user`, `table`, `action`, `description`) VALUES
(1, '2016-11-11 00:38:54', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(2, '2016-11-11 00:56:14', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(3, '2016-11-11 01:02:00', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(4, '2016-11-11 08:17:01', '::1', 'admin', 'loginusers', 'login', ''),
(5, '2016-11-11 08:29:29', '::1', 'admin', 'loginusers', 'login', ''),
(6, '2016-11-11 08:33:57', '::1', 'admin', 'loginusers', 'login', ''),
(7, '2016-11-11 08:34:19', '::1', 'admin', 'loginusers', 'login', ''),
(8, '2016-11-11 08:40:33', '::1', 'admin', 'loginusers', 'login', ''),
(9, '2016-11-11 08:58:33', '::1', 'admin', 'loginusers', 'login', ''),
(10, '2016-11-11 09:03:36', '::1', 'admin', 'loginusers', 'login', ''),
(11, '2016-11-11 09:19:37', '::1', 'admin', 'loginusers', 'login', ''),
(12, '2016-11-11 09:44:35', '::1', 'admin', 'loginusers', 'login', ''),
(13, '2016-11-11 11:12:18', '::1', 'admin', 'loginusers', 'login', ''),
(14, '2016-11-11 11:12:40', '::1', 'admin', 'loginusers', 'login', ''),
(15, '2016-11-11 12:14:41', '::1', 'admin', 'loginusers', 'login', ''),
(16, '2016-11-11 12:15:01', '::1', 'admin', 'loginusers', 'login', ''),
(17, '2016-11-11 12:28:55', '::1', 'admin', 'loginusers', 'login', ''),
(18, '2016-11-11 12:34:44', '::1', 'admin', 'loginusers', 'login', ''),
(19, '2016-11-11 13:33:14', '::1', 'admin', 'loginusers', 'login', ''),
(20, '2016-11-11 15:14:09', '::1', 'admin', 'loginusers', 'login', ''),
(21, '2016-11-11 16:11:44', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(22, '2016-11-11 16:12:17', '::1', 'admin', 'loginusers', 'login', ''),
(23, '2016-11-14 14:49:12', '127.0.0.1', 'admin', 'loginusers', 'failed login', ''),
(24, '2016-11-14 14:49:19', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(25, '2016-11-14 14:51:16', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(26, '2016-11-14 15:13:41', '127.0.0.1', '', 'loginusers', 'failed login', ''),
(27, '2016-11-14 15:13:44', '127.0.0.1', '', 'loginusers', 'failed login', ''),
(28, '2016-11-14 15:14:07', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(29, '2016-11-16 14:41:47', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(30, '2016-12-12 10:46:28', '127.0.0.1', 'admin', 'loginusers', 'failed login', ''),
(31, '2016-12-12 10:46:39', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(32, '2016-12-12 10:55:33', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(33, '2016-12-12 11:44:02', '127.0.0.1', 'admin', 'loginusers', 'login', ''),
(34, '2016-12-12 11:47:53', '127.0.0.1', 'pamela', 'loginusers', 'login', ''),
(35, '2016-12-22 09:19:37', '127.0.0.1', 'linet', 'loginusers', 'failed login', ''),
(36, '2016-12-26 10:06:52', '127.0.0.1', 'linet', 'loginusers', 'failed login', ''),
(37, '2016-12-26 10:06:53', '127.0.0.1', 'linet', 'loginusers', 'failed login', ''),
(38, '2016-12-26 10:07:58', '127.0.0.1', 'linet', 'loginusers', 'failed login', ''),
(39, '2016-12-26 10:08:29', '127.0.0.1', 'linet', 'loginusers', 'failed login', ''),
(40, '2016-12-30 16:44:15', '127.0.0.1', 'admin', 'loginusers', 'failed login', ''),
(41, '2016-12-30 16:44:35', '127.0.0.1', 'pamela', 'loginusers', 'login', ''),
(42, '2017-01-11 02:25:57', '127.0.0.1', '', 'loginusers', 'failed login', ''),
(43, '2017-01-11 02:25:59', '127.0.0.1', '', 'loginusers', 'failed login', ''),
(44, '2017-01-11 02:26:21', '127.0.0.1', 'pamela', 'loginusers', 'failed login', ''),
(45, '2017-01-11 02:26:36', '127.0.0.1', 'pamela', 'loginusers', 'failed login', ''),
(46, '2017-01-11 02:26:39', '127.0.0.1', 'pamela', 'loginusers', 'failed login', ''),
(47, '2017-01-11 02:28:03', '127.0.0.1', 'pamela', 'loginusers', 'login', ''),
(48, '2017-01-11 02:28:35', '127.0.0.1', '', 'loginusers', 'failed login', ''),
(49, '2017-01-11 02:28:52', '127.0.0.1', 'pamela', 'loginusers', 'login', ''),
(50, '2017-01-14 18:21:53', '::1', 'mathu', 'loginusers', 'failed login', ''),
(51, '2017-01-17 09:03:32', '::1', 'mathu', 'loginusers', 'failed login', ''),
(52, '2017-01-17 09:06:45', '::1', 'mathu', 'loginusers', 'failed login', ''),
(53, '2017-01-17 09:08:27', '::1', 'mathu', 'loginusers', 'failed login', ''),
(54, '2017-01-17 09:08:29', '::1', 'mathu', 'loginusers', 'failed login', ''),
(55, '2017-01-17 09:08:30', '::1', 'mathu', 'loginusers', 'failed login', ''),
(56, '2017-01-17 09:09:02', '::1', 'mathu', 'loginusers', 'failed login', ''),
(57, '2017-01-17 09:09:51', '::1', 'mathu', 'loginusers', 'failed login', ''),
(58, '2017-01-17 09:09:55', '::1', 'mathu', 'loginusers', 'failed login', ''),
(59, '2017-01-17 09:10:32', '::1', 'pamela', 'loginusers', 'login', ''),
(60, '2017-01-17 09:10:58', '::1', 'pamela', 'loginusers', 'login', ''),
(61, '2017-01-17 09:12:12', '::1', 'pamela', 'loginusers', 'login', ''),
(62, '2017-01-17 09:13:59', '::1', 'pamela', 'loginusers', 'login', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`transaction_id`, `invoice_number`, `date`, `suplier`, `remarks`) VALUES
(1, '', '', 'kemsa', ''),
(2, '', '', 'Kentons Ltd', ''),
(3, '', '', 'kemsa', ''),
(4, '', '30122016', 'kemsa', ''),
(5, '364196', '30122016', 'Kentons Ltd', ''),
(6, '364196', '30122016', 'Kentons Ltd', ''),
(7, '364196', '30122016', 'Kentons Ltd', ''),
(8, '364196', '30122016', 'Kentons Ltd', ''),
(9, '1254', '2017-01-07', 'Kentons Ltd', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchases2`
--

CREATE TABLE `purchases2` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoicesupp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases2`
--

INSERT INTO `purchases2` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `name`, `invoicesupp`) VALUES
(2, 'RS-242309', 'Lucy', '11/01/2017', 'Cash', '1300', 'Kentons Ltd', '56575'),
(3, 'RS-2023352', 'Lucy', '11/01/2017', 'Credit', '400', 'Kentons Ltd', 'jhuu'),
(4, 'INV-335833', 'pamela', '14/01/2017', 'Cash', '400', 'Kentons Ltd', 'inv2345'),
(5, 'INV-2022332', 'pamela', '14/01/2017', 'Credit', '147', 'Laborex Ltd', '147'),
(6, 'INV-38330', 'pamela', '21/01/2017', 'Cash', '', 'Kentons Ltd', '11111'),
(7, 'INV-232603', 'pamela', '21/01/2017', 'Cash', '0', 'Kentons Ltd', '111'),
(8, 'INV-00538', 'pamela', '21/01/2017', '', '540', 'transwide', '1355'),
(9, 'INV-3428349', 'pamela', '21/01/2017', 'Cash', '1040', 'Victoria Pharmaceuticals', '4568'),
(10, 'INV-874442', 'pamela', '21/01/2017', 'Credit', '500', 'Kentons Ltd', '1435'),
(11, 'INV-4669333', 'pamela', '21/01/2017', 'Cash', '500', 'Victoria Pharmaceuticals', '1456'),
(12, 'INV-250693', 'pamela', '21/01/2017', 'Cash', '558', 'Laborex Ltd', 'u765'),
(13, 'INV-22020', 'pamela', '21/01/2017', 'Cash', '100', 'Kentons Ltd', '13'),
(14, 'INV-304020', 'pamela', '23/01/2017', 'Cash', '500', 'Kentons Ltd', '1548'),
(15, 'INV-2222302', 'pamela', '23/01/2017', 'Credit', '1500', '', '15487');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases_item`
--

INSERT INTO `purchases_item` (`id`, `name`, `qty`, `cost`, `invoice`) VALUES
(1, 'P2 ORIGINAL', 12, '1800', '364196'),
(2, 'GRABACIN POWDER', 4, '360', '364196'),
(3, 'BET-23-BETAPYN TABS-18''S', 54, '1080', '364196');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(11) NOT NULL,
  `employee` varchar(60) NOT NULL,
  `date` varchar(11) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `paidby` varchar(30) NOT NULL,
  `rmks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee`, `date`, `amount`, `paidby`, `rmks`) VALUES
(1, 'mathu', '01/14/017', '5688', '', ''),
(2, 'mathu njoroge', '01/17/2017', '1000', 'pamela', ''),
(3, 'xtine', '01/18/2017', '10000', 'pamela', 'advace'),
(4, 'mathu njoroge', '01/21/2017', '10000', 'pamela', ''),
(5, 'mmmm', '01/21/2017', '48777', 'pamela', 'commissin'),
(6, 'xtine', '01/23/2017', '4500', 'pamela', 'salary'),
(7, 'xtine', '01/28/2017', '100000', 'pamela', ''),
(8, 'mathu njoroge', '01/28/2017', '2000', 'pamela', ''),
(9, 'mathu njoroge', '01/30/2017', '1000', 'pamela', 'end month salo');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `cashtendered` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `due_date` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `cashtendered`, `name`, `balance`, `due_date`) VALUES
(69, 'INV-04383', 'pamela', '01/28/2017', 'cash', '990', '', '', 'jamu', '', ''),
(70, 'INV-04383', 'pamela', '01/28/17', 'credit', '1170', '310', '', 'jamu', '', ''),
(71, 'INV-04383', 'pamela', '01/28/17', 'cash', '1170', '310', '', 'wikky', '', ''),
(72, 'INV-04383', 'pamela', '01/28/17', 'credit', '1170', '310', '', 'wikky', '', ''),
(73, 'INV-04383', 'pamela', '01/28/2017', 'credit', '1170', '310', '', 'wikky', '', ''),
(74, 'INV-04383', 'pamela', '01/28/17', 'credit', '850', '500', '', 'wikky', '', ''),
(75, 'INV-303338', 'pamela', '01/28/17', 'credit', '1125', '510', '', 'jamu', '', ''),
(76, 'INV-83022', 'pamela', '01/28/2017', 'cash', '800', '210', '100', '', '', ''),
(77, 'INV-83022', 'pamela', '01/28/2017', 'cash', '15000', '5100', '10000', '', '', ''),
(78, 'INV-63329', 'pamela', '01/28/2017', 'cash', '1500', '510', '1000', '', '', ''),
(79, 'INV-5827', 'pamela', '01/28/2017', 'cash', '1500', '510', '', 'wikky', '', ''),
(80, 'INV-000023', 'pamela', '01/28/2017', 'cash', '3000', '1020', '3000', '', '', ''),
(81, 'INV-253303', 'pamela', '01/29/2017', 'credit', '3000', '1020', '', 'wikky', '', ''),
(82, 'INV-20032', 'pamela', '01/29/2017', 'credit', '5200', '1240', '', 'wikky', '', ''),
(83, 'INV-324303', 'pamela', '01/29/2017', 'cash', '1500', '510', '', 'wikky', '', ''),
(84, 'INV-9467002', 'pamela', '01/29/2017', 'credit', '150000', '51000', '', 'wikky', '', ''),
(85, 'INV-30232560', 'pamela', '01/30/2017', 'credit', '15000', '5100', '', 'wikky', '', ''),
(86, 'INV-3052322', 'pamela', '01/30/2017', 'cash', '900', '500', '100', '', '', ''),
(87, 'INV-030323', 'pamela', '01/30/2017', 'cash', '200', '60', '1000', '', '', ''),
(88, 'INV-502033', 'pamela', '02/20/2017', 'cash', '7000', '1000', '100', '', '', ''),
(89, 'INV-04030235', 'pamela', '02/20/2017', 'cash', '5000', '1500', '100', '', '', ''),
(90, 'INV-030893', 'pamela', '02/20/2017', 'cash', '5000', '1500', '', 'wikky', '', ''),
(91, 'INV-4333333', 'pamela', '02/20/2017', 'cash', '5000', '1500', '', 'wikky', '', ''),
(92, 'INV-63023', 'pamela', '02/20/2017', 'cash', '5000', '1500', '', 'wikky', '', ''),
(93, 'INV-223230', 'pamela', '02/20/2017', 'cash', '7350', '1050', '', 'wikky', '', ''),
(94, 'INV-30393330', 'pamela', '02/22/2017', 'cash', '100', '58', '1000', '', '', ''),
(95, 'INV-22302', 'pamela', '02/22/2017', 'cash', '130', '31', '100', '', '', ''),
(96, 'INV-03203333', 'pamela', '02/22/2017', 'cash', '130', '31', '1000', '', '', ''),
(97, 'INV-03203333', 'pamela', '02/22/2017', 'cash', '130', '31', '100', '', '', ''),
(98, 'INV-03203333', 'pamela', '02/22/2017', 'cash', '130', '31', '100', '', '', ''),
(99, 'INV-33252306', 'pamela', '02/22/2017', 'cash', '130', '31', '100', '', '', ''),
(100, 'INV-240523', 'pamela', '02/22/2017', 'cash', '130', '31', '1000', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(141, 'INV-83022', '2', '100', '15000', '5100', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '150', '', '01/28/17'),
(142, 'INV-63329', '2', '10', '1500', '510', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '150', '', '01/28/17'),
(143, 'INV-5827', '2', '10', '1500', '510', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '150', '', '01/28/17'),
(144, 'INV-000023', '2', '10', '1500', '510', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '150', '', '01/28/17'),
(145, 'INV-000023', '2', '10', '1500', '510', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '150', '', '01/28/17'),
(146, 'INV-253303', '2', '20', '3000', '1020', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '150', '', '01/29/17'),
(147, 'INV-20032', '5', '40', '5200', '1240', 'UPACOF PLAIN', 'UPACOF', ' DROWSY-CPM/PROMETHAZINE ', '130', '', '01/29/17'),
(148, 'INV-324303', '2', '10', '1500', '510', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '150', '', '01/29/17'),
(149, 'INV-9467002', '2', '1000', '150000', '51000', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '150', '', '01/29/17'),
(151, 'INV-30232560', '1', '100', '15000', '5100', 'TRIHISTAMIN SYRUP 100ML', 'TRIHISTAMIN', 'COUGH SYRUP', '150', '', '01/30/17'),
(152, 'INV-3052322', '97', '10', '900', '500', 'DAZOLE B CREAM', 'CLOTRIMAZOLE $ BETAMETHASONE', ' 20GMS ', '90', '10', '01/30/17'),
(153, 'INV-030323', '258', '10', '200', '60', 'BET-23-BETAPYN TABS-18''S', 'BETAPYN', ' TABS       ', '20', '', '01/30/17'),
(154, 'INV-98082020', '2', '1', '150', '51', 'TRIMEX SYRUP 100ML', 'TRIMEX', ' COUGH  SYRUP', '150', '', '02/10/17'),
(155, 'INV-502033', '263', '20', '7000', '1000', 'bactiflox', 'ciprofloxacin', ' mepha  ', '350', '', '02/20/17'),
(156, 'INV-04030235', '264', '10', '5000', '1500', 'bactiflox 750mg', 'ciprofloxacin 750mg', ' antibiotics', '500', '', '02/20/17'),
(157, 'INV-030893', '264', '10', '5000', '1500', 'bactiflox 750mg', 'ciprofloxacin 750mg', ' antibiotics', '500', '', '02/20/17'),
(158, 'INV-4333333', '264', '10', '5000', '1500', 'bactiflox 750mg', 'ciprofloxacin 750mg', ' antibiotics', '500', '', '02/20/17'),
(159, 'INV-63023', '264', '10', '5000', '1500', 'bactiflox 750mg', 'ciprofloxacin 750mg', ' antibiotics', '500', '', '02/20/17'),
(160, 'INV-223230', '263', '1', '350', '50', 'bactiflox', 'ciprofloxacin', ' mepha  ', '350', '', '02/20/17'),
(161, 'INV-223230', '263', '10', '3500', '500', 'bactiflox', 'ciprofloxacin', ' mepha  ', '350', '', '02/20/17'),
(162, 'INV-223230', '263', '10', '3500', '500', 'bactiflox', 'ciprofloxacin', ' mepha  ', '350', '', '02/20/17'),
(163, 'INV-2223233', '22', '1', '75.2', '21', 'NOVACOFF SYRUP 500ML BLACK', 'TRICOFF', ' 500ML-BLACK ', '75.2', '6', '02/21/17'),
(164, 'INV-30393330', '17', '1', '100', '58', 'TRICOFF 100ML GREEN', 'TRICOFF', ' 100ML-GREEN  ', '100', '', '02/22/17'),
(165, 'INV-22302', '5', '1', '130', '31', 'UPACOF PLAIN', 'UPACOF', ' DROWSY-CPM/PROMETHAZINE    ', '130', '', '02/22/17'),
(166, 'INV-03203333', '8', '1', '130', '31', 'DELASED CHESTY', 'DELASED', 'CHESTY  ', '130', '', '02/22/17'),
(167, 'INV-33252306', '4', '1', '130', '31', 'UPACOF PAEDIATRIC', 'UPACOF', ' PAEDIATRIC ', '130', '', '02/22/17'),
(168, 'INV-240523', '5', '1', '130', '31', 'UPACOF PLAIN', 'UPACOF', ' DROWSY-CPM/PROMETHAZINE    ', '130', '', '02/22/17');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`, `note`) VALUES
(2, 'Kentons Ltd', 'Kisumu', 'Dr Neel', '', ''),
(3, 'Laborex Ltd', 'Kisumu', 'Joseph', '', ''),
(4, 'Victoria Pharmaceuticals', 'Kisumu', '', '', ''),
(5, 'transwide', 'nakuru', 'kamau', '1356', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `idno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `contact`, `name`, `position`, `idno`) VALUES
(10, 'pamela', 'pamela1974', '', 'pamela', 'admin', ''),
(12, 'christine', '1234', '0711874560', 'kauti', 'cashier', '30363255'),
(13, 'mathu', 'mathu', '0721365661', 'mathu', 'cashier', '27278412');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenselist`
--
ALTER TABLE `expenselist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expiries`
--
ALTER TABLE `expiries`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `expiriestt`
--
ALTER TABLE `expiriestt`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `loginusers`
--
ALTER TABLE `loginusers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `project2_audit`
--
ALTER TABLE `project2_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases2`
--
ALTER TABLE `purchases2`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `expenselist`
--
ALTER TABLE `expenselist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `expiries`
--
ALTER TABLE `expiries`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expiriestt`
--
ALTER TABLE `expiriestt`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loginusers`
--
ALTER TABLE `loginusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;
--
-- AUTO_INCREMENT for table `project2_audit`
--
ALTER TABLE `project2_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `purchases2`
--
ALTER TABLE `purchases2`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
