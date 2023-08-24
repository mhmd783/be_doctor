-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2023 at 07:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_doctor` text NOT NULL,
  `id_pationt` text NOT NULL,
  `f_name` text NOT NULL,
  `s_name` text NOT NULL,
  `id_post` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_doctor`, `id_pationt`, `f_name`, `s_name`, `id_post`, `comment`) VALUES
(15, '18', '1', 'يسريه ', 'عبدالعال', '11', 'اول كومنت '),
(16, '18', '1', 'يسريه ', 'عبدالعال', '12', 'هاي'),
(17, '18', '1', 'يسريه ', 'عبدالعال', '13', 'مش عارف'),
(18, '18', '1', 'يسريه ', 'عبدالعال', '13', 'تاني'),
(19, '18', '1', 'يسريه ', 'عبدالعال', '13', 'تالت'),
(20, '18', '1', 'يسريه ', 'عبدالعال', '12', 'اول'),
(21, '18', '1', 'يسريه ', 'عبدالعال', '11', 'التاني'),
(22, '18', '1', 'يسريه ', 'عبدالعال', '12', 'تاني'),
(23, '18', '1', 'يسريه ', 'عبدالعال', '9', 'اول'),
(24, '2', '1', 'محمد  ', 'حنفي', '13', 'مش عارف'),
(25, '14', '1', 'محمد', 'عطالله', '14', 'اول كومنت '),
(26, '14', '1', 'محمد', 'عطالله', '14', 'تاني كومنت'),
(27, '17', '1', 'محمد', 'عطالله ', '14', 'اما'),
(28, '19', '1', 'محمد', 'سالمان', '14', 'جود'),
(29, '20', '1', 'يسري', 'عليم ', '14', 'لا لا '),
(30, '4', '3', 'سيف ', 'حنفي ', '15', 'لا'),
(31, '21', '15', 'مرفت', 'امين', '16', 'هاي '),
(32, '21', '16', 'مرفت', 'امين', '17', 'الىوماتزم هو الم في المفاصل'),
(33, '2', '17', 'محمد  ', 'حنفي', '18', 'تمام ');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `s_name` text NOT NULL,
  `description` text NOT NULL,
  `specialty` text NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `age` text NOT NULL,
  `gender` text NOT NULL,
  `city` text NOT NULL,
  `area` text NOT NULL,
  `streat` text NOT NULL,
  `number_build` text NOT NULL,
  `salary` text NOT NULL,
  `rating` int(11) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `f_name`, `s_name`, `description`, `specialty`, `phone`, `email`, `pass`, `age`, `gender`, `city`, `area`, `streat`, `number_build`, `salary`, `rating`, `active`) VALUES
