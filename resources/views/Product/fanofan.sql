-- --------------------------------------------------------
-- Máy chủ:                      127.0.0.1
-- Server version:               8.0.33 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Phiên bản:           12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for fanofan
CREATE DATABASE IF NOT EXISTS `fanofan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `fanofan`;

-- Dumping structure for table fanofan.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fanofan.category: ~0 rows (approximately)
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Ceiling Fan'),
	(2, 'Table Fan'),
	(3, 'Pedestal Fan'),
	(4, 'Window Fans'),
	(5, 'Floor fans'),
	(6, 'Wall Mount Fans'),
	(7, 'Tower Fans'),
	(8, 'Box Fans'),
	(9, 'Misting Fans'),
	(10, 'Industrial Fans'),
	(11, 'Bathroom Exhaust Fans'),
	(12, 'Whole house Fans');

-- Dumping structure for table fanofan.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `content` text NOT NULL,
  `is_to` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_feedback_user` (`id_user`),
  KEY `FK_feedback_product` (`id_product`),
  CONSTRAINT `FK_feedback_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  CONSTRAINT `FK_feedback_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fanofan.feedback: ~0 rows (approximately)

-- Dumping structure for table fanofan.photo
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int NOT NULL AUTO_INCREMENT,
  `value` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0',
  `id_product` int NOT NULL,
  PRIMARY KEY (`id_photo`),
  KEY `FK_photo_product` (`id_product`),
  CONSTRAINT `FK_photo_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fanofan.photo: ~0 rows (approximately)
INSERT INTO `photo` (`id_photo`, `value`, `status`, `id_product`) VALUES
	(1, 'ceiling-fan-1.1.jpg', '1', 1),
	(2, 'ceiling-fan-1.2.jpg', '0', 1),
	(3, 'ceiling-fan-2.jpg', '1', 2),
	(4, 'ceiling-fan-3.jpg', '1', 3),
	(5, 'ceiling-fan-4.jpg', '1', 4),
	(6, 'ceiling-fan-5.jpg', '1', 5),
	(7, 'ceiling-fan-5.2.jpg', '0', 5),
	(8, 'ceiling-fan-5.3.jpg', '0', 5),
	(9, 'ceiling-fan-6.jpg', '1', 6),
	(10, 'ceiling-fan-6.2.jpg', '0', 6),
	(11, 'ceiling-fan-6.3.jpg', '0', 6),
	(12, 'ceiling-fan-6.4.jpg', '0', 6),
	(13, 'table-fan-1.1.jpg', '1', 7),
	(14, 'table-fan-1.2.jpg', '0', 7),
	(15, 'table-fan-2.jpg', '1', 8),
	(16, 'table-fan-3.jpg', '1', 9),
	(17, 'pedestal-fan-1.1.jpg', '1', 11),
	(18, 'pedestal-fan-1.2.jpg', '0', 11),
	(19, 'pedestal-fan-1.3.jpg', '0', 11),
	(20, 'pedestal-fan-2.jpg', '1', 12),
	(21, 'pedestal-fan-3.1.jpg', '1', 13),
	(22, 'pedestal-fan-3.2.jpg', '0', 13),
	(23, 'window-fan-1.jpg', '1', 14),
	(24, 'window-fan-1.2.jpg', '0', 14),
	(25, 'window-fan-1.3.jpg', '0', 14),
	(26, 'window-fan-2.jpg', '1', 15),
	(27, 'window-fan-2.2.jpg', '0', 15),
	(28, 'window-fan-2.3.jpg', '0', 15),
	(29, 'window-fan-3.jpg', '1', 16),
	(30, 'window-fan-3.2.jpg', '0', 16),
	(31, 'window-fan-3.3.jpg', '0', 16),
	(32, 'wall-fan-1.jpg', '1', 17),
	(33, 'wall-fan-1.2.jpg', '0', 17),
	(34, 'wall-fan-1.3.jpg', '0', 17),
	(35, 'wall-fan-2.jpg', '1', 18),
	(36, 'wall-fan-2.2.jpg', '0', 18),
	(37, 'wall-fan-2.3.jpg', '0', 18),
	(38, 'wall-fan-3.jpg', '1', 19),
	(39, 'wall-fan-3.2.jpg', '0', 19),
	(40, 'floor-fan-1.jpg', '1', 20),
	(41, 'floor-fan-1.2.jpg', '0', 20),
	(42, 'floor-fan-2.jpg', '1', 21),
	(43, 'floor-fan-2.2.jpg', '0', 21),
	(44, 'floor-fan-3.1.jpg', '1', 22),
	(45, 'floor-fan-3.2.jpg', '0', 22),
	(46, 'floor-fan-3.3.jpg', '0', 22),
	(47, 'tower-fan-1.1.jpg', '1', 23),
	(48, 'tower-fan-1.2.jpg', '0', 23),
	(49, 'tower-fan-1.3.jpg', '0', 23),
	(50, 'tower-fan-2.1.jpg', '1', 26),
	(51, 'tower-fan-2.2.jpg', '0', 26),
	(52, 'tower-fan-2.3.jpg', '0', 26),
	(53, 'tower-fan-3.1.jpg', '1', 27),
	(54, 'tower-fan-3.2.jpg', '0', 27),
	(55, 'tower-fan-3.3.jpg', '0', 27),
	(56, 'box-fan-1.jpg', '1', 28),
	(57, 'box-fan-1.2.jpg', '0', 28),
	(58, 'box-fan-1.3.jpg', '0', 28),
	(59, 'box-fan-1.4.jpg', '0', 28),
	(60, 'box-fan-2.1.jpg', '1', 29),
	(61, 'box-fan-2.2.jpg', '0', 29),
	(62, 'box-fan-2.3.jpg', '0', 29),
	(63, 'box-fan-3.1.jpg', '1', 30),
	(64, 'box-fan-3.2.jpg', '0', 30),
	(65, 'box-fan-3.3.jpg', '0', 30),
	(66, 'misting-fan-1.jpg', '1', 31),
	(67, 'misting-fan-1.2.jpg', '0', 31),
	(68, 'misting-fan-1.3.jpg', '0', 31),
	(69, 'misting-fan-2.jpg', '1', 32),
	(70, 'misting-fan-2.2.jpg', '0', 32),
	(71, 'misting-fan-2.3.jpg', '0', 32),
	(72, 'misting-fan-3.jpg', '1', 33),
	(73, 'misting-fan-3.2.jpg', '0', 33),
	(74, 'misting-fan-3.3.jpg', '0', 33),
	(75, 'industrial-fan-1.jpg', '1', 34),
	(76, 'industrial-fan-1.2.jpg', '0', 34),
	(77, 'industrial-fan-1.3.jpg', '0', 34),
	(78, 'industrial-fan-2.jpg', '1', 35),
	(79, 'industrial-fan-2.2.jpg', '0', 35),
	(80, 'industrial-fan-2.3.jpg', '0', 35),
	(81, 'industrial-fan-3.jpg', '1', 36),
	(82, 'industrial-fan-3.2.jpg', '0', 36),
	(83, 'industrial-fan-3.3.jpg', '0', 36),
	(84, 'bath-fan-1.jpg', '1', 37),
	(85, 'bath-fan-2.jpg', '1', 38),
	(86, 'bath-fan-3.jpg', '1', 39),
	(87, 'whole-fan-1.1.jpg', '1', 40),
	(88, 'whole-fan-1.2.jpg', '0', 40),
	(89, 'whole-fan-1.3.jpg', '0', 40),
	(90, 'whole-fan-2.1.jpg', '1', 41),
	(91, 'whole-fan-2.2.jpg', '0', 41),
	(92, 'whole-fan-2.3.jpg', '0', 41),
	(93, 'whole-fan-3.1.jpg', '1', 42),
	(94, 'whole-fan-3.2.jpg', '0', 42),
	(95, 'whole-fan-3.3.jpg', '0', 42);

-- Dumping structure for table fanofan.product
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `name_product` varchar(100) NOT NULL,
  `money` decimal(18,3) NOT NULL DEFAULT '0.000',
  `content` text NOT NULL,
  `id_category` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_product`),
  KEY `FK_product_category` (`id_category`),
  CONSTRAINT `FK_product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fanofan.product: ~0 rows (approximately)
INSERT INTO `product` (`id_product`, `name_product`, `money`, `content`, `id_category`) VALUES
	(1, 'Bianco 25 Inches Short Blade Ceiling Fan', 21.700, 'This is a 25 Inches  Ceiling Fan with a short blade. It is Bianco Ceiling fan with four short blades. The Fan is an excellent part of your interior with its classy brown colour and design trimmings on the flanges. It is ideal for your decorated interiors. This Fan can be used in small rooms so that it can easily cover the room. It is also good for rooms with low roof to avoid accident or cutting someone that is very tall. For people who emphasise on looks, the stylish ceiling Fan can emerge with all kinds of interior design. Along with its looks, this Ceiling Fan can offer you equally powerful performance.  This is a 25 Inches  Ceiling Fan with a short blade. It is Bianco Ceiling fan with four short blades. The Fan is an excellent part of your interior with its classy brown colour and design trimmings on the flanges. It is ideal for your decorated interiors. This Fan can be used in small rooms so that it can easily cover the room. It is also good for rooms with low roof to avoid accident or cutting someone that is very tall. For people who emphasise on looks, the stylish ceiling Fan can emerge with all kinds of interior design. Along with its looks, this Ceiling Fan can offer you equally powerful performance.    This is a 25 Inches  Ceiling Fan with a short blade. It is Bianco Ceiling fan with four short blades. The Fan is an excellent part of your interior with its classy brown colour and design trimmings on the flanges. It is ideal for your decorated interiors. This Fan can be used in small rooms so that it can easily cover the room. It is also good for rooms with low roof to avoid accident or cutting someone that is very tall. For people who emphasise on looks, the stylish ceiling Fan can emerge with all kinds of interior design. Along with its looks, this Ceiling Fan can offer you equally powerful performance.  This is a 25 Inches  Ceiling Fan with a short blade. It is Bianco Ceiling fan with four short blades. The Fan is an excellent part of your interior with its classy brown colour and design trimmings on the flanges. It is ideal for your decorated interiors. This Fan can be used in small rooms so that it can easily cover the room. It is also good for rooms with low roof to avoid accident or cutting someone that is very tall. For people who emphasise on looks, the stylish ceiling Fan can emerge with all kinds of interior design. Along with its looks, this Ceiling Fan can offer you equally powerful performance. This is a 25 Inches  Ceiling Fan with a short blade. It is Bianco Ceiling fan with four short blades. The Fan is an excellent part of your interior with its classy brown colour and design trimmings on the flanges. It is ideal for your decorated interiors. This Fan can be used in small rooms so that it can easily cover the room. It is also good for rooms with low roof to avoid accident or cutting someone that is very tall. For people who emphasise on looks, the stylish ceiling Fan can emerge with all kinds of interior design. Along with its looks, this Ceiling Fan can offer you equally powerful performance.  This is a 25 Inches  Ceiling Fan with a short blade. It is Bianco Ceiling fan with four short blades. The Fan is an excellent part of your interior with its classy brown colour and design trimmings on the flanges. It is ideal for your decorated interiors. This Fan can be used in small rooms so that it can easily cover the room. It is also good for rooms with low roof to avoid accident or cutting someone that is very tall. For people who emphasise on looks, the stylish ceiling Fan can emerge with all kinds of interior design. Along with its looks, this Ceiling Fan can offer you equally powerful performance.    This is a 25 Inches  Ceiling Fan with a short blade. It is Bianco Ceiling fan with four short blades. The Fan is an excellent part of your interior with its classy brown colour and design trimmings on the flanges. It is ideal for your decorated interiors. This Fan can be used in small rooms so that it can easily cover the room. It is also good for rooms with low roof to avoid accident or cutting someone that is very tall. For people who emphasise on looks, the stylish ceiling Fan can emerge with all kinds of interior design. Along with its looks, this Ceiling Fan can offer you equally powerful performance.  This is a 25 Inches  Ceiling Fan with a short blade. It is Bianco Ceiling fan with four short blades. The Fan is an excellent part of your interior with its classy brown colour and design trimmings on the flanges. It is ideal for your decorated interiors. This Fan can be used in small rooms so that it can easily cover the room. It is also good for rooms with low roof to avoid accident or cutting someone that is very tall. For people who emphasise on looks, the stylish ceiling Fan can emerge with all kinds of interior design. Along with its looks, this Ceiling Fan can offer you equally powerful performance', 1),
	(2, '24\'\' Ceiling Fan With Four Blade', 22.900, 'This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years  This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years  This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years  This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years  This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many yearsThis 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years  This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years  This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years  This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years  This 24inc GOLDEN BREEZE celing  fan is a very strong product that will give you that cool breeze and its noiseless when working it can work for long hours  the coil is made of pure 100% copper wire to enable it work for long hours,it is a rugged and strong fan that can last for so many years', 1),
	(3, 'Orl MEGA 62\'\' Ceiling Fan', 58.700, 'This Ceiling Fan goes at high speed for strong breeze and has a five-speed regulator with a minimum 80 percent regulation. With a 62-inch sweep, it has a permanently lubricated double ball bearing assembly for a noise-free and long-lasting operation.', 1),
	(4, 'Ceiling Fan-56\'inches', 24.400, 'Ceiling Fan with Efficient Air Circulation, noise free and Durable. Parts are made of rust free parts. It can be used in any area of your home like living room, dining room and bedroom so long as there is a power outlet close by. ', 1),
	(5, 'Whisper DC Ceiling Fan with Remote Control by Claro – White 48″', 25.400, 'The Claro Whisper 48″  blends into any décor with its 3 quality curved ABS plastic blades and sleek modern look. The Whisper brings together great function, design and value into one with its energy efficient DC motor making it a perfect addition to bedrooms and lounge areas alike.', 1),
	(6, 'PowerHouse Brown 1200 mm Ceiling Fan Rock Star', 13.300, 'Buy PowerHouse Brown 1200 mm Ceiling Fan Rock Star online in India at wholesale rates. If you have been looking for PowerHouse Brown 1200 mm Ceiling Fan Rock Star dealers, your search ends here as you can get the best PowerHouse Brown 1200 mm Ceiling Fan Rock Star distributors in top cities such as Delhi NCR, Mumbai, Chennai, Bengaluru, Kolkata, Chennai, Pune, Jaipur, Hyderabad and Ahmedabad. You can purchase PowerHouse Brown 1200 mm Ceiling Fan Rock Star of the finest quality and rest assured to get the best in terms of both durability and performance. If you are bothered about the PowerHouse Brown 1200 mm Ceiling Fan Rock Star prices, you can be totally sure to get the best rates as Industrybuying brings you genuine PowerHouse Brown 1200 mm Ceiling Fan Rock Star rates and quality assured products only from the best of brands with exclusive brand discounts you won’t find anywhere else. Procure PowerHouse Brown 1200 mm Ceiling Fan Rock Star today and avail the best offers on your purchase.', 1),
	(7, 'Krypton Table Fan 8 Inch', 8.800, 'Krypton KNF6035 8-Inch Table Fan - Portable Desk Top Fan Just what you need in the middle of a hot summer, this 8 inch Oscillating Desk Fan from Krypton is perfect for keeping on you. Designed in a durable polymer, the fan is a essential item it has long lasting PP blades to keep you cool. This item will be a valuable addition to your edition this summer. Ideal for using at work or at home, conservatory, garage, outbuilding, mobile home or caravan! This portable fan has two speed settings with turning knob controls you can have greater flexibility over the cooling speed and are positioned right on the base of the unit, which means you, can easily adjust fan speed to suit your needs. It has adjustable tilt action and a mesh guard to add extra protection against the spinning blades. It benefits from an oscillating feature which means the air is evenly distribute. With its quiet, smooth operation this portable desk fan is the ideal cooling solution for hot sticky days. The sturdy base of this fan means it can be placed securely on your desk or table, perfect for supporting its oscillating feature.', 2),
	(8, 'App Controlled Portable Bluetooth USB Led Display FAN', 11.900, 'This is fun to look at and useful too! It’s USB powered, but also features a full colour integrated display! Using the free app, you can connect to the fan via Bluetooth. From there you can configure display of time/temperature, or a configurable full colour text message! If that wasn’t enough, upload up to 10 of your favourite photos - now THAT is amazing! The free app is available on Google Play or Apple iTunes.This smart USB LED fan can be used to display text and pictures while performing air-blowing function. It is portable and can be used on desk, and other various places. It is designed with Wide, triple-blade design to enhance easy air spreading and blowing. The installed APP comes with 12 pre-loaded messages, 12 icons, and 96 graphics.', 2),
	(9, 'Century 12\'\' Rechargeable Table Fan FRCT-30-A1- White', 35.500, '3 in 1 Rechargeable & Automatic Emergency Fan, Duration- 11 hours (Low Speed), 6 hours (Middle Speed), 4 hours (High Speed), DC &AC Power Supply available with high powered LED light, USB Function, 3 BladeFunctionality for Efficient Airflow, Charging & Full Charge Indicator Light,Over-discharge & Overcharge Protection, 3-Step Speed Control, AutomaticOscillation, Touch & Tilt Neck, Extra Low Noise & Durable Motor, PortableHandle offers Convenient Indoor & Outdoor Use', 2),
	(11, 'Royal Glamour TCP Fan', 31.500, 'All FanoFan are made with Electrical Steel Sheet and winded with 99.99% pure copper wire to ensure the best electrical efficiency and service value. All Royal Fans are made using only the Hi-Grade materials and modern manufacturing and come with industry-leading LifeTime Guarantee. Specifications  Size Sweep Size Rated Power Speed Air Delivery Service Value (m3/min/W) 18" 450mm 55W 1350RPM 110 m3/min 2.00  Rated Voltage: 230±10V ', 3),
	(12, 'Royal Magnum Black Pedestal Fan', 33.500, 'Royal Deluxe Series are carefully crafted to comfort you in the hot summer days. The attractive design and energy-saving technology is a relief worth enjoying. Whenever the fan is turned on it casts a spell of peace and convenience. All Royal Fans are made with Electrical Steel Sheet and winded with 99.99% pure copper wire to ensure the best electrical efficiency and service value.', 3),
	(13, 'Pedestal Deluxe ACDC Fan', 51.700, 'Pedestal Deluxe ACDC Fan', 3),
	(14, 'Basics Window Fan with Manual Controls, Twin 9 Inch Blades, White', 41.500, 'Window fan with two fan heads with 9 inch blades', 4),
	(15, 'Bionaire Window Fan with Twin 8.5-Inch Reversible Airflow Blades and Remote Control, White', 70.000, 'Draws in cool air, exhausts hot air, or exchanges air with outside. Displays the current on LED digital display', 4),
	(16, 'Comfort Zone CZ319WT2 9" Twin Window Fan with Reversible Airflow Control, White', 40.000, 'VERSATILE AND PORTABLE DESIGN: Experience the convenience of this twin blade window fan\'s versatile design. Equipped with two sturdy feet, it can be easily placed on a tabletop or any flat surface, providing optimal airflow wherever you need it within your home. The fan features a convenient carrying handle, allowing for effortless portability and the flexibility to move it from room to room. Enjoy the convenience and versatility of this fan\'s design, ensuring cool and refreshing air throughout your living space, wherever you may need it.', 4),
	(17, 'USHA Colossus Rust Free Aluminium Blade 400mm Wall Fan (Red)', 43.800, 'Corrosion Resistant Aluminium Blades: Aluminum blades make the fan rust free thus improving performance and ensuring longer life;Higher Air Delivery of 92 cmm : Aluminium blades provide strength for Higher Air Delivery at normal speed compared to other normal speed fans', 6),
	(18, 'Atomberg Renesa 400mm Wall Fan', 44.000, 'ENERGY EFFICIENT BLDC WALL FAN: Atomberg Renesa is an energy-efficient wall fan powered by BLDC motor technology. This high-speed fan delivers 1500 RPM for an airflow rate of 76 CMM at top speed. The super-efficient BLDC motor draws only 35W, saving up to 65% in electricity consumption.', 6),
	(19, 'Orient Electric PP Plastic Wall-44 Trendz Fan', 31.200, 'Orient wall fans are programmed to deliver you the best in terms of service and money and are power-saving at the same time.Our range of wall fans are ergonomically designed with easy speed controls which let you regulate the wall fans easily.The aerodynamic design of the Orient wall fans gives them an extra edge as they aid them in giving you the maximum speed with minimum noise.High speed wall fans can be used for both official and residential purposes.', 6),
	(20, 'FanoFan 20 Inch Floor Fan Metal', 82.500, 'Stylish and modern, this 20 inch fan is designed to sit on the floor to keep larger living, study or work areas cool. 3 speed settings and adjustable tilt function to direct the airflow just where you need it.', 5),
	(21, 'FanoFan 18 Inch Floor Fan', 44.500, 'Keep cool on hot summer days with this 18 inch 5 blade fan floor fan. It has 3 speed settings and adjustable tilt function so you can direct it just where you need it.', 5),
	(22, 'Simple Deluxe HealSmart 20 Inch 3-Speed High Velocity Heavy Duty Metal Industrial', 66.300, '20 Inch 3-Speed High Velocity Heavy Duty Floor Fan for Industrial, Commercial, Residential, and Greenhouse Use, Black', 5),
	(23, 'Challenge White Tower Fan - 29 Inch', 57.200, 'Get the power of a tower to cool your room or office fast. With 3 speed settings for oscillation and a wide-angle feature, this fan will deliver breezy air quickly. It also has a 2-hour timer if you want to set it to your individual needs. Lightweight with a carry handle it\'s easy to pick up and port to wherever you want to go.', 7),
	(26, 'Challenge Digital Grey Tower Fan', 82.500, 'Cool off without leaving your seat with this digitally controlled tower fan. Simply use the multi-functional remote to select between the 3 speed settings or programme the timer up to 7.5 hours. The 3 different wind modes (natural, slumberous, and normal) combined with the oscillating function allow for air to flow around your room, chilling even the warmest summer nights.', 7),
	(27, 'Dimplex DXMBCF Black Tower Fan', 108.000, 'The Dimplex tower fan has a modern, stylish design which is complemented by a sleek blue light. The remote control function means you can control the fan settings with ease and convenience, even from the comfort of your sofa.', 7),
	(28, 'Simple Deluxe 20” Box Fan, 3-Speed Cooling Fan with Aerodynamic Shaped Fan Blades', 36.000, 'Small, but powerful, you’ll be very impressed with the power behind this little fan. Its compact design makes it perfect for tabletop use and the carry handle allows you to take it wherever you want.', 8),
	(29, 'PELONIS 3-Speed Box Fan for Full-Force Circulation with Air Conditioner, White', 45.000, 'The 20 Inch Pelonis Floor Fan is basic but not simple. With three speed settings, it could easily accommodate your cooling needs. It is compact,quiet, affordable and the glossy black finish will match any home style.', 8),
	(30, 'Black + Decker 9 inches Frameless Tabletop Box Fan, White', 23.000, 'This BLACK+DECKER framless box fan is the perfect addition just about anywhere in the house where increased air flow is a necessity. You have three speeds to control the spin of the durable, 9" blade all housed in an attractive, self-standing framless design. Operating from the unit itself, you\'ll have that much needed relief in seconds. Included Components: 9 in. Frameless Table Top Fan', 8),
	(31, 'FanoFan 16" Outdoor Misting Stand Fan, Hose Connection, 3 Speeds, Black', 120.000, 'Holmes 16" Outdoor Misting Stand Fan makes cooling your outdoor space a breeze. Ideal for warm, dry, humid weather, this unique fan can cool you down quickly with 3 speeds and 3 micro-mist settings. The outdoor pedestal fan is designed to connect to your garden hose with no special attachments or installation, and the adjustable 3 mist nozzles provide a cooling spray mist that adds moisture to the air. Motorized 80° oscillation delivers cool airflow for wide areas, the adjustable 37” to 53” height and 25° head tilt allow you to direct airflow where you need it most. Ideal for outdoor living spaces, backyards, patios, barbeques, parties, terraces and more. Includes a GFCI plug for added safety and hose clips to keep the cord in place. With a sturdy base, matte black finish and 3-year limited warranty, this 2-in-1 cooling and misting fan is the ideal summer companion.', 9),
	(32, 'FanoFan  10000mAh Battery Operated Misting Fan with Clip, 8-Inch Mist Fan for Desk', 55.000, 'There are lots of us that turn our backyards into a living room in the summer. We love to dine outdoors, relax outdoors, and just enjoy the sanctuary that is our backyard.One of the best inventions on the market for outdoor living, is the misting fan. You know these. You’ll find them on restaurant patios, at amusement parks, and summer festivals.', 9),
	(33, 'Deco Breeze Oscillating Outdoor Fan with Misting Kit, 3-Cooling Speed, Antique Water Fan, 18 inches', 135.000, 'Put an end to hot weather dampening your day with our unique and stylish misting fan. Our outdoor fan is perfect for those sticky, hot, and unbearable summer days. Make your outdoors a little more comfortable and stylish with our smartly weathered and portable misting fan. The outdoor fan features clean lines, a retro feel, and a faux rope design at the bottom with a rich bronze color. Crafted to cool you down, this water fan is the perfect accessory for your home. This patio fan has a three-speed setting that you can easily adjust to customize the airflow. The 18” fan head has oscillation and tilting features to make it easier to direct the breeze. More importantly, the fan has a “Wet Listed” safety rating ensuring that it can be used outdoors without any worries.', 9),
	(34, 'Simple Deluxe 24 Inch Heavy Duty Metal Industrial Fan, 3 Speed , Yellow', 114.100, 'Simple Deluxe 24 Inch High Velocity Air Movement Heavy Duty Metal Drum Fan 3 Speed Air Circulation for Industrial, Commercial, Residential, and Shop Use.', 10),
	(35, 'AmazonCommercial HVF20-SP Industrial Fan, 20", Black', 75.300, 'Commercial 20-Inch High Velocity Industrial Fan; Heavy-duty metal construction; Spiral grill; 3 aluminum blades; 3 speeds; Rotary knob switch; 100% copper motor', 10),
	(36, 'iLIVING 24" High Velocity Drum Industrial Fan', 109.000, 'This iLIVING 24" portabel floor fan is designed to move large volumes of air; ideal for offices, factories, warehouses, loading docks, greenhouse, barn and auto shops. The fan speed is adjustable with 2 settings, High and Low, Max 7700 CFM, allowing you to adjust the air circulation to your desired power, while still being cost and energy efficient, using only 220 watts at maximum speed. This fan has a 3-blade aluminum propeller with a built-in 360° rotation feature. The fan housing is constructed of heavy-duty steel with powder-coated finish. Motor RPM: 1100, Operating Amps: 1.9A, Industrial Applications, Fully Assembled, Max. Ambient Temp. 104°F (40°C), Totally Enclosed Air-Over-Motor Enclosure, Class B Motor Insulation, Auto Thermal Protection, Roller Bearing Type Ball, 30"H x 30 1/2"W x 13 1/4"D, 6.5 ft. cord, NEMA plug 5-15P, 3 Aluminum Blades, Steel Housing, 7" (17.8 cm) Plastic and Rubber Casters, Steel Guard, Standards: UL USA and Canada.', 10),
	(37, 'WhisperFit DC 110 CFM 1.2 Sone Ceiling Mounted Bath Exhaust Fan with Energy Star Rating', 130.000, 'The ECM DC Motor with SmartFlow Technology ensures optimal CFM output & desired airflow. Extremely quiet less than 0.3 sones at 50 CFM, 0.3 sones at 80 CFM and 0.8 sones at 110 CFM when using 4 in. duct. Low profile housing design at 5 5/8 in. deep, fits in 2 in. x 6 in. construction. Alignment guide slides housing in place for a tight fit; temporary clip holds fan in place so installer has 2 hands free to insert motor; templet to assure hole size & protect parts from dust; & slide & snap-in junction box & duct collar UL listed for tub/shower enclosure when GFCI protected and Home Ventilating Institute (HVI) Certified Can be used to comply with ASHRAE 62.2, LEED, IAP, and California Title 24. Covered under a 3 year parts and a 6 year motor warranty', 11),
	(38, '00 CFM 0.5 Sone Ceiling Mounted LED Lighted Exhaust Fan with Smart Flow Technology', 166.000, 'Smart Flow Technology: Gives your exhaust fan the ability to sense static pressure in convoluted duct setups, which responds by raising the CFM output so that your ventilation needs are always met. With Panasonic\'s Smart Flow Technology, you\'ll never have to worry about your exhaust fan\'s optimal CFM no matter the ducting you may have installed.', 11),
	(39, '70 CFM 3.5 Sone Ceiling Mounted HVI Certified Utility Fan with Light (Bulb Sold Separately)', 65.000, 'Heater Included: Stepping out of your shower or tub into a cold bathroom can be a shocking experience. Keep your bathroom area comfortably temperate with the built-in heater. Permanently Lubricated: This fan features a motor that is permanently lubricated. The result is a product with a long service life and lower maintenance costs. High Sones: We know that comfort and ambience matter in your bathroom. This fan produces 3.5 sones of sound output while the fan is in operation. Low CFM Capacity: This fan has an efficient 70 CFM (cubic feet per minute) of clearing capacity designed for smaller bathrooms. Controlling humidity in your bathroom extends the life of your décor and makes for a more hospitable space to prepare for the day ahead.', 11),
	(40, 'Quiet Cool QC CL-4700 Whole House Fan', 999.000, 'The primary benefit of the QC CL-4700 is its quiet operation. This whole house fan is installed suspended from the attic rafters which helps cut down on the noise. The included acoustical insulated flex duct also helps keep the noise from the fan you hear in your house to a minimum.', 12),
	(41, 'Quiet Cool ES-7000 Whole House Fan', 1569.000, 'The Quiet Cool ES-7000 uses a unique, patented design that uses an acoustical duct attached to an R5 damper box. The result is almost zero noise vibration and whisper quiet operation. This model whole house fan uses the innovative ECM energy saver motor that uses hardly any power while moving extreme amounts of air. The QuietCool QC ES-7000 is designed to be installed centrally in extra large homes. Simply open a window when you get home from work, flip on the QuietCool and enjoy a peaceful and cool evening relaxing.', 12),
	(42, 'Roof Mount Whole House Fan with Damper Box', 1329.000, 'This roof mounted fan is great for applications that cannot use a standard whole house fan such as a manufactured home, home with a flat roof or a home with a sealed attic.', 12);

-- Dumping structure for table fanofan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` char(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` char(5) NOT NULL DEFAULT 'usr',
  `is_verified` tinyint DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'user.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fanofan.user: ~0 rows (approximately)
INSERT INTO `user` (`id`, `username`, `email`, `phone`, `password`, `user_type`, `is_verified`, `token`, `avatar`) VALUES
	(1, 'admin', 'admin@gmail.com', '1234567890', '25f9e794323b453885f5181f1b624d0b', 'adm', NULL, NULL, 'user.png'),
	(2, 'vtnq', 'votannamquoc@gmail.com', '0929882588', '25f9e794323b453885f5181f1b624d0b', 'usr', NULL, NULL, 'user.png');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
