CREATE TABLE `loaitin` (
`idloai` int(11) NOT NULL DEFAULT 0,
`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
PRIMARY KEY (`idloai`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `tblgiaovien` (
`id` int(11) NOT NULL,
`tkGiaoVien` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`mkGiaoVien` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`tenGiaoVien` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`ChucVu` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`Sodt` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
PRIMARY KEY (`id`) 
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `tbltheloai` (
`id_theloai` int(11) NOT NULL,
`ten_theloai` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
PRIMARY KEY (`id_theloai`) 
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `tbltintuc` (
`id_tintuc` int(11) NOT NULL,
`tieude` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`tomtat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`noidung` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`ngaythang` datetime NOT NULL,
`id_theloai` int(11) NOT NULL,
`ten_anh` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
PRIMARY KEY (`id_tintuc`) ,
INDEX `id_theloai` (`id_theloai`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `upload` (
`id` int(11) NOT NULL,
`name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`path` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`size` int(11) NOT NULL,
`ngaytao` date NULL DEFAULT NULL,
`idloai` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`id`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci;


ALTER TABLE `loaitin` ADD CONSTRAINT `fk_loaitin_upload_1` FOREIGN KEY (`idloai`) REFERENCES `upload` (`idloai`);
ALTER TABLE `tbltheloai` ADD CONSTRAINT `fk_tbltheloai_tbltintuc_1` FOREIGN KEY (`id_theloai`) REFERENCES `tbltintuc` (`id_theloai`);