(2, 'محمد  ', 'حنفي', 'دكتور عيون وواخد دكتوراه في غزل العيون الحلوه ', 'اسنان', '01140374362', 'mhmdhnfy783@gmail.com', '123qw123qw', '22', 'male', 'سوهاج', 'المدمر', 'الرئيسي', '12', '150', 9, 0),
(3, 'mohamed', 'hanafy', 'hhhhhhh', 'عيون', '0111', 'mm.com', '123', '22', 'male', 'cairo', 'jfj', 'jfj', '78', '300', 1, 0),
(4, 'سيف ', 'حنفي ', 'دكتور عظام وجراحه وحاصل علي الدمتواره وبحضر للمجستير', 'عظام', '01149308251', 'mhmdhnfy783@gmail.com', '123qw123qw', '6', 'male', 'طما', 'المدمر', 'الرئيسي', '15', '360', 10, 0),
(5, 'علي', 'الدين', 'دكتور اسنان ', 'اسنان', '011147258369', 'hshshs.com', '123', '45', 'male', 'المعادي', 'الزهراء', 'شارع الحريه', '12', '240', 1, 0),
(6, 'علي', 'الدين', 'دكتور اسنان ', 'باطنه', '011147258361', 'hshshs.com', '123', '45', 'male', 'المهندسين', 'الزهراء', 'شارع الحريه', '12', '240', 2, 0),
(7, 'علي', 'الدين', 'دكتور اسنان ', 'عظام', '011147258362', 'hshshs.com', '123', '45', 'male', 'الزمالك', 'الزهراء', 'شارع الحريه', '12', '240', 1, 0),
(8, 'رحمه', 'احمد', 'دكتور اسنان ', 'نساء وتوليد', '011147258363', 'hshshs.com', '123', '45', 'fmale', 'الشيخ زايد', 'الزهراء', 'شارع الحريه', '12', '240', 1, 0),
(9, 'ايه', 'احمد', 'دكتور اسنان ', 'نفسي', '011147258364', 'hshshs.com', '123', '45', 'fmale', 'طما', 'الزهراء', 'شارع الحريه', '12', '240', 1, 0),
(10, 'ساره', 'حنفي', 'دكتور اسنان ', 'نفسي', '011147258365', 'hshshs.com', '123', '45', 'fmale', 'طهطا', 'الزهراء', 'شارع الحريه', '12', '240', 1, 0),
(11, 'بسمه', 'حنفي', 'دكتور اسنان ', 'عيون', '011147258366', 'hshshs.com', '123', '45', 'fmale', 'المراغه', 'الزهراء', 'شارع الحريه', '12', '240', 1, 0),
(12, 'حسين', 'محمود', 'دكتور شاطر ', 'تجميل', '011147258367', 'hshshs.com', '123', '45', 'male', 'سوهاج', 'الزهراء', 'شارع الحريه', '12', '240', 1, 0),
(13, 'حسن', 'خلفالله', 'دكتور شاطر ', 'اورام', '011147258368', 'hshshs.com', '123', '45', 'male', 'جهينه', 'الزهراء', 'شارع الحريه', '12', '240', 2, 0),
(14, 'محمد', 'عطالله', 'دكتور شاطر ', 'قلب', '011147258360', 'hshshs.com', '123', '45', 'male', 'الاسكندريه', 'الزهراء', 'شارع الحريه', '12', '240', 1, 0),
(15, 'مدحت', 'يسري', 'دكتور شاطر ', 'اورام', '01114725835', 'hshshs.com', '123', '45', 'male', 'الجيزه', 'الزهراء', 'شارع الحريه', '12', '240', 1, 0),
(16, 'محمد', 'نبيل ', 'اي حاجه ', 'نفسي', '01099628366', 'nnsbsb.com', '123', '22', 'male', 'المعادي', 'ميدان حسين صدقي ', 'شارع صلاح سالم', '44', '250', 1, 0),
(17, 'محمد', 'عطالله ', 'دكتور قلب وحاصل علي شهاده  دكتوراه في جراحه القلب من جامعه هارفرد ', 'قلب', '010147258369', 'mohamedattala@gmaik.com', '123', '22', 'male', 'الشيخ زايد', 'محطه فهمي ', 'شارع علي الدين ', '15', '650', 1, 0),
(18, 'يسريه ', 'عبدالعال', 'دكتوره عظام حاصله علي شهاده ماجستير في الجرحه العظميه ', 'عظام', '011123456789', 'mjmhan@gmail.com', '123', '44', 'fmale', 'طما', 'المدمر', 'الرئيسي', '33', '350', 6, 0),
(19, 'محمد', 'سالمان', 'دكتور حاصل علي دكتوراه في القلب ', 'مخ واعصاب', '011011011011', 'mmnbb@gmail.com', '123', '52', 'male', 'القاهرة', 'الزقازيق', 'شارع بهجت ', '12', '320', 1, 0),
(20, 'يسري', 'عليم ', 'دكتور باطنه وحاصل علي شهاده الدكتوراه ', 'باطنة', '011012015010', 'asdf@gmail.com', '123', '52', 'male', 'القاهرة', 'السلام', 'شارع المعز', '25', '200', 2, 0),
(21, 'مرفت', 'امين', 'دكتوره تجميل عيون', 'جراحة تجميل', '011234567890', 'merfet@gmail.com', '123', '55', 'fmale', 'سوهاج', 'ثقافه', 'الميدان', '33', '250', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `id_pationt` text NOT NULL,
  `id_post` text NOT NULL,
  `id_doctor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `id_pationt`, `id_post`, `id_doctor`) VALUES
(56, '6', '24', '2'),
(58, '6', '23', '2'),
(61, '6', '28', '6'),
(62, '6', '21', '2'),
(69, '12', '27', '6'),
(75, '12', '23', '2'),
(76, '16', '21', '2'),
(77, '16', '26', '2'),
(78, '16', '31', '16'),
(79, '16', '23', '2'),
(80, '16', '28', '6'),
(81, '16', '30', '12');

-- --------------------------------------------------------

--
-- Table structure for table `pationt`
--

CREATE TABLE `pationt` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `age` text NOT NULL,
  `gender` text NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pationt`
--

INSERT INTO `pationt` (`id`, `name`, `phone`, `age`, `gender`, `pass`) VALUES
(1, 'محمد حنفي ', '01140374362', '22', 'male', '123qw123qw'),
(2, 'mohamed', '01140386251', '', '', ''),
(3, 'ali', '55555555555', '22', '', '22'),
(4, 'ty', '25252525252525', '22', 'male', '44'),
(5, 'saif', '01148635213', '6', 'male', '123'),
(6, 'saif', '01148635213', '6', 'male', '123'),
(7, 'حنفي', '01144444444', '50', 'male', '333'),
(8, '\'ali\'', '\'011\'', '\'22\'', '\'male\'', '\'123\''),
(9, 'المصري', '02583691473', '22', 'male', '13'),
(10, 'يحيي', '015147258369', '22', 'male', '123'),
(11, 'محسن ', '369258147369', '30', 'male', '123'),
(12, 'مصطفي', '01122222222', '22', 'male', '123'),
(13, 'اسلام', '01133333333', '23', 'male', '123'),
(14, 'حنفي محموظ', '01149308251', '50', 'male', '123'),
(15, 'بشريه عبدالعال علي ', '011011011011', '47', 'male', '123'),
(16, 'ساره حنفي محمود ', '01129306525', '18', 'fmale', '12345'),
(17, 'حسين ', '01095467064', '22', 'male', 'asd123');

-- --------------------------------------------------------

--
-- Table structure for table `post_doctor`
--

CREATE TABLE `post_doctor` (
  `id` int(11) NOT NULL,
  `id_doctor` text NOT NULL,
  `f_name` text NOT NULL,
  `s_name` text NOT NULL,
  `post` text NOT NULL,
  `like` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `post_doctor`
--

INSERT INTO `post_doctor` (`id`, `id_doctor`, `f_name`, `s_name`, `post`, `like`) VALUES
(18, '2', 'محمد  ', 'حنفي', 'معلومه١', '0'),
(21, '2', 'محمد  ', 'حنفي', '٢معلومه', '0'),
(23, '2', 'محمد  ', 'حنفي', 'معلومه ٣', '0'),
(26, '2', 'محمد  ', 'حنفي', 'معلومه ٥', '0'),
(27, '6', 'علي', 'الدين', 'معلومه الدكتور علي الدين ٦', '0'),
(28, '6', 'علي', 'الدين', 'بويت٧', '0'),
(29, '12', 'حسين', 'محمود', 'معلومه خطيره اي حد ميعرفنيش يبقي ضاع عليه حاجات كتير', '0'),
(30, '12', 'حسين', 'محمود', 'نعم العلاج النفسي افضل من العلاج بالكيمياء ', '0'),
(32, '16', 'محمد', 'نبيل ', 'معلومه٢', '0'),
(33, '16', 'محمد', 'نبيل ', 'معلومه ٣', '0'),
(36, '1', 'mohamed', 'hanafy', 'العلاج الطبيعي ', '0'),
(37, '1', 'mohamed', 'hanafy', 'معلومه جديده moh', '0'),
(39, '17', 'محمد', 'عطالله ', 'بوست جديد عطالله معلومه طبيه ', '0'),
(40, '2', 'محمد  ', 'حنفي', 'بوست جديد من محمد حنفي ', '0'),
(41, '2', 'محمد  ', 'حنفي', ' يسريه ', '0'),
(43, '18', 'يسريه ', 'عبدالعال', 'بوست جديد ', '0'),
(45, '20', 'يسري', 'عليم ', 'معلومه طبيه العلاج النفسي افضل من العلاج الكيميائي ', '0'),
(46, '21', 'مرفت', 'امين', 'يا', '0'),
(47, '4', 'سيف ', 'حنفي ', '.اول منشور', '0'),
(48, '2', 'محمد  ', 'حنفي', 'بوست ١٠', '0');

-- --------------------------------------------------------

--
-- Table structure for table `post_pationt`
--

CREATE TABLE `post_pationt` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `id_pationt` text NOT NULL,
  `post` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `post_pationt`
--

INSERT INTO `post_pationt` (`id`, `name`, `id_pationt`, `post`, `comment`) VALUES
(9, 'محمد حنفي ', '1', 'اول سؤال طبي؟', '0'),
(11, 'محمد حنفي ', '1', 'سؤال طبي ٢', '0'),
(12, 'محمد حنفي ', '1', 'سؤال ٣', '0'),
(13, 'محمد حنفي ', '1', 'ايه حل الرباط الصليبي ', '0'),
(14, 'محمد حنفي ', '1', 'بوست سؤال طبي لحسن خلفالله', '0'),
(15, 'ali', '3', 'سوال ؟', '0'),
(16, 'بشريه عبدالعال علي ', '15', 'انيممية', '0'),
(17, 'ساره حنفي محمود ', '16', 'ما هو الروماتزم', '0'),
(18, 'حسين ', '17', 'سؤال طبي ', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `id_pationt` text NOT NULL,
  `id_doctor` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `id_pationt`, `id_doctor`, `rating`) VALUES
(9, '1', '21', 1),
(10, '1', '21', 1),
(11, '1', '18', 1),
(12, '1', '18', 1),
(13, '1', '15', 1),
(14, '1', '21', 1),
(15, '1', '21', 1),
(16, '1', '10', 1),
(17, '1', '7', 1),
(18, '1', '21', 1),
(19, '1', '19', 1),
(20, '1', '21', 1),
(21, '2', '18get=get', 1),
(22, '1', '18get=get', 1),
(23, '1', '18', 1),
(24, '1', '14', 1),
(25, '1', '8', 1),
(26, '1', '12', 1),
(27, '1', '4', 1),
(28, '1', '5', 1),
(29, '1', '11', 1),
(30, '1', '17', 1),
(32, '1', '20', 1),
(33, '15', '21', 1),
(34, '15', '20', 1),
(35, '15', '18', 1),
(36, '16', '21', 1),
(37, '16', '2', 1),
(39, '1', '6', 1),
(41, '1', '2', 1),
(42, '1', '3', 1),
(43, '1', '16', 1),
(44, '1', '13', 1),
(45, '1', '9', 1),
(46, '7', '2', 1),
(47, '9', '2', 1),
(48, '9', '21', 1),
(49, '17', '2', 1),
(50, '17', '21', 1),
(51, '17', '13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_pationt` text NOT NULL,
  `id_doctor` text NOT NULL,
  `name_doctor` text NOT NULL,
  `date_register` text NOT NULL,
  `name_pationt` text NOT NULL,
  `phone` text NOT NULL,
  `age` text NOT NULL,
  `date_enter` text NOT NULL,
  `send_to_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `id_pationt`, `id_doctor`, `name_doctor`, `date_register`, `name_pationt`, `phone`, `age`, `date_enter`, `send_to_doctor`) VALUES
(21, '1', '2', 'محمد   حنفي', '2023-08-15', 'محمد حنفي ', '01140374362', '22', '8/16/2023', 1),
(22, '18', '2', 'محمد   حنفي', '2023-08-15', 'يسريه  عبدالعال', '011123456789', '44', '8/16/2023', 1),
(23, '1', '18', 'يسريه  عبدالعال', '2023-08-15', 'محمد حنفي ', '01140374362', '22', '8/16/2023', 0),
(24, '1', '17', 'محمد عطالله ', '2023-08-16', 'محمد حنفي ', '01140374362', '22', '8/16/2023', 0),
(25, '1', '17', 'محمد عطالله ', '2023-08-17', 'محمد حنفي ', '01140374362', '22', '8/17/2023', 0),
(26, '1', '19', 'محمد سالمان', '2023-08-17', 'محمد حنفي ', '01140374362', '22', '8/17/2023', 0),
(27, '1', '20', 'يسري عليم ', '2023-08-17', 'محمد حنفي ', '01140374362', '22', '8/17/2023', 0),
(28, '3', '20', 'يسري عليم ', '2023-08-18', 'ali', '55555555555', '22', '8/18/2023', 0),
(29, '20', '12', 'حسين محمود', '2023-08-19', 'يسري عليم ', '011012015010', '52', '8/19/2023', 0),
(30, '21', '21', 'مرفت امين', '2023-08-19', 'مرفت امين', '011234567890', '55', '8/19/2023', 1),
(31, '3', '20', 'يسري عليم ', '2023-08-19', 'ali', '55555555555', '22', '8/19/2023', 0),
(32, '3', '21', 'مرفت امين', '2023-08-19', 'ali', '55555555555', '22', '8/19/2023', 1),
(33, '1', '21', 'مرفت امين', '2023-08-19', 'محمد حنفي ', '01140374362', '22', '8/19/2023', 1),
(34, '1', '21', 'مرفت امين', '2023-08-19', 'يسريه عبدالعال علي عبدالعال', '01140374362', '47', '8/19/2023', 1),
(35, '14', '21', 'مرفت امين', '2023-08-19', 'حنفي محموظ', '01149308251', '50', '8/19/2023', 1),
(36, '14', '2', 'محمد   حنفي', '2023-08-19', 'حنفي محمود', '01149308251', '50', '8/19/2023', 1),
(37, '15', '21', 'مرفت امين', '2023-08-19', 'بشريه عبدالعال علي ', '011011011011', '47', '8/19/2023', 1),
(38, '1', '4', 'سيف  حنفي ', '2023-08-19', 'محمد حنفي ', '01140374362', '22', '8/19/2023', 1),
(39, '15', '21', 'مرفت امين', '2023-08-22', 'سارة حنفي محمود ', '01129306525', '18', '8/28/2023', 0),
(40, '16', '21', 'مرفت امين', '2023-08-22', 'ساره حنفي محمود ', '01129306525', '18', '8/22/2023', 0),
(41, '16', '2', 'محمد   حنفي', '2023-08-22', 'ساره حنفي محمود ', '01129306525', '18', '8/22/2023', 1),
(42, '16', '2', 'محمد   حنفي', '2023-08-22', 'اميره حنفي محمود ', '01129306525', '18', '8/23/2023', 1),
(43, '7', '2', 'محمد   حنفي', '2023-08-22', 'حنفي', '01144444444', '50', '8/22/2023', 1),
(44, '9', '2', 'محمد   حنفي', '2023-08-22', 'المصري', '02583691473', '22', '8/22/2023', 1),
(45, '9', '2', 'محمد   حنفي', '2023-08-22', 'حسين', '010362726864', '22', '8/22/2023', 1),
(46, '17', '2', 'محمد   حنفي', '2023-08-22', 'حسين  محمود ', '01095467064', '22', '8/23/2023', 1),
(47, '17', '2', 'محمد   حنفي', '2023-08-22', 'حنفي محمود ', '01095467064', '50', '8/22/2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_time`
--

CREATE TABLE `work_time` (
  `id` int(11) NOT NULL,
  `id_doctor` text NOT NULL,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL,
  `day` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `work_time`
--

INSERT INTO `work_time` (`id`, `id_doctor`, `start_time`, `end_time`, `day`) VALUES
(33, '2', '1:00 PM', '6:00 PM', 'الاتنين'),
(34, '6', '1:00 PM', '6:59 PM', 'السبت'),
(35, '6', '12:30 PM', '5:30 PM', 'الاحد'),
(36, '12', '3:00 PM', '7:00 PM', 'السبت'),
(37, '12', '3:00 PM', '7:00 PM', 'الثلاثاء'),
(38, '12', '3:00 PM', '7:00 PM', 'الجمعه'),
(39, '16', '1:00 PM', '6:00 PM', 'الاحد'),
(40, '16', '1:00 PM', '6:00 PM', 'الاتنين'),
(41, '16', '1:00 PM', '6:00 PM', 'الثلاثاء'),
(42, '1', '12:40 PM', '5:30 PM', 'السبت'),
(44, '1', '1:00 PM', '6:00 PM', 'الجمعه'),
(45, '17', '1:00 PM', '7:00 PM', 'السبت'),
(46, '2', '1:00 AM', '6:00 PM', 'الاربعاء'),
(47, '18', '12:00 PM', '6:00 PM', 'الاحد'),
(48, '18', '12:00 PM', '6:00 PM', 'السبت'),
(49, '18', '12:00 PM', '6:00 PM', 'الاتنين'),
(52, '19', '00:00', '00:00', 'السبت'),
(53, '20', '1:00 PM', '6:00 PM', 'الاحد'),
(54, '20', '1:00 PM', '6:00 PM', 'السبت'),
(55, '21', '00:00', '00:00', 'الاحد'),
(56, '21', '00:00', '00:00', 'السبت'),
(57, '21', '00:00', '00:00', 'الاتنين'),
(58, '4', '12:00 PM', '6:39 PM', 'الاحد'),
(61, '2', '12:00 PM', '7:00 PM', 'السبت');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pationt`
--
ALTER TABLE `pationt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_doctor`
--
ALTER TABLE `post_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_pationt`
--
ALTER TABLE `post_pationt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_time`
--
ALTER TABLE `work_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `pationt`
--
ALTER TABLE `pationt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post_doctor`
--
ALTER TABLE `post_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `post_pationt`
--
ALTER TABLE `post_pationt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `work_time`
--
ALTER TABLE `work_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
