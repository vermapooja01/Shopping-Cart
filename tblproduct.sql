CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
)

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, '3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00),
(2, 'External Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
(3, 'Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00);








CREATE TABLE IF NOT EXISTS `registeredusers` (
  `firstname` varchar(32) collate latin1_general_ci NOT NULL,
  `lastname` varchar(32) collate latin1_general_ci NOT NULL,
`address` varchar(80) collate latin1_general_ci NOT NULL,
`dateofbirth` varchar(20) collate latin1_general_ci NOT NULL,
`phone` varchar(20) collate latin1_general_ci NOT NULL,
  `email` varchar(80) collate latin1_general_ci NOT NULL,
`username` varchar(32) collate latin1_general_ci NOT NULL,
`password` varchar(32) collate latin1_general_ci NOT NULL,
)