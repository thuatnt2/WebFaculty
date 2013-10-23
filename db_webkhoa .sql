/*
MySQL Backup
Source Server Version: 5.5.32
Source Database: db_webkhoa
Date: 18/09/2013 21:09:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_ad` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Sodt` varchar(20) DEFAULT NULL,
  `id_quyen` int(11) NOT NULL,
  PRIMARY KEY (`id_ad`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `answer`
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qid` int(10) unsigned NOT NULL,
  `atitle` varchar(255) NOT NULL,
  `acount` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `loaitin`
-- ----------------------------
DROP TABLE IF EXISTS `loaitin`;
CREATE TABLE `loaitin` (
  `idloai` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(255) NOT NULL,
  PRIMARY KEY (`idloai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qtitle` varchar(255) NOT NULL,
  `qdate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tblgiaovien`
-- ----------------------------
DROP TABLE IF EXISTS `tblgiaovien`;
CREATE TABLE `tblgiaovien` (
  `idGV` int(10) NOT NULL AUTO_INCREMENT,
  `tkGiaoVien` varchar(20) NOT NULL,
  `mkGiaoVien` varchar(30) NOT NULL,
  `tenGiaoVien` varchar(25) NOT NULL,
  `ChucVu` varchar(30) NOT NULL,
  `Sodt` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`idGV`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tblphanquyen`
-- ----------------------------
DROP TABLE IF EXISTS `tblphanquyen`;
CREATE TABLE `tblphanquyen` (
  `id_quyen` int(11) NOT NULL AUTO_INCREMENT,
  `tenquyen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_quyen`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tbltheloai`
-- ----------------------------
DROP TABLE IF EXISTS `tbltheloai`;
CREATE TABLE `tbltheloai` (
  `id_theloai` int(11) NOT NULL AUTO_INCREMENT,
  `ten_theloai` varchar(20) NOT NULL,
  PRIMARY KEY (`id_theloai`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tbltintuc`
-- ----------------------------
DROP TABLE IF EXISTS `tbltintuc`;
CREATE TABLE `tbltintuc` (
  `id_tintuc` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` varchar(255) NOT NULL,
  `noidung` varchar(10000) NOT NULL,
  `tacgia` varchar(50) DEFAULT NULL,
  `ngaythang` datetime NOT NULL,
  `id_theloai` int(11) NOT NULL,
  `ten_anh` varchar(50) NOT NULL,
  `hien_an` int(5) NOT NULL,
  `solanxem` int(11) NOT NULL,
  PRIMARY KEY (`id_tintuc`),
  KEY `id_theloai` (`id_theloai`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tbl_theloaitbgv`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_theloaitbgv`;
CREATE TABLE `tbl_theloaitbgv` (
  `idLoaiTB` int(10) NOT NULL AUTO_INCREMENT,
  `tenLoai` varchar(255) NOT NULL,
  PRIMARY KEY (`idLoaiTB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tbl_thongbaogv`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_thongbaogv`;
CREATE TABLE `tbl_thongbaogv` (
  `idTB` int(10) NOT NULL,
  `idLoaiTB` int(10) NOT NULL,
  `idGV` int(10) NOT NULL,
  `tenTB` varchar(255) NOT NULL,
  `ndTB` varchar(10000) NOT NULL,
  `anh` varchar(50) NOT NULL,
  `hien_an` int(5) NOT NULL,
  `solanxem` int(11) NOT NULL,
  PRIMARY KEY (`idTB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `upload`
-- ----------------------------
DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(555) NOT NULL,
  `path` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `idloai` int(11) DEFAULT NULL,
  `dem` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `useronline`
-- ----------------------------
DROP TABLE IF EXISTS `useronline`;
CREATE TABLE `useronline` (
  `tgtmp` int(15) NOT NULL DEFAULT '0',
  `ip` varchar(100) DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tgtmp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `admin` VALUES ('1','abc','654321','anh123','','','2'), ('2','vy','123456','vyvo','','1','1'), ('3','tuongvy','1234567','Võ Thị Tường Vy','','','2'), ('4','a','à','a','ấ','','2'), ('5','','','','','','2'), ('6','','','','','','2'), ('7','','','','','','2'), ('8','df','1111111','sd','a@g.com','11111111111','2'), ('9','12','','','','','0'), ('10','as','123456','asss','s@g.c','0905123456','2');
INSERT INTO `answer` VALUES ('1','1','Mạng','66'), ('2','1','Lập trình Nhúng','7'), ('3','1','Lập trình phần mềm','4');
INSERT INTO `loaitin` VALUES ('1','Biểu mẫu'), ('2','Mẫu đồ án');
INSERT INTO `question` VALUES ('1','Bạn thích nhất chuyên ngành nào?','2013-07-25');
INSERT INTO `tblgiaovien` VALUES ('1','dbl32565','dbl32565','Đặng Bá Lưuu','ThS. GVC','0905311886','dblu@dut.udn.vn'), ('2','phk354543','phk354543','Phan Huy Khánh','PGS. TS. Giảng viên','0905078999','khanhph@vnn.vn'), ('3','hph232323','123456','Hồ Phan Hiếu','ThS. Cán bộ','0905169900','hophanhieu@gmail.com'), ('17','dtth232323','123456','Đỗ Thị Tuyết Hoa','ThS. Giảng viên','905280930','dtthoa@dut.udn.vn'), ('5','hth232323','123456','Hoàng Thị Hương','CN. Thư ký Khoa','01278798499','huongcnttbk@gmail.com'), ('6','hth232323','123456','Hoàng Thị Hương','CN. Thư ký Khoa','01278798499','huongcnttbk@gmail.com'), ('7','dtb232323','123456','Đặng Thiên Bình','ThS. Giảng viên','0955514542','binh01t2@yahoo.com'), ('8','ntb232323','123456','Nguyễn Thanh Bình','TS. Trưởng Khoa','0914747974','ntbinh@dut.udn.vn'), ('9','tnc232323','123456','Trương Ngọc Châu','TS. GVC. Trưởng BM	','0905026168','tnchau@dut.udn.vn'), ('10','nkd232323','123456','Ninh Khánh Duy','NCS. Giảng viên','0904275882','ninhkhanhdut@gmail.com'), ('11','tcd232323','123456','Trịnh Công Duy','NCS. Cán bộ','0905577989','congduy@gmail.com'), ('12','nvqd232323','123456','Nguyễn Võ Quang Đông','KS. Giảng viên','0906402469','dongnvd@gmail.com'), ('13','vth232323','123456','Võ Trung Hùng','PGS. TS. Giảng viên','0905847373','Hung.Vo-Trung@ud.edu.vn'), ('14','hhh232323','123456','Huỳnh Hữu Hưng','TS. Phó Trưởng Khoa','0905444669','hhhung@dut.udn.vn'), ('15','mvh232323','123456','Mail Văn Hà','ThS. Giảng viên','0905161888','mvha888@gmail.com'), ('16','ltmh232323','123456','Lê Thị Mỹ Hạnh','NCS. Giảng viên','05113507008','ltmhanh@dut.udn.vn'), ('18','vdh232323','123456','Võ Đức Hoàng','ThS. Cán bộ','0906477283','hoangkasu@gmail.com'), ('19','tmh232323','123456','Trương Minh Huy','KS. Cán bộ','0905092088','truongminhhuy@gmail.com'), ('20','ntmh232323','123456','Nguyễn Thị Minh Hỷ','ThS. Giảng viên','0989600305','minhy81199@yahoo.com'), ('21','ntk232323','123456','Nguyễn Tấn Khôi','TS. Phó Trưởng Khoa','05113736949','ntkhoi@ud.edu.vn'), ('22','lql232323','123456','Lê Quý Lộc','ThS. Giảng viên','01266696944','lequyloc@gmail.com'), ('23','ntxl232323','123456','Nguyễn Thế Xuân Ly','KS. Giảng viên','0905258474','manowarfan1604@gmail.com'), ('24','nvn232323','123456','Nguyễn Văn Nguyên','ThS. Giáo vụ khoa','0903577986','nguyenvannguyen2006@gmail.com'), ('25','hcp232323','123456','Huỳnh Công Pháp','TS. Giảng viên','0905114500','hcphap@gmail.com'), ('26','ptt232323','123456','Phan Thanh Tao','ThS. Giảng viên','0913474464','pthanhtao@yahoo.com'), ('27','thtt232323','123456','Trần Hồ Thủy Tiên','ThS. Giảng viên','0983461008','thttien@yahoo.com'), ('28','dbkt232323','123456','Đặng Bá Khắc Triều','NCS. Giảng viên','0947479479','dangtrieu@gmail.com'), ('29','pct232323','123456','Phan Chí Tùng','ThS. Giảng viên','0989078034','phanchitung@gmail.com'), ('30','ddt232323','123456','Đặng Duy Thắng','KS. Giảng viên','0983414363','thangddnt@gmail.com'), ('31','ttv232323','123456','Trần Thế Vũ','NCS. Giảng viên','0983879515','anhvaut@gmail.com'), ('32','nvh232323','123456','Nguyễn Văn Hiệu','TS.Giảng viên','0985028470','nvhieuqt@dut.udn.vn'), ('33','ntna232323','123456','Nguyễn Thị Nhật Ánh','ThS. Trợ giảng','01289701747','nhatanh35@yahoo.com'), ('34','tvxn232323','123456','Trần Viết Nhân Nghị','KS. Trợ giảng','','trannghi85@gmail.com'), ('35','lta232323','123456','Lê Tuấn Anh','KS. Trợ giảng','','ltanh18@gmail.com'), ('36','pmt232323','123456','Phạm Minh Tuấn','TS.Trợ giảng','0913230910','pmtuan@dut.udn.vn'), ('39','aaaa','12345678','giaovien1','giảng viên','0905177117','abc@gmail.com');
INSERT INTO `tblphanquyen` VALUES ('1','Admin cấp 1'), ('2','Admin cấp 2');
INSERT INTO `tbltheloai` VALUES ('1','Đoàn'), ('2','Thông báo'), ('3','Thông Tin Đào Tạo'), ('4','Bảo vệ');
INSERT INTO `tbltintuc` VALUES ('1','Thi Công nghệ phần mềm','Môn CNPM do cô Hạnh dạy sẽ thi vào ngày 25/9/2013 . Các em thông báo đến tất cả các lớp .Chào các em',NULL,'2013-08-09 07:33:03','1','anhTintuc/image-slider-1.jpg','1','21'), ('2','Bảo vệ Vi Xử lý','Thầy Hưng thông báo đến các bạn môn xử lý ảnh sẽ bảo vệ ngày 23/6/2013',NULL,'2013-08-09 07:33:17','1','image-slider-2.jpg','1','6'), ('3','Update Xử lý ảnh','Thầy Hưng thông báo đến các bạn môn xử lý ảnh sẽ bảo vệ ngày 23/6/2013',NULL,'2013-08-09 07:33:37','1','image-slider-3.jpg','1','4'), ('4','Nghỉ học Xử lý ảnh','Môn Vi Xử Lý do thầy Lư dạy nghỉ học vào ngày thứ 4 2/5/2013',NULL,'2013-08-09 07:33:48','1','image-slider-4.jpg','1','2'), ('5','Nghỉ học Vi xử lý','Môn Vi Xử Lý do thầy Lư dạy nghỉ học vào ngày thứ 4 2/5/2013',NULL,'2013-08-09 07:34:00','1','image-slider-5.jpg','1','12'), ('7','nghỉ học vi xử lí thầy xứng','nghì học vi xử lí vào ngày 10-8-2013. xin chào tạm biệt các em',NULL,'2013-08-08 05:25:57','0','image-slider-1.jpg','1','0'), ('8','Bảo vệ đồ án công nghệ phần mềm','Bảo vệ vào 2h chiều tại phòng C202',NULL,'2013-08-09 07:35:22','1','image-slider-2.jpg','0','3'), ('9','Đăng kí học bổ sung','SInh viên theo dõi thông tin đăng kí đợt học bổ sung kì 2',NULL,'2013-08-09 07:35:53','1','image-slider-2.jpg','0','0'), ('25','Giao lưu IBM','Vào lúc 7h sáng thứ tại hội trường khu F',NULL,'2013-08-09 07:36:50','1','image-slider-2.jpg','0','0'), ('26','Tình nguyện Hè','Lớp trưởng đnăg kí danh sách tình nguyện hè về cho văn phòng Đoàn',NULL,'2013-08-09 07:37:19','1','image-slider-2.jpg','0','0'), ('27','Nộp bài tập Chương trình dịch','Cô Hỷ thông báo các lớp thu bài tập và gửi qua mail.Lấy điểm giữa kì',NULL,'2013-08-09 07:37:59','1','image-slider-2.jpg','0','1'), ('28','Môn Toán rời rạc','Thầy đi công tác 2 tuần.Các lớp vẫn học bình thường với giao viên dạy thế',NULL,'2013-08-09 07:38:40','1','image-slider-2.jpg','0','9'), ('29','Gải bóng đá IT Falcuty','Lớp trưởng đăng kí danh sách và tập trung vào chiều chủ nhật tại ghế đá để chia bảng',NULL,'2013-08-09 07:39:24','2','image-slider-2.jpg','0','10'), ('30','Nghỉ học Phương pháp tính','Tuàn sau nghỉ phương pháp tính',NULL,'2013-08-09 07:40:06','2','image-slider-2.jpg','0','5'), ('31','Mở lớp kĩ thuật xung số','Sinh viên vào link sau để đăng kí học bỏ sung Kĩ thuật xung số',NULL,'2013-08-09 07:40:51','2','image-slider-2.jpg','0','2'), ('32','Kiểm tra Anh văn đầu ra','Đợt thi sẽ diễn ra vào chủ nhật tuần sau. Sinh viên đăng kí và nộp lệ phí thi tại phòng đào tạo',NULL,'2013-08-09 07:41:25','2','image-slider-2.jpg','0','6'), ('33','Học bù lập trình Java','Thầy Pháp yêu cầu lớp 12TLt sáng mai học bù. tài phòng H203',NULL,'2013-08-09 07:42:16','3','image-slider-2.jpg','0','3'), ('34','Nộp bài tập môn cơ sở dữ liệu','Các lớp tập trung bài tập và gửi về link sau theo từng nhóm',NULL,'2013-08-09 07:42:54','3','image-slider-2.jpg','0','4'), ('35','sdsdddddd','áds',NULL,'2013-08-08 05:26:24','0','module_table_bottom.png','0','0'), ('36','Môn kĩ thuật vi xử lí','Thầy Hưng yêu cầu các sinh viên chưa được thi cuối kì sáng mai lên gặp thầy để giải quyếtsfdsfdf',NULL,'2013-08-20 16:22:06','4','image-slider-2.jpg','0','0'), ('52','Thông Báo Lịch Bảo Vệ Cao Học Tháng 9','Kính gửi quý Thầy Cô và các bạn học viên CH Khóa 19-20-21,\r\n\r\n \r\nTheo thông báo của Phòng SDH, các bạn Khóa 19, Khóa 20 và Khóa 21 cần bảo vệ đúng hạn như thông báo sau.\r\nhttp://www.hcmus.edu.vn/index.php?option=com_content&task=view&id=6220&Itemid=508\r\nhttp://www.hcmus.edu.vn/index.php?option=com_content&task=view&id=6202&Itemid=508\r\n \r\nKhoa CNTT sẽ tổ chức đợt bảo vệ cho các Khóa 19-20-21 vào tháng 9 theo quy trình như sau: \r\n \r\n1. Ngày 30/8/2013 nộp đơn xin bảo vệ (lưu ý chỉ cần 1 đơn xin bảo vệ) và luận văn (1 bản bìa mềm) có chữ ký của GV Hướng Dẫn tại VP. Khoa (Mailbox SDH). Lưu ý khi nộp các bạn cần ghi rõ họ tên, khóa CH, email, điện thoại liên lạc và ký tên vào phiếu đăng ký.\r\n \r\nBộ phận Giáo Vụ SDH sẽ chuyển luận văn bìa mềm cho các BM vào ngày 3/9.\r\n  \r\n2. Từ ngày 4/9/2013 -9/9/2013 các BM tiến hành seminar và thu thập ý kiến phản hồi về các luận văn. \r\n  \r\n3. Dựa trên các đánh giá của các BM, ngày 10/9 BP. GV. SĐH của Khoa sẽ lập danh sách đề tài bảo vệ, DS Phản biện theo ý kiến của Trưởng Khoa và công bố danh sách này cho các Tiến Sĩ của Khoa và chờ phản hồi (nếu có) đến ngày 11/9/2013.\r\n  \r\n4. Ngày 13/9/2013 gửi danh sách học viên bảo vệ và danh sách phản biện (để làm thư mời) cho Phòng SĐH.\r\nĐồng thời yêu cầu học viên thực hiện các bước sau\r\n               a) Sửa chữa luận văn (nếu có) theo yêu cầu của BM.\r\n               b) Nộp hồ sơ đăng ký bảo vệ chính thức cho phòng SĐH (kèm theo chứng chỉ tiếng Anh và Triết Học) theo các biểu mẫu yêu cầu trên trang Web.\r\n                \r\n5. Ngày 17/9 (dự kiến) học viên tập trung gặp BP. Giáo Vụ SĐH và nộp  5 bản (bìa mềm) có chữ ký của Người Hướng Dẫn, đồng thời nhận thư mời phản biện. (Thời gian trên có thể thay đổi tùy thuộc vào thời gian xứ lý hồ sơ của phòng SĐH) \r\n \r\n6. Từ ngày 17/9 - 24/9  học viên chủ động liên lạc với các GV. Phản Biện và tiến hành bảo vệ đề tài trước các GV. Phản Biện.\r\n \r\n7. Trong khoảng từ ngày 21-23/9 BP. GV. SDH sẽ gửi thông báo về thời gian bảo vệ và các thành viên của các hội đồng (dự kiến thời gian bảo vệ từ 25/9 - 30/9). Hồ sơ sẽ được phát cho các thư ký trước 1 ngày bảo vệ.\r\n  \r\n\r\nMong quý Thầy Cô ghi nhận các mốc thời gian bảo vệ và các bạn học viên cao học Khóa 19-20-21 nộp đơn và hồ sơ đúng hạn như trên (mục 1) để đăng ký bảo vệ vào tháng 9.\r\n \r\nCảm ơn quý Thầy Cô và các bạn.\r\nTrân trọng,\r\nBộ phận Giáo vụ SĐH, Khoa CNTT.',NULL,'2013-08-21 06:09:22','3','lichhoc.png','1','92'), ('51','fgf','abcd',NULL,'2013-08-20 17:05:35','4','files-upload_smiley_114.jpg','0','1'), ('53','bộ soạn thảo','<p><strong><span style=\"color:rgb(34, 34, 34); font-family:arial,sans-serif\">K&iacute;nh gửi qu&yacute; Thầy C&ocirc; v&agrave; c&aacute;c bạn học vi&ecirc;n CH Kh&oacute;a 19-20-21</span></strong></p>\r\n\r\n<p><em style=\"color:rgb(34, 34, 34); font-family:arial,sans-serif; line-height:normal; text-align:justify\">Theo th&ocirc;ng b&aacute;o của Ph&ograve;ng SDH, c&aacute;c bạn Kh&oacute;a 19, Kh&oacute;a 20 v&agrave; Kh&oacute;a 21 cần bảo vệ đ&uacute;ng hạn&nbsp;như th&ocirc;ng b&aacute;o sau.</em></p>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\"><a href=\"http://www.hcmus.edu.vn/index.php?option=com_content&amp;task=view&amp;id=6220&amp;Itemid=508\" style=\"font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: rgb(17, 85, 204); text-decoration: none;\" target=\"_blank\">http://www.hcmus.edu.vn/index.php?option=com_content&amp;task=view&amp;id=6220&amp;Itemid=508</a><br />\r\n<a href=\"http://www.hcmus.edu.vn/index.php?option=com_content&amp;task=view&amp;id=6202&amp;Itemid=508\" style=\"font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: rgb(17, 85, 204); text-decoration: none;\" target=\"_blank\">http://www.hcmus.edu.vn/index.php?option=com_content&amp;task=view&amp;id=6202&amp;Itemid=508</a></div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\"><u>Khoa CNTT&nbsp;sẽ tổ chức&nbsp;đợt bảo vệ cho c&aacute;c Kh&oacute;a 19-20-21 v&agrave;o th&aacute;ng&nbsp;9 theo quy tr&igrave;nh như sau:&nbsp;</u></div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\"><img alt=\"\" src=\"/webkhoacnttxong/taovanban/hinhAnh/images/image-1.jpg\" style=\"border-style:solid; border-width:5px; height:400px; margin-left:5px; margin-right:5px; width:600px\" /><br />\r\n&nbsp;</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">1. Ng&agrave;y 30/8/2013 nộp đơn xin bảo vệ (lưu &yacute; chỉ cần 1 đơn xin bảo vệ) v&agrave;&nbsp;luận văn (1 bản b&igrave;a mềm) c&oacute; chữ k&yacute; của GV Hướng Dẫn tại VP. Khoa (Mailbox SDH). Lưu &yacute; khi nộp c&aacute;c bạn cần&nbsp;ghi r&otilde; họ t&ecirc;n,&nbsp;kh&oacute;a CH,&nbsp;email,&nbsp;điện thoại li&ecirc;n lạc v&agrave; k&yacute; t&ecirc;n&nbsp;v&agrave;o phiếu&nbsp;đăng k&yacute;.</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Bộ phận Gi&aacute;o Vụ SDH sẽ chuyển luận văn b&igrave;a mềm cho c&aacute;c BM v&agrave;o ng&agrave;y 3/9.<br />\r\n&nbsp;&nbsp;<br />\r\n2. Từ ng&agrave;y 4/9/2013 -9/9/2013 c&aacute;c BM tiến h&agrave;nh seminar v&agrave; thu thập &yacute; kiến phản hồi về c&aacute;c luận văn.&nbsp;<br />\r\n&nbsp;&nbsp;<br />\r\n3. Dựa tr&ecirc;n c&aacute;c đ&aacute;nh gi&aacute; của c&aacute;c BM, ng&agrave;y 10/9 BP. GV. SĐH của Khoa sẽ&nbsp;lập danh s&aacute;ch đề t&agrave;i bảo vệ, DS Phản biện theo &yacute; kiến của Trưởng Khoa v&agrave; c&ocirc;ng bố danh s&aacute;ch n&agrave;y cho c&aacute;c Tiến Sĩ của Khoa v&agrave; chờ phản hồi (nếu c&oacute;) đến ng&agrave;y 11/9/2013.<br />\r\n&nbsp;&nbsp;<br />\r\n4. Ng&agrave;y 13/9/2013 gửi danh s&aacute;ch học vi&ecirc;n bảo vệ v&agrave; danh s&aacute;ch phản biện (để l&agrave;m thư mời) cho Ph&ograve;ng SĐH.</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Đồng thời y&ecirc;u cầu&nbsp;học vi&ecirc;n thực hiện c&aacute;c bước sau</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a) Sửa chữa luận văn (nếu c&oacute;) theo y&ecirc;u cầu của BM.</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b) Nộp hồ sơ đăng k&yacute; bảo vệ ch&iacute;nh thức cho ph&ograve;ng SĐH (k&egrave;m theo chứng chỉ&nbsp;tiếng Anh v&agrave; Triết Học)&nbsp;theo c&aacute;c biểu mẫu y&ecirc;u cầu tr&ecirc;n trang Web.</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n5. Ng&agrave;y 17/9 (dự kiến) học vi&ecirc;n tập trung gặp BP. Gi&aacute;o Vụ SĐH v&agrave; nộp&nbsp;&nbsp;5 bản (b&igrave;a mềm) c&oacute; chữ k&yacute; của Người Hướng Dẫn,&nbsp;đồng thời&nbsp;nhận thư mời phản biện. (Thời gian tr&ecirc;n c&oacute; thể thay đổi t&ugrave;y thuộc v&agrave;o thời gian xứ l&yacute; hồ sơ của ph&ograve;ng SĐH)&nbsp;<br />\r\n&nbsp;<br />\r\n6. Từ ng&agrave;y 17/9 - 24/9&nbsp; học vi&ecirc;n&nbsp;chủ&nbsp;động&nbsp;li&ecirc;n lạc với c&aacute;c GV. Phản Biện v&agrave; tiến h&agrave;nh bảo vệ đề t&agrave;i trước c&aacute;c GV. Phản Biện.</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">7. Trong khoảng từ ng&agrave;y 21-23/9 BP. GV. SDH sẽ gửi th&ocirc;ng b&aacute;o về&nbsp;thời gian&nbsp;bảo vệ v&agrave; c&aacute;c th&agrave;nh vi&ecirc;n của c&aacute;c hội đồng (dự kiến thời gian&nbsp;bảo vệ từ 25/9 - 30/9). Hồ sơ sẽ được ph&aacute;t cho c&aacute;c thư k&yacute; trước 1 ng&agrave;y bảo vệ.<br />\r\n&nbsp;&nbsp;</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\"><br />\r\nMong qu&yacute; Thầy C&ocirc; ghi nhận c&aacute;c mốc thời gian bảo vệ v&agrave; c&aacute;c bạn học vi&ecirc;n cao học Kh&oacute;a 19-20-21 nộp đơn v&agrave; hồ sơ đ&uacute;ng hạn như tr&ecirc;n (mục 1) để đăng k&yacute; bảo vệ v&agrave;o th&aacute;ng 9.</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Cảm ơn qu&yacute; Thầy C&ocirc; v&agrave; c&aacute;c bạn.</div>\r\n\r\n<div style=\"line-height: normal; text-align: justify; color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Tr&acirc;n trọng,<br />\r\nBộ phận Gi&aacute;o vụ SĐH, Khoa CNTT.</div>\r\n',NULL,'2013-08-21 11:32:23','2','logo-inet.gif','0','34'), ('54','ad','<p>sdadsd</p>\r\n','z','2013-09-16 19:50:43','1','15092013(006).jpg','0','0');
INSERT INTO `upload` VALUES ('11','image2.jpg','../files-upload/image2.jpg','image/jpeg','56286','2013-07-28 05:11:44','1','7'), ('12','image3.jpg','../files-upload/image3.jpg','image/jpeg','90817','2013-07-28 05:11:59','1','2'), ('13','image4.jpg',' ../files-upload/image4.jpg','image/jpeg','56208','2013-07-28 05:12:09','2','5'), ('14','madness_arch2.jpg','../files-upload/madness_arch2.jpg','image/jpeg','37382','2013-08-07 09:58:25','1','0'), ('15','matran.jpg','../files-upload/matran.jpg','image/jpeg','198216','2013-08-07 09:55:53','1','0'), ('22','sf.jpg','../files-upload/sf.jpg','image/jpeg','80513','2013-08-07 09:55:12','2','3'), ('26','laroi.gif','../files-upload/laroi.gif','image/gif','47150','2013-08-07 09:54:19','2','0'), ('27','icon_del.gif','../files-upload/icon_del.gif','image/gif','200','2013-08-07 09:22:48','1','0'), ('29','arrow-bg2.gif','../files-upload/arrow-bg2.gif','image/gif','444','2013-08-07 12:14:57','1','0'), ('34','1348452373659914_574_574.jpg','../files-upload/1348452373659914_574_574.jpg','image/jpeg','60785','2013-08-07 13:02:36','2','0'), ('36','mauBAOCAO.docx','../files-upload/mauBAOCAO.docx','application/vnd.openxmlformats-officedocument.word','20300','2013-08-15 03:15:40','1','0'), ('37','giaodien.txt','../files-upload/giaodien.txt','text/plain','194','2013-08-15 03:32:04','1','0');
INSERT INTO `useronline` VALUES ('1379513229','127.0.0.1','/webkhoacnttxong/index.php'), ('1379513272','127.0.0.1','/webkhoacnttxong/index.php');
