-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 28, 2023 at 04:15 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` int(4) NOT NULL,
  `idgroup` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `fullname`, `level`, `idgroup`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'halinh011096@gmail.com', 'ha van linh', 1, 1),
(2, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'tea4rum@gmail.com', 'Lkkk', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `name_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `name_banner`, `link_banner`) VALUES
(1, 'giảm giá các sản phẩm 50%', 'slideshow.jpg'),
(2, 'túi xách thời trang', 'slideshow_1.jpg'),
(3, 'túi xinh quà đẹp', 'slideshow_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `transaction_id` int(255) NOT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `product_id` int(255) NOT NULL,
  `slspdh` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `giaodich`
--

DROP TABLE IF EXISTS `giaodich`;
CREATE TABLE IF NOT EXISTS `giaodich` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `payment` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

DROP TABLE IF EXISTS `logo`;
CREATE TABLE IF NOT EXISTS `logo` (
  `id_logo` int(11) NOT NULL AUTO_INCREMENT,
  `name_logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `name_logo`, `image_logo`) VALUES
(1, 'logo web bán hàng', '/images/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_catalog` int(11) NOT NULL AUTO_INCREMENT,
  `name_menu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invalid_menu` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_catalog`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_catalog`, `name_menu`, `invalid_menu`) VALUES
(25, 'Túi xách', 'tui-xach'),
(26, 'Balo', 'balo'),
(27, 'Ví Bóp', 'vi-bop');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id_sanpham` int(255) NOT NULL AUTO_INCREMENT,
  `id_catalog` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code_product` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `description` text COLLATE utf8_unicode_ci,
  `content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `image_sp` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created` date DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `xuatxu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sizess` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mausac` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_name_menu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_name_sub` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_sanpham`),
  KEY `id_catalog` (`id_catalog`),
  KEY `id_catalog_2` (`id_catalog`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `id_catalog`, `id_sub`, `tensp`, `code_product`, `price`, `description`, `content`, `discount`, `image_sp`, `created`, `view`, `xuatxu`, `sizess`, `mausac`, `parent_name_menu`, `parent_name_sub`) VALUES
(16, 25, 2, 'Túi đeo chéo hình thang Philomena Puffy - Kem', '0101', '1875000.0000', '', NULL, 0, 'tui-deo-cheo-1.png', '2023-10-28', 0, 'Mỹ', 'L', 'Kem', 'túi xách', ''),
(18, 25, 3, 'Túi xách hobo da thật dáng cong Elongated - Đen\r\n', '0176', '2999000.0000', NULL, NULL, NULL, 'tui-xach-1.png', NULL, 0, 'Mỹ', 'M', 'Đen', 'túi xách', ''),
(19, 25, 3, 'Túi đeo vai nữ da thật phom nửa hình tròn Swing Padlock - Màu Be', '0075', '2200000.0000', NULL, 'Những chi tiết sắc sảo có thể biến những chiếc túi cổ điển trở nên nổi bật và chiếc túi Swing hình lưỡi liềm này là một ví dụ điển hình. Lớp hoàn thiện tông màu be vượt thời gian đi kèm với phần cứng tông vàng, chẳng hạn như chi tiết ổ khóa trên khóa kéo, dây đeo chuỗi xích, giúp tăng thêm vẻ sáng bóng và bắt mắt để thu hút mọi ánh nhìn. Được trang bị khóa kéo mở ra không gian bên trong rộng rãi, chiếc túi này sẽ chứa được nhiều vật dụng cần thiết của bạn. Với kết cấu chần bông sang trọng và những đường nét tinh tế, hãy để chiếc túi xinh xắn này đồng hành cùng bạn trong tất cả các dịp.', NULL, 'tui-xach-2.png', NULL, 0, 'Việt Nam', 'M,L', 'Be', 'túi xách', ''),
(20, 25, 1, 'Túi đeo vai dáng cong Trice Metallic Accent Belted - Noir', '0185', '1599000.0000', NULL, NULL, NULL, 'tui-xach-tay-1.png', NULL, 0, 'Việt Nam', 'S', 'Đen', 'túi xách', ''),
(21, 25, 3, 'Túi đeo vai nữ da thât phom nửa hình tròn Swing Padlock - Nhiều màu', '0081', '2905000.0000', NULL, 'Cá tính và sang trọng, chiếc túi Swing hình lưỡi liềm này chắc chắn sẽ tạo được ấn tượng mạnh. Họa tiết nhỏ giọt sắc sảo là tâm điểm của chiếc túi, được đặt trên nền đen để tạo sự tương phản thú vị. Bên cạnh phần cứng tông màu bạc, chi tiết ổ khóa, dây đeo dạng chuỗi táo bạo tạo thêm điểm nhấn cho những đường cong mềm mại của chiếc túi có hình dáng lưỡi liềm. Để tạo ấn tượng, hãy kết hợp túi với phụ kiện màu bạc và boots đế bệt màu đen.', NULL, 'tui-xach-3.png ', NULL, 0, 'Hàn Quốc', 'L,XL', 'Vàng, Đen, Be', 'túi xách', ''),
(22, 27, 4, 'Ví Este Belted Quilted - Be', '0145', '1395000.0000', NULL, NULL, NULL, 'vi-1.png', NULL, 0, 'Mỹ', 'S', 'Be', 'túi xách', ''),
(23, 27, 5, 'Ví dự tiệc dài phối dây đeo Tallulah Metallic - Hồng burgundy', '0035', '625000.0000', NULL, 'Nắm bắt phong cách lãng mạn của mùa thu với chiếc ví có khóa đẩy kim loại Tallulah. Phần cứng có tông màu vàng nổi bật trên nền ví màu đỏ tía quyến rũ, thiết kế khóa đẩy giúp tăng thêm sự thú vị về mặt hình ảnh đồng thời giữ an toàn cho tất cả các vật dụng có giá trị bên trong. Để thuận tiện khi di chuyển nhiều, hãy biến nó thành một chiếc túi đeo chéo siêu nhỏ với dây đeo dạng chuỗi có thể tháo rời cực kỳ tiện dụng.', NULL, 'vi-4.png', NULL, 0, 'Mỹ', 'M', 'Hồng burgundy', 'balo -ví', ''),
(24, 27, 4, 'Ví cầm tay nữ chữ nhật Micaela Quilted Phone - Nhiều màu', '0145', '395000.0000', NULL, 'Thành phần chất liệu: Faux leather\r\n\r\nKiểu dáng ví cầm tay nữ phom chữ nhật dáng dài thời trang\r\n\r\nNắp gập đơn giản\r\n\r\nChốt cài kim loại cao cấp\r\n\r\nThiết kế chần bông tinh tế, đẹp mắt\r\n\r\nPhối dây đeo vai chuỗi xích bản nhỏ, có thể tháo rời\r\n\r\nMàu sắc hiện đại, tinh tế, phù hợp để diện nhiều trang phục khác nhau\r\n\r\nKích thước: D3.2 x W19 x H10 (cm)\r\n\r\nXuất xứ thương hiệu: Singapore', NULL, 'vi-2.png', NULL, 0, 'Mỹ', 'S', '', 'balo -ví', ''),
(25, 27, 4, 'Ví ngắn Snap Button - Đen', '0145', '995000.0000', 'Hãy tạm rời xa những chiếc ví cồng kềnh và lựa chọn những chiếc ví nhỏ gọn, linh hoạt để có thể cho vào túi áo khoác của bạn khi đi ra ngoài. Hoàn thiện bằng tông màu đen linh hoạt, chiếc ví này sẽ dễ dàng phối với mọi loại trang phục và phục kiện khác nhau. Ngoài ra, ví được trang bị khóa zip tiện dụng giúp bạn có thể bảo quản mọi vật dụng bên trong an toàn.', NULL, NULL, 'vi-3.png', NULL, 0, 'Mỹ', 'M', 'Đen', 'balo -ví', ''),
(26, 27, 5, 'Ví Dự Tiệc CLU - Màu Bạc', '0028', '1199000.0000', NULL, NULL, NULL, 'vi5.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', ''),
(27, 25, 0, 'Túi Xách Da Thật SAT - Màu Đỏ', '0154', '2199000.0000', NULL, NULL, NULL, 'tui-xach-5.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', ''),
(28, 25, 3, 'Túi Xách Da Thật SAT - Màu Be', '0155', '1999000.0000', NULL, NULL, NULL, 'tui-xach-6.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', ''),
(52, 25, 1, 'Túi xách hình thang Cocoon Curved - Noir', '0185', '2399000.0000', NULL, NULL, NULL, 'tui-xach-tay-2.png', NULL, 0, 'Việt Nam', 'M', 'Đen', 'túi xách', ''),
(53, 25, 3, 'Túi xách hobo hình thang Buzz - Trắng', '0081', '2190000.0000', NULL, 'Một chiếc túi hoàn hảo là phải vừa phong cách vừa tiện dụng, và chiếc túi hobo Buzz này đáp ứng được điều đó. Phom túi hình thang với khóa nam châm tiện dụng, mở ra không gian bên trong rộng rãi có thể chứa tất cả những vật dụng cần thiết của bạn và hơn thế nữa. Hoàn thiện bằng tông màu trắng trang nhã, nó sẽ dễ dàng kết hợp với nhiều loại trang phục và nâng tầm bất kỳ diện mạo nào của bạn. Ngoài ra, túi còn đi kèm dây đeo có thể điều chỉnh, bạn có thể dễ dàng tùy chỉnh độ dài để phù hợp với vóc dáng và sở thích của mình.', NULL, 'tui-xach-4.png ', NULL, 0, 'Mỹ ', 'L', 'Trắng', 'túi xách', ''),
(54, 25, 1, 'Túi đeo vai dáng cong Anthea Hobo - Đen\r\n', '0185', '1599000.0000', NULL, 'Bạn đang tìm kiếm một người bạn đồng hành mới mẻ và phong cách, không đâu khác ngoài chiếc túi hobo Anthea đẹp mắt này. Với kiểu dáng linh hoạt và gu thẩm mỹ cao, chiếc túi màu đen cổ điển này sẽ dễ dàng bổ sung cho bất kỳ bộ trang phục nào trong tủ đồ của bạn. Tay cầm cong và kiểu dáng mềm mại, thoải mái là những thiết kế đặc trưng của phong cách túi hobo thuần túy. Thiết kế nhiều ngăn nhỏ phía trước giúp bạn có thể tùy ý sắp xếp những vật dụng cá nhân một cách thuận tiện nhất. Ngăn chính được bảo vệ bằng khóa kéo, đảm bảo độ an toàn và bảo mật cho những đồ đạc quan trọng. Dù đeo trên vai hay cầm trên tay, nó đều toát lên vẻ sang trọng và mang hơi hưởng của phong cách Y2K.', NULL, 'tui-xach-5.png', NULL, 0, 'Việt Nam', 'M', 'Đen', 'túi xách', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

DROP TABLE IF EXISTS `sub_menu`;
CREATE TABLE IF NOT EXISTS `sub_menu` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `name_sub` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ivalid_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_catalog` int(11) NOT NULL,
  PRIMARY KEY (`id_sub`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id_sub`, `name_sub`, `ivalid_name`, `id_catalog`) VALUES
(1, 'Túi xách tay', 'tui-xach-tay', 25),
(2, 'Túi đeo chéo', 'tui-deo-cheo', 25),
(3, 'Túi xách da thật', 'tui-xach-da-that', 25),
(4, 'Ví cầm tay', '#', 27),
(5, 'Ví dự tiệc', '#', 27);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `level` int(4) DEFAULT NULL,
  `idgroup` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `created`, `level`, `idgroup`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Hà Văn Linh', 'halinh9x6@gmail.com', '0964986096', 'Hà Nội', 0, 1, 1),
(22, 'duc', 'f1a3fb2d6b5976af47a5113ce2e03fdb', 'Linh', 'odvnoi#dsn@oiehfnio.com', '156195165189', 'sácc ', 0, 3, 1),
(23, 'tuan1997xx', '3b52d152c4b921d1c5e7c9b4e3fa29a7', 'Trần Mạnh Tuấn', 'tranmanhtuan.299@gmail.com', '0966970573', 'Hà nội', 0, 3, 1),
(24, 'linkerpt', '25d55ad283aa400af464c76d713c07ad', 'Hà Văn Linh', 'halinh011096@gmail.com', '0964876096', 'hn', 0, 3, 0),
(25, 'test', '25d55ad283aa400af464c76d713c07ad', 'test', 'test@gmail.com', '0964876096', 'Hà Nội', 0, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham` ADD FULLTEXT KEY `name` (`tensp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
