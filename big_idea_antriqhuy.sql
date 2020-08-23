/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.1.44-MariaDB-0+deb9u1 : Database - big_idea_antriqhuy
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`big_idea_antriqhuy` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `big_idea_antriqhuy`;

/*Table structure for table `mst_instances` */

DROP TABLE IF EXISTS `mst_instances`;

CREATE TABLE `mst_instances` (
  `id` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `long` varchar(100) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `queue_front_format` varchar(100) DEFAULT NULL,
  `queue_back_format` varchar(100) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mst_instances` */

insert  into `mst_instances`(`id`,`name`,`address`,`long`,`lat`,`queue_front_format`,`queue_back_format`,`deleted`,`created_at`,`updated_at`) values 
('09980dcc-0c4a-4d70-8682-2f249e67b7d2','Rumah Sakit Hasan Sadikin Bandung - Penyakit Dalam','Jl. Pasteur No.38, Pasir Kaliki, Kec. Cicendo, Kota Bandung, Jawa Barat 40171, Indonesia','107.59882170489351','-6.89692856946018',NULL,NULL,0,'2020-08-16 10:15:04','2020-08-16 10:17:32'),
('0dbbfdb0-715d-44cd-8458-c1187a3fd84e','Puskesmas Ciwaruga','Jl. Waruga Jaya No.4, Ciwaruga, West Bandung Regency, West Java, Indonesia','107.5813153','-6.850178400000001','P','C',0,'2020-08-17 12:06:19','2020-08-17 12:06:19'),
('121668de-1032-4e6a-8306-b4dc5f5b6515','Puskesmas Garuda','Puskesmas Garuda, Jalan Dadali, Garuda, Bandung City, West Java, Indonesia','107.5773126','-6.9114723','AA','A',0,'2020-08-17 06:04:52','2020-08-17 06:04:52'),
('1eaec2e2-33ec-4339-bffd-c6abc8fa8f67','Puskesmas Sarijadi','Jl. Sariasih II No.21 C, Sarijadi, Kec. Sukasari, Kota Bandung, Jawa Barat 40151, Indonesia','107.57747089755323','-6.8755515348200875','C',NULL,0,'2020-08-16 10:32:32','2020-08-16 10:32:32'),
('1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','Puskesmas Karang Setra','Jl. Sindang Sirna No.40, Gegerkalong, Kec. Sukasari, Kota Bandung, Jawa Barat 40153, Indonesia','107.5912229','-6.8778391','A',NULL,0,'2020-08-17 05:53:21','2020-08-17 05:53:21'),
('200a548a-da5c-4d09-b7a9-b35e4da014e9','Test Rumah Sakit','Jl. Riau, Citarum, Bandung City, West Java, Indonesia','107.6178656','-6.9061101','A','AA',1,'2020-08-17 05:56:22','2020-08-17 06:29:05'),
('2458d4cf-5d69-4801-90c3-87e804fbd309','Puskesmas Ciwaruga','Jl. Waruga Jaya No.4, Ciwaruga, West Bandung Regency, West Java, Indonesia','107.5793664','-6.885937699999999',NULL,NULL,1,'2020-08-17 08:15:24','2020-08-17 08:15:35'),
('280ce946-11a8-4965-9094-518cc4303f7a','RS AU Dr. M. Salamun - Mata','Jl. Ciumbuleuit A No.9, Ciumbuleuit, Kec. Cidadap, Kota Bandung, Jawa Barat 40142, Indonesia','107.60486683313525','-6.863995056880316',NULL,NULL,0,'2020-08-16 10:17:13','2020-08-16 10:17:13'),
('315b05e8-34d2-43a5-95a9-b21483f34684','RSHS Jantung 2345','Bandung 1','107.67298138671875','-6.936556331740513','BC',NULL,1,'2020-08-15 08:07:03','2020-08-16 06:04:12'),
('31d67572-987a-4752-af51-29e7417af063','Puskesmas Ciumbuleuit','Jl. Bukit Resik No.1, Hegarmanah, Kec. Cidadap, Kota Bandung, Jawa Barat 40141, Indonesia','107.6031264','-6.878127600000001','NO','CA',0,'2020-08-16 21:00:16','2020-08-16 21:35:55'),
('35e5201d-33f3-4727-a34d-de0b28b73934','RSHS Jantung','Bandung',NULL,'-6.9070402283289205','A',NULL,1,'2020-08-15 07:42:47','2020-08-16 06:05:16'),
('463ee757-1b17-4afb-bbe9-4ee34fa4804d','RS Cicendo - Mata','Jl. Cicendo No.4, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia','107.60448145026243','-6.910181032671987','MA','A',0,'2020-08-17 07:05:06','2020-08-17 07:05:06'),
('46a45171-f859-4722-8219-657338fc29af','Rumah Sakit Hafidz - Mata','Jl. Pramuka No.15, Bojong, Karangtengah, Kabupaten Cianjur, Jawa Barat 43281, Indonesia','107.17534128650817','-6.79814188692014','A',NULL,1,'2020-08-16 10:08:37','2020-08-16 10:09:51'),
('4c4d115d-ca7c-4b8c-8ab7-3659ae901257','Rumah Sakit Hasan Sadikin Bandung - Spesialis Jantung','Jl. Pasteur No.38, Pasir Kaliki, Kec. Cicendo, Kota Bandung, Jawa Barat 40171, Indonesia','107.59870368769685','-6.896664952190586',NULL,NULL,0,'2020-08-16 10:12:49','2020-08-16 10:17:50'),
('4f7fda6d-0b82-43bd-afb5-502175df8f3f','Rumah Sakit Cahya Kawaluyaan - Syaraf','Jl. Parahyangan Raya No.17, Cipeundeuy, Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553, Indonesia','107.47424578102034','-6.865731874050148',NULL,NULL,0,'2020-08-16 06:55:09','2020-08-16 10:23:45'),
('5c7926a3-38b3-4b7a-80df-557c96be46ba','Puskemas Sarijadi - Gigi','Jl. Sariasih II No.21 C, Sarijadi, Kec. Sukasari, Kota Bandung, Jawa Barat 40151, Indonesia','107.5774742503145','-6.87554487752017',NULL,NULL,1,'2020-08-16 06:57:28','2020-08-16 07:02:15'),
('68182b8e-1373-424f-86e3-36023bcd49ea','Puskesmas Ciangsana','Jl. Wisata Utama No.1, Ciangsana, Kec. Gn. Putri, Bogor, Jawa Barat 16968','106.959419','-6.363630','A','B',0,'2020-08-14 10:53:50','2020-08-17 10:43:57'),
('715a8a34-205e-4e27-92f9-074fae84772f','UPT Puskesmas Sukarasa','Jl. Gegerkalong Hilir No.157, Gegerkalong, Kec. Sukasari, Kota Bandung, Jawa Barat 40152, Indonesia','107.5835124','-6.868213900000001','A',NULL,0,'2020-08-17 07:15:48','2020-08-17 07:15:48'),
('791d9ce8-04f1-4658-8594-200e4ab167e2','RS AU Dr. M. Salamun - Gigi','Jl. Ciumbuleuit A No.9, Ciumbuleuit, Kec. Cidadap, Kota Bandung, Jawa Barat 40142, Indonesia','107.60484336380637','-6.8640243497106646',NULL,NULL,0,'2020-08-16 10:18:57','2020-08-16 10:18:57'),
('7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1','Puskesmas Cipaku indah','Jl. Cipaku Indah IV No.17, Ledeng, Kec. Cidadap, Kota Bandung, Jawa Barat 40143, Indonesia','107.6005188','-6.862486399999999','A',NULL,0,'2020-08-16 13:23:58','2020-08-17 06:10:48'),
('982eaae2-7221-472e-95b2-9f7594d3ff1d','RSIA Hermina Malang','Jl. Tangkuban Perahu No.33, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119, Indonesia','112.62457197976228','-7.978126824968566','A',NULL,0,'2020-08-16 10:28:59','2020-08-16 10:28:59'),
('a19fbe14-a345-4648-b946-e7625beeae00','Test','Jl. Riau, Citarum, Bandung City, West Java, Indonesia','107.6178656','-6.9061101','A','D',1,'2020-08-17 05:59:35','2020-08-17 06:28:56'),
('a31e2591-0831-4340-85de-d19c34f86a2b','Puskesmas Kedungkandang','Jl. Raya Ki Ageng Gribig No.144, Kedungkandang, Kec. Kedungkandang, Kota Malang, Jawa Timur 65137, Indonesia','112.64814709325411','-7.993134149205799','B',NULL,0,'2020-08-16 10:21:10','2020-08-16 10:21:10'),
('a618ae44-7011-4d2b-ad8f-1fe1d25aac18','Puskesmas Karang Setra','Jl. Sindang Sirna No.40, Gegerkalong, Kec. Sukasari, Kota Bandung, Jawa Barat 40153, Indonesia','107.5912229','-6.8778391','A',NULL,1,'2020-08-17 05:52:26','2020-08-17 07:21:35'),
('ac1908e2-b5e7-4e92-a469-ce6102176c66','Puskesmas Candi','Jalan Candi Telagawangi No.90, Mojolangu, Malang City, East Java, Indonesia','112.6347315','-7.9444806','A','AG',0,'2020-08-17 10:29:43','2020-08-17 10:29:43'),
('ae2033a4-4df1-42f1-8745-4c5be0d24578','Test Rumkit','Bandung Indah Plaza, Jalan Merdeka, Citarum, Bandung City, West Java, Indonesia','107.6109032','-6.9086775','BIP','AA',1,'2020-08-16 21:26:31','2020-08-16 21:27:30'),
('c2f2b8eb-d74d-4748-8226-928145767892','Rumah Sakit Apapun','Jl. Braga, Braga, Bandung City, West Java, Indonesia','107.6093662','-6.9175639','D','S',1,'2020-08-17 06:01:23','2020-08-17 07:16:39'),
('ca42c5a7-d747-4350-bc95-adfe02fa5495','Puskesamas Kendalsar','Jalan Cengger Ayam 1A, Tulusrejo, Malang City, East Java, Indonesia','112.6293797','-7.944512599999999','B',NULL,0,'2020-08-16 16:19:52','2020-08-16 16:19:52'),
('db57119a-731a-44f3-82c0-a0a86964d2a6','Rumah Sakit Syaiful Anwar','RSUD Saiful Anwar Malang, Jalan Jaksa Agung Suprapto, Klojen, Malang City, East Java, Indonesia','112.6315456','-7.9725673','C',NULL,0,'2020-08-16 16:50:25','2020-08-16 16:50:25'),
('e9de3ae8-4508-44b2-b50e-6b019fc3022f','RS Salamun - Kejiwaan Saya','Jl. Ciumbuleuit A No.9, Ciumbuleuit, Kec. Cidadap, Kota Bandung, Jawa Barat 40142, Indonesia','107.5989129','-6.864042990601754','A',NULL,1,'2020-08-16 06:11:04','2020-08-16 10:07:26'),
('f4db5795-a5c0-4ba0-a444-03a4bf98bfb3','RSUD Kota Malang - Organ Dalam','Jl. Rajasa No.27, Bumiayu, Kec. Kedungkandang, Kota Malang, Jawa Timur 65135, Indonesia','112.63936321349179','-8.026369711454908',NULL,NULL,0,'2020-08-16 10:26:13','2020-08-16 10:26:13'),
('ff4f1303-c9d8-4e2a-b720-65858c58ee5d','RSI Malang - Jantung','Unnamed Road, Prangkas, Klepu, Sumbermanjing, Malang, Jawa Timur 65176, Indonesia','115.2025529964844','-8.24371675550141','Q',NULL,1,'2020-08-15 16:08:14','2020-08-16 06:41:38');

/*Table structure for table `sys_mobile_users` */

DROP TABLE IF EXISTS `sys_mobile_users`;

CREATE TABLE `sys_mobile_users` (
  `id` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `firebase_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_mobile_users_username_index` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_mobile_users` */

insert  into `sys_mobile_users`(`id`,`username`,`name`,`email`,`pwd`,`salt`,`deleted`,`created_at`,`updated_at`,`firebase_token`) values 
('03066f7c-d747-450d-a399-124743314ecb','anana','nana','nana@gmail.com','$2y$10$hYC93wfjejHN22drWYrkwOWQMtaf/VIT633dw2ErT3rLjXVOYKCQi','8u9Fy4Svuf',0,'2020-08-16 15:17:42','2020-08-16 15:17:42',NULL),
('04bce141-f9ad-4a2c-b749-3f53c74c3b3e','riifariif8','Arif Khairuddin 3','arif.khairuddin@bigio.id','$2y$10$UEYSeM21kUxtB2M8AE/Rv.xu/yrmtjGUDt1s5XsvY5uyBSVKnuHoe','fKQufJISxc',0,'2020-08-17 02:00:45','2020-08-17 02:01:00','ctp9L_3IHFs:APA91bE3PSB0jdzw8Uuh_lmHwd-4gXNRD_nGrfkyYPhUUw0ba7_gMCbKuaK7UDJr2ifY92s1s-grs6ZPnx8ldHS0YKj50dDsd-z8I1WB29Q_1_llEYG6F34uWCKnXAvh77mvBz4fNBLo'),
('1bfa6579-f556-469e-9cdd-2cd0312a5f2c','yahya','yahya','yah@ya.com','$2y$10$MTIcZVRZRBbZIxY85/O7zuCQ/zPnac2Mfxs5Yt1/C9R5fcRWvZ2FC','gxQlSL383e',0,'2020-08-16 23:53:29','2020-08-17 00:01:41','d4x9668qrCE:APA91bEV_zDy8E9I7nq86HLHb73Xcfn6B-qpitBd4xsWN1t27CLzzg1cjl2e1Dhz-yPba7t4OXfIJfHwcQcsZBweTcrlxfDvCw2Qqo7NfHXhlTgHBhg2RnH4VC9my4wuzchTAfGoeghj'),
('1d1aaa10-fe01-4757-a566-634ca4178e98','renaldin','Renaldin','renaldin@bigio.id','$2y$10$kPm7gFY697/MTLpEFpTXteFhnzRaei/Qn3gUGPDGD5r7U37PIQsWi','1qFL1SqpW7',0,'2020-08-17 12:14:55','2020-08-17 12:15:08','dseXQUzGnoA:APA91bH_ehOEUK2lY1y5mxHy1eedtqxBMbZIphAWNaoHcBxcl2GvRGOXiRGg-klCqsqHS-Mt3zYsA_A3xl8wNI4vZYW1QMAjs1hwgxAzkbTXpfJI71ZLvyJcRwYLWH-qrv8SKdVBte2R'),
('1e6ec414-4b07-466c-b12f-cd2108cefe03','sarah','sarah','sar@ah.com','$2y$10$SRNrr82OiVtmYhTcpNoYz.wnlmFmj6LVm06luB6vPTCCUFELzE9gu','UZ24DbPXrL',0,'2020-08-17 01:21:22','2020-08-17 01:21:22',NULL),
('249688ab-f95b-43b3-b787-a76a72b21c5c','aripa','aripa','aripa@gmail.com','$2y$10$fN2lAqk5L88YnXN3IdmGFOejAg8hxlNim6KKXeplpmnQegzQYJqsO','U2BWcdQYyl',0,'2020-08-16 11:37:40','2020-08-16 11:37:40',NULL),
('30e3c586-bb1f-4c91-a7b6-38cb20643d4e','redroom','red','diva.devina@bigio.id','$2y$10$m6BMKIy3oj38.uqLJcJyFOUq90fVj2m7A0oC1CFVeHQu./ymSHUYy','W1znihb8If',0,'2020-08-17 11:06:57','2020-08-17 11:07:32','e1jgHKBFluE:APA91bFCKcZ1YoF_9F17SYDsyTcM_XIc_vh_ipCDI5F2sYZ9mmvVu-fS5LQfvpigjVHiFS5CTNqK6QPwa97J_1d7UCXlMycWUI9OT4DJwUyleaJd3GbMahyEOc_hs2eiYL9GRHSzlmTk'),
('49aec392-6bfd-4fec-9462-b1a3257b253c','mukhtarif','Ahmadan Mukhtarif','mukhtarif@gmail.com','$2y$10$np/teil/s0CIC0qpTIQCmOE5wkw2kfpzT0AlR4YhPylBBnxso.wyW','XZVP8TdgXM',0,'2020-08-16 15:56:08','2020-08-17 11:21:37','-'),
('8c42f66a-1573-4ca1-bca3-38121222a192','andika','Andika Pratama','dianinsani23@gmail.com','$2y$10$OaeIE5EFimxG1LzH7doHJe9f5PvXK0je.EuWPC6O22S0EZ90qjel.','FDaNSct3As',0,'2020-08-17 06:00:06','2020-08-17 09:36:12','dseXQUzGnoA:APA91bH_ehOEUK2lY1y5mxHy1eedtqxBMbZIphAWNaoHcBxcl2GvRGOXiRGg-klCqsqHS-Mt3zYsA_A3xl8wNI4vZYW1QMAjs1hwgxAzkbTXpfJI71ZLvyJcRwYLWH-qrv8SKdVBte2R'),
('8eb9b67b-1c20-47e8-a477-8087942912aa','riifariif100','Arif Khairuddin 2','arif.khairuddin2@bigio.id','$2y$10$jdW/DODyYEhOhk6sMpu9DujLFqp10ZDs1MorNaRhKMgtLIkZMwG7u','jnRq5E2ZYw',0,'2020-08-17 01:15:23','2020-08-17 01:15:41','fGhofWpLOS4:APA91bHWKJEqqreSSHRusrlX_YaulkBEv6Pq_sK1_2iVDzDhaC3KerNxqovF3AavZybyUbbJhGzwBvvO7OEa6a9RSghcUNRWffH9ZLR8pCQ8ZdkTPId4DcMSbbbY4E3SG7Eg-bCbeQZh'),
('944308fb-7564-4a0f-99c3-2da148951156','melly','melly','spvag1@gmail.com','$2y$10$h1/4iVCUL7dIi1B6FPfaBOYMIOSd2WIo18JID5ouD.72Q3wFsIN5K','wKhH9HWV66',0,'2020-08-17 07:18:26','2020-08-17 07:18:26',NULL),
('b8480087-af48-4bc7-933a-ab5778c41f70','mamangs','mamangs','ma@man.gs','$2y$10$99B1FVmjqp.bQgixCafUku4V2E3JvZ.uOoiJKr0kwt4GN4nfjzFg2','50WM3GX5t7',0,'2020-08-17 00:12:38','2020-08-17 08:04:19',NULL),
('ded3d480-8735-4e2a-af28-6cea40a542c5','riifariif','Arif Khairuddin','riifariif7@gmail.com','$2y$10$XK9FDzKhVh/pZ4N7WXuRYOmuLmVlGjiiXhR2Kfm.xjKQtLeDRHxfS','nxSGq6M2y4',0,'2020-08-15 10:16:00','2020-08-17 09:16:17','cN--9Xgs1h0:APA91bF_PpzObqdKMYKr5Qy8yB6kELhMoc3FvPrpYSDijgS3PAha5fjPFpFl-w3i0UITTU38UXeM2SGzRqVlLHT3SqQ10wyv6M8ufmKOWrL7b5u7tk4OOxBghEI92pQAjv2L0Pca2Fyk'),
('eba12bbc-092e-400e-b5a3-6f4b761078eb','bara','bara','bara@gmail.com','$2y$10$BQgxxdWFItAV0Gk3VEG07eGUeLR.qZ5SYxAHcO6eRzh3jddkuXeR6','naputz2JxI',0,'2020-08-17 01:24:03','2020-08-17 08:51:49',NULL),
('f1f2fe62-336c-4c03-9451-cf037a3a1ae2','yadi','yadi','ya@di.com','$2y$10$7j9qjXBrfDSNnx7owm2obeFmyV/f/RM34tHSTuVulX4uttb/U2uJe','m0Hj0liC4H',0,'2020-08-16 23:58:13','2020-08-16 23:58:13',NULL),
('fcf53fa0-21fb-4ab1-a181-eab44ffc213e','riifariif7','Arif Khairuddin 1','riifariif8@gmail.com','$2y$10$TnrPTabpHUcosZwQQKmdqeEl/2jhGKJwnVw/oWBJ/.3mQi/09shPK','RvzA1MWixE',0,'2020-08-16 09:34:18','2020-08-16 09:34:18',NULL);

/*Table structure for table `sys_roles` */

DROP TABLE IF EXISTS `sys_roles`;

CREATE TABLE `sys_roles` (
  `id` varchar(100) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_roles_code_index` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_roles` */

insert  into `sys_roles`(`id`,`code`,`name`,`deleted`,`created_at`,`updated_at`) values 
('328cbac3-0cab-47a0-bb2c-7f27edb22e0d','admin','Administrator',0,'2020-08-13 20:46:30','2020-08-13 20:46:31'),
('328cbac3-0cab-47a0-bb2c-7f27edb22e0e','admin_instansi','Admin Instansi',0,'2020-08-13 21:39:38','2020-08-13 21:39:40'),
('328cbac3-0cab-47a0-bb2c-7f27edb22e0f','staff_instansi','Staff Instansi',0,'2020-08-13 21:41:20','2020-08-13 21:41:21');

/*Table structure for table `sys_users` */

DROP TABLE IF EXISTS `sys_users`;

CREATE TABLE `sys_users` (
  `id` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `role_code` varchar(100) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `instance_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_users_sys_roles_code_fk` (`role_code`),
  CONSTRAINT `sys_users_sys_roles_code_fk` FOREIGN KEY (`role_code`) REFERENCES `sys_roles` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_users` */

insert  into `sys_users`(`id`,`username`,`fullname`,`address`,`email`,`pwd`,`salt`,`role_code`,`deleted`,`created_at`,`updated_at`,`instance_id`) values 
('017bbbb4-6aa7-4bfa-b53e-561e7ec7d922','adminantriqhuy','User Admin','Jl. Malang','bachtiar.cahyoo@gmail.com',NULL,NULL,'admin',1,'2020-08-15 12:10:12','2020-08-15 12:13:46','315b05e8-34d2-43a5-95a9-b21483f34684'),
('020a9d14-51d3-4843-bfe2-162ff76bb63a','adminkarangsetra','Admin Puskesmas Karang Setra','Jl. Sukajadi No.14','hragp01@gmail.com','$2y$10$8zi3B/Wy6b./.5KtrrUVWeR1Jki2OSv6ybX38jqJPWZp61lpaMESO',NULL,'admin_instansi',1,'2020-08-17 05:55:32','2020-08-17 08:26:43','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa'),
('0fb7dff9-7501-4f76-b672-0054c62b0312','karla','Karla','Jl Jakarta','oki.prasetyo@bigio.id','$2y$10$koivF7/rhiVBHPaQ72NhXeQP2nOxdYkjvZV3QR/.Ik4oW.mtTqN1a',NULL,'admin_instansi',0,'2020-08-17 07:13:51','2020-08-17 07:15:31','463ee757-1b17-4afb-bbe9-4ee34fa4804d'),
('1712f57a-c1f7-4389-b09f-02fa778a5c92','hernaprayogi','Herna Prayogi Z.','Bandung Raya Utara','hragp01@gmail.com','$2y$10$WZDFnIRU3EATlWn7h6OGvufozheXbPRxnSRAswkbhQtAgCI.JbG..',NULL,'admin_instansi',0,'2020-08-16 21:19:37','2020-08-16 21:50:38','31d67572-987a-4752-af51-29e7417af063'),
('25b39670-e459-426a-a7ea-f57fedc33f45','syaiful86','Syaiful Huda','Jl. Merdeka','bachtiar.cahyoo@gmail.com',NULL,NULL,'admin',1,'2020-08-15 15:19:24','2020-08-15 15:20:03','35e5201d-33f3-4727-a34d-de0b28b73934'),
('267f138c-dddd-11ea-9b72-0401e3589d01','admin','Admin Nara','malang','bachtiar.cahyoo@gmail.com','$2y$10$xXXjdikWQTLDhAbfLcgLVuPwCB9REvBsmEBLQMHz1XQCjPCjvaqUK',NULL,'admin',0,'2020-08-14 10:36:00','2020-08-16 14:10:38','982eaae2-7221-472e-95b2-9f7594d3ff1d'),
('30edde89-d49b-479b-aa0c-3683f25bee7e','adminantriqhuy','User Admin','Jl. Malang','bachtiar.cahyoo@gmail.com',NULL,NULL,'admin',1,'2020-08-15 12:07:14','2020-08-15 12:09:53','315b05e8-34d2-43a5-95a9-b21483f34684'),
('3e2b1bd0-eb37-4c1c-9cdc-2400bf0d6174','gofar86','Gofar Hilman','Jl. Merdeka','bachtiar.cahyoo@gmail.com',NULL,NULL,'admin',1,'2020-08-15 15:20:51','2020-08-15 15:37:10','35e5201d-33f3-4727-a34d-de0b28b73934'),
('3e4af74d-376d-4b13-b96e-dcaacbfcafdb','greyman','Greyman','Malang','greyman','$2y$10$xXXjdikWQTLDhAbfLcgLVuPwCB9REvBsmEBLQMHz1XQCjPCjvaqUK',NULL,'admin',0,'2020-08-15 02:28:39','2020-08-15 02:28:39','0a3ba4b3-ba3a-4870-a061-cc96e27faeeb'),
('515b9e1e-9360-4c3d-b6b5-f9746c4d2dec','yogi','Yogi','Jalan Jakarta No. 10','renaldin@bigio.id','$2y$10$s8J5RK1pJ61H7XdlJE68/unFW9cGiiK9Ij.djWkv7t024bChY3/p2',NULL,'admin_instansi',0,'2020-08-17 12:07:07','2020-08-17 12:08:47','0dbbfdb0-715d-44cd-8458-c1187a3fd84e'),
('57ec1af0-fd4d-469c-8524-ea9995f9be7f','service','Service','Jl. Ciangsana','service@mail.com',NULL,NULL,'admin_instansi',0,'2020-08-15 10:16:10','2020-08-15 10:16:23','68182b8e-1373-424f-86e3-36023bcd49ea'),
('5bba5fe3-074a-4410-bb0b-aab803e79220','RI-01','Joko Widodo','12345678','oki.prasetyo@bigio.id','$2y$10$WcvO6rgQ8Z8NpCuL.UY1nea5pDDyEwamQjwlUoUY0Wk6L/7iuNqum',NULL,'admin',0,'2020-08-16 09:18:48','2020-08-16 09:20:09','68182b8e-1373-424f-86e3-36023bcd49ea'),
('66b05da7-ebfa-4889-93c0-9d899f5fea15','beathoven','User Admin','Jl. Malang','bachtiar.cahyoo@gmail.com',NULL,NULL,'admin',1,'2020-08-15 12:42:10','2020-08-15 13:54:45','315b05e8-34d2-43a5-95a9-b21483f34684'),
('6dce4f67-e7ea-4490-8f33-0c806a4c42c4',NULL,NULL,NULL,NULL,NULL,NULL,'admin',1,'2020-08-15 10:56:47','2020-08-15 10:56:59','315b05e8-34d2-43a5-95a9-b21483f34684'),
('6e7e7187-de58-11ea-9b72-0401e3589d01','adm00n','Admin AntriQhuy2',NULL,'admin@antriqhuy.com','$2y$10$xXXjdikWQTLDhAbfLcgLVuPwCB9REvBsmEBLQMHz1XQCjPCjvaqUK',NULL,'admin',1,'2020-08-14 10:36:00','2020-08-15 01:07:18',NULL),
('75f5fdf7-dde6-4cc1-bb88-7bf326beed30','professor','Professor',NULL,NULL,NULL,NULL,NULL,1,'2020-08-15 02:22:35','2020-08-15 02:23:14',NULL),
('7c025ebf-3d9a-4963-a7d1-a1d1464207ba','adminrsimalang','Saiful Anwar','Jl. Soekarno Hatta','bachtiar.cahyoo@gmail.com',NULL,NULL,'admin',1,'2020-08-15 15:15:42','2020-08-15 15:18:53','35e5201d-33f3-4727-a34d-de0b28b73934'),
('82222351-cdd7-47fe-bdf1-e2d418c15d9d','clara','Clara','Jl Jakarta','oki.prasetyo@bigio.id',NULL,NULL,'staff_instansi',0,'2020-08-17 07:08:17','2020-08-17 07:08:17','68182b8e-1373-424f-86e3-36023bcd49ea'),
('838ed2d7-f97c-407f-81d9-9f1cdfe58eba','rsimalang','Admin RSI Malang','jl. merdeka','bachtiar.cahyoo@gmail.com',NULL,NULL,'admin_instansi',0,'2020-08-15 16:08:58','2020-08-15 16:08:58','ff4f1303-c9d8-4e2a-b720-65858c58ee5d'),
('86df68d8-3342-4b08-ab3f-c96b0d2f9881','admincandi96','Admin Puskesmas Candi','Jl. Candi Telagawangi','bachtiar.cahyoo@gmail.com','$2y$10$j5QTE4d1jC2BSxnKGs2dmO8pjzni76OyahmnPIkObXM.2seMFE0yG',NULL,'admin_instansi',0,'2020-08-17 10:32:03','2020-08-17 10:36:38','ac1908e2-b5e7-4e92-a469-ce6102176c66'),
('8af2d3bc-da23-4e64-b932-70eed0de03a7',NULL,NULL,NULL,NULL,NULL,NULL,'admin',1,'2020-08-15 10:54:46','2020-08-15 10:54:56','315b05e8-34d2-43a5-95a9-b21483f34684'),
('90eb1751-17cc-436c-b674-e1067b48234c',NULL,NULL,NULL,NULL,NULL,NULL,'admin',1,'2020-08-15 10:58:22','2020-08-15 10:58:31','315b05e8-34d2-43a5-95a9-b21483f34684'),
('919dfea0-acbe-4094-94b6-40ae8d50692c','riifariif','Arif Khairuddin',NULL,'arif.khairuddin@bigio.id',NULL,'qcpIziAkuI','admin',0,'2020-08-14 10:22:05','2020-08-14 10:22:07',NULL),
('954b439a-5553-444d-afe5-7f45c98bf03c','instansi','Admin Instansi',NULL,NULL,'$2y$10$xXXjdikWQTLDhAbfLcgLVuPwCB9REvBsmEBLQMHz1XQCjPCjvaqUK',NULL,'admin_instansi',0,'2020-08-14 16:21:25','2020-08-14 16:21:35','68182b8e-1373-424f-86e3-36023bcd49ea'),
('9ac404fa-26fa-47b7-a31e-c4ff751fe53e','arifkhairuddin','Arif Khairuddin','Bandung Raya','arif.khairuddin@bigio.id','$2y$10$Nn85zsBfyukP9eMSdynyeOdWY1U7u0vYwUQw9hHGBXk3ivGnXK.HS',NULL,'admin_instansi',0,'2020-08-16 21:34:50','2020-08-16 22:19:56','31d67572-987a-4752-af51-29e7417af063'),
('9ec7c0f6-5cb1-4a3e-8dbd-402c59eb0c80','niko','Niko','Jalan Tanah Air No. 20, Surabaya','niko@mail.com',NULL,NULL,'staff_instansi',1,'2020-08-15 16:33:59','2020-08-17 07:10:19','68182b8e-1373-424f-86e3-36023bcd49ea'),
('a04113cb-0bbf-4e51-9ee0-412eb76b9f50','admincandi2','Admin Test','Jl. Candi','bachtiar.cahyoo@gmail.com',NULL,NULL,'admin_instansi',0,'2020-08-17 10:55:35','2020-08-17 10:55:35','ac1908e2-b5e7-4e92-a469-ce6102176c66'),
('a3995e79-0bf1-473f-b080-efdb3db48d6b','gofar48','Gofar Hilman','Jl. Merdeka','bachtiar.cahyoo@gmail.com',NULL,NULL,'admin',1,'2020-08-15 15:37:47','2020-08-15 20:38:31','315b05e8-34d2-43a5-95a9-b21483f34684'),
('ace6f522-e54e-48ad-9b6e-8878d4c81154','mikeee','Mike - R.Kandungan','Jln. Kapten Abdul Hamid No.G3','dianinsani23@gmail.com','$2y$10$baow0feo3Fb7nR5p1Fo.6.28ttF8LmVRX.1GlPDTfvonuJb.lPk5e',NULL,'staff_instansi',0,'2020-08-16 14:16:54','2020-08-16 14:17:23','7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1'),
('b160b681-178b-4496-b83e-25f184159ead','dianinsani08','Dian Insani','Jln. Kapten Abdul Hamid No.G2','dianinsani23@gmail.com','$2y$10$MICuO7nIiP4DJ5pX7SlCjOX9MFMrdf7W6RtXeZE6Nm8ejQPv7vzdK',NULL,'staff_instansi',1,'2020-08-16 05:50:56','2020-08-16 13:52:41','68182b8e-1373-424f-86e3-36023bcd49ea'),
('c67a527e-4112-4317-a12e-4dcb4bffb203','admininstansi2','admin instansi 2','jalan merdeka','bachtiar.cahyoo@gmail.com','$2y$10$xXXjdikWQTLDhAbfLcgLVuPwCB9REvBsmEBLQMHz1XQCjPCjvaqUK',NULL,'staff_instansi',0,'2020-08-15 16:06:16','2020-08-15 16:06:16','315b05e8-34d2-43a5-95a9-b21483f34684'),
('d8caed23-4273-4c94-a4f0-fffa2cf2f35e','cian','Cian','Bandung','cian','$2y$10$xXXjdikWQTLDhAbfLcgLVuPwCB9REvBsmEBLQMHz1XQCjPCjvaqUK',NULL,'staff_instansi',1,'2020-08-15 11:07:31','2020-08-15 11:32:44','35e5201d-33f3-4727-a34d-de0b28b73934'),
('d9427310-3305-45f4-ae93-ed6f94ac73db','dianinstansi','Dian Instansi Puskesmas','Jln. Kapten Abdul Hamid No.G2, Panorama','putri.dian@bigio.id','$2y$10$dklfqNjZBuBftUmtOOIauelY.y9KSi/Zjs2FFNb7khs1m7.PTGulG',NULL,'admin_instansi',0,'2020-08-16 13:53:21','2020-08-16 13:57:01','7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1'),
('db75e2f6-0aae-42fe-8717-09a3bfc75d0b','dianinsani18','Dian Insani','Jln. Kapten Abdul Hamid No.G2','dianinsani23@gmail.com',NULL,NULL,'admin_instansi',1,'2020-08-15 10:09:33','2020-08-16 13:52:37','7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1'),
('e810311b-af0a-4e14-89b6-ce415772db8a','gofar48','Gofar Hilman','Jl. Merdeka','bachtiar.cahyoo@gmail.com','$2y$10$ykNcFzmW0zP1VnUahWocouprSgCTcyS2lEY8S51rkbuttyXlcGqI6',NULL,'admin',0,'2020-08-15 20:38:54','2020-08-15 21:08:58','35e5201d-33f3-4727-a34d-de0b28b73934'),
('fa6a9425-e033-11ea-9b72-0401e3589d01','admin_antriqhuy','Admin AntriQhuy','Bandung','admin@antriqhuy.id','$2y$10$eY48ntmS6BmnQnFaem9VtuD5.NMWxJRO/5i6j13LZkdDMVLAFU9hq',NULL,'admin',0,'2020-08-17 08:27:06','2020-08-17 09:49:43',NULL),
('ffa3ceb2-e3c5-4b62-ab78-822d0b644783','adminkarangsetra','Admin Karangsetra','Bandung Raya','hragp01@gmail.com','$2y$10$ns4A5.MJbhPpyJDHESy2IOUAi/fiyzagotCFlRB.o/2583U2JRC1K',NULL,'admin_instansi',0,'2020-08-17 08:27:06','2020-08-17 08:27:31','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa');

/*Table structure for table `trx_book_queues` */

DROP TABLE IF EXISTS `trx_book_queues`;

CREATE TABLE `trx_book_queues` (
  `id` varchar(100) NOT NULL,
  `instance_id` varchar(100) DEFAULT NULL,
  `user_mobile_id` varchar(100) DEFAULT NULL,
  `queue_no` varchar(100) DEFAULT NULL,
  `queue` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `date` date DEFAULT NULL,
  `book_time` varchar(5) DEFAULT NULL,
  `process_time` varchar(5) DEFAULT NULL,
  `finish_time` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trx_queues_mst_instances_id_fk` (`instance_id`),
  KEY `trx_queues_sys_mobile_users_id_fk` (`user_mobile_id`),
  CONSTRAINT `trx_queues_mst_instances_id_fk` FOREIGN KEY (`instance_id`) REFERENCES `mst_instances` (`id`),
  CONSTRAINT `trx_queues_sys_mobile_users_id_fk` FOREIGN KEY (`user_mobile_id`) REFERENCES `sys_mobile_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trx_book_queues` */

/*Table structure for table `trx_instance_history_queue_details` */

DROP TABLE IF EXISTS `trx_instance_history_queue_details`;

CREATE TABLE `trx_instance_history_queue_details` (
  `id` varchar(100) NOT NULL,
  `instance_history_queue_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `queue_no` varchar(100) DEFAULT NULL,
  `queue` int(11) DEFAULT '0',
  `book_time` varchar(5) DEFAULT NULL,
  `process_time` varchar(5) DEFAULT NULL,
  `finish_time` varchar(5) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_process_id` varchar(100) DEFAULT NULL,
  `instance_id` varchar(100) DEFAULT NULL,
  `user_mobile_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trx_instance_history_queue_details_instance_history_queues_id_fk` (`instance_history_queue_id`),
  KEY `trx_instance_history_queue_details_mst_instances_id_fk` (`instance_id`),
  KEY `trx_instance_history_queue_details_sys_mobile_users_id_fk` (`user_mobile_id`),
  KEY `trx_instance_history_queue_details_sys_users_id_fk` (`user_process_id`),
  KEY `trx_instance_history_queue_details_date_index` (`date`),
  KEY `trx_instance_history_queue_details_queue_index` (`queue`),
  CONSTRAINT `trx_instance_history_queue_details_instance_history_queues_id_fk` FOREIGN KEY (`instance_history_queue_id`) REFERENCES `trx_instance_history_queues` (`id`),
  CONSTRAINT `trx_instance_history_queue_details_mst_instances_id_fk` FOREIGN KEY (`instance_id`) REFERENCES `mst_instances` (`id`),
  CONSTRAINT `trx_instance_history_queue_details_sys_mobile_users_id_fk` FOREIGN KEY (`user_mobile_id`) REFERENCES `sys_mobile_users` (`id`),
  CONSTRAINT `trx_instance_history_queue_details_sys_users_id_fk` FOREIGN KEY (`user_process_id`) REFERENCES `sys_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trx_instance_history_queue_details` */

insert  into `trx_instance_history_queue_details`(`id`,`instance_history_queue_id`,`name`,`date`,`queue_no`,`queue`,`book_time`,`process_time`,`finish_time`,`status`,`created_at`,`updated_at`,`user_process_id`,`instance_id`,`user_mobile_id`) values 
('00ea667a-4b3b-4764-8cda-c126cdea88ab','bc467607-b772-441f-8ed5-7300f180e0fd','Insani Test offline','2020-08-16','A-2',2,'20:27','20:49','20:56',2,'2020-08-16 20:27:14','2020-08-16 20:56:00','ace6f522-e54e-48ad-9b6e-8878d4c81154','7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1',NULL),
('06c69461-33ee-4f76-824f-6f0106bce69f','77aad906-0eb3-4d98-b1c2-f3d66712d795','dori','2020-08-17','A9',9,'11:08','11:14',NULL,1,'2020-08-17 11:08:08','2020-08-17 11:14:18','ffa3ceb2-e3c5-4b62-ab78-822d0b644783','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','30e3c586-bb1f-4c91-a7b6-38cb20643d4e'),
('08698c18-7a8f-422c-9fcb-db228dc4bee5','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','Arif','2020-08-17','A17B',17,'12:13',NULL,NULL,0,'2020-08-17 12:13:21','2020-08-17 12:13:21',NULL,'68182b8e-1373-424f-86e3-36023bcd49ea','8c42f66a-1573-4ca1-bca3-38121222a192'),
('0fe0a48f-c3e6-45a7-b3d0-085f06f76083','7118819e-9878-4ef4-b07b-9024934ecddb','Arif Khairuddin','2020-08-17','A1',1,'07:52',NULL,NULL,0,'2020-08-17 07:52:36','2020-08-17 07:52:36',NULL,'7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1','ded3d480-8735-4e2a-af28-6cea40a542c5'),
('12dc1893-5b5f-45c7-b2de-c60aef884820','7118819e-9878-4ef4-b07b-9024934ecddb','Arif Khairuddin','2020-08-17','A3',3,'08:04',NULL,NULL,0,'2020-08-17 08:04:43','2020-08-17 08:04:43',NULL,'7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1','ded3d480-8735-4e2a-af28-6cea40a542c5'),
('17cdf8e1-5636-48c7-87df-afd2485592de','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','tm_apt_loketlt1','2020-08-17','A6',6,'01:50','02:26',NULL,-1,'2020-08-17 01:50:38','2020-08-17 02:26:37','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('1d47b3ce-362d-4cc0-9791-d3c2d61ca9ad','b5593fb5-af5c-4284-ba85-7bafcdff645f','Dian Insani','2020-08-17','P1C',1,'12:09','12:10','12:10',2,'2020-08-17 12:09:54','2020-08-17 12:10:34','515b9e1e-9360-4c3d-b6b5-f9746c4d2dec','0dbbfdb0-715d-44cd-8458-c1187a3fd84e','8c42f66a-1573-4ca1-bca3-38121222a192'),
('1e4b864d-b2ce-406f-b778-28e5c956f87c','7c7516c1-5075-4707-9301-4f226320b64e','Pasien Offline','2020-08-16','A9',9,'19:47','19:57',NULL,-1,'2020-08-16 19:47:42','2020-08-16 19:57:38','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('275be56c-2005-4f42-a136-e3374207ac39','4b86b326-fc50-4594-948d-c9a796ad5ec8','Rika Yanti','2020-08-17','NO1CA',1,'08:43',NULL,NULL,0,'2020-08-17 08:43:24','2020-08-17 08:43:24',NULL,'31d67572-987a-4752-af51-29e7417af063','8c42f66a-1573-4ca1-bca3-38121222a192'),
('28f760a9-3df5-4b19-a8da-86c89cfcd842','b5593fb5-af5c-4284-ba85-7bafcdff645f','Arif','2020-08-17','P4C',4,'12:11',NULL,NULL,0,'2020-08-17 12:11:58','2020-08-17 12:11:58',NULL,'0dbbfdb0-715d-44cd-8458-c1187a3fd84e','49aec392-6bfd-4fec-9462-b1a3257b253c'),
('2dfaf2e7-e897-4e47-a548-43b20799a835','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','tm_kf0001','2020-08-17','A5',5,'01:47','02:19',NULL,-1,'2020-08-17 01:47:29','2020-08-17 02:19:36','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('2e949c22-8da1-4286-b9af-f81c9315f730','77aad906-0eb3-4d98-b1c2-f3d66712d795','Andika Pratama','2020-08-17','A6',6,'07:06','08:34',NULL,-1,'2020-08-17 07:06:06','2020-08-17 08:34:15','ffa3ceb2-e3c5-4b62-ab78-822d0b644783','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','8c42f66a-1573-4ca1-bca3-38121222a192'),
('2ea789ed-8362-463f-82c7-8a819ea4ab19','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','Dede','2020-08-17','A10',10,'07:09','09:24','09:24',2,'2020-08-17 07:09:34','2020-08-17 09:24:17','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('39a0af54-0abb-4254-bdf8-81709d192546','77aad906-0eb3-4d98-b1c2-f3d66712d795','Arif Khairuddin','2020-08-17','A2',2,'06:08','06:09','06:11',2,'2020-08-17 06:08:43','2020-08-17 06:11:40','020a9d14-51d3-4843-bfe2-162ff76bb63a','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa',NULL),
('3d775835-0c4f-4711-bdab-46bcaef8c0a1','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','yasuo','2020-08-17','A15B',15,'11:09','11:13','11:13',2,'2020-08-17 11:09:01','2020-08-17 11:13:39','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('411f7e27-4291-4894-a3de-5e85064cdb75','77aad906-0eb3-4d98-b1c2-f3d66712d795','Andika Pratama','2020-08-17','A5',5,'07:05','08:34',NULL,-1,'2020-08-17 07:05:27','2020-08-17 08:34:13','ffa3ceb2-e3c5-4b62-ab78-822d0b644783','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','8c42f66a-1573-4ca1-bca3-38121222a192'),
('457946b3-d946-4ba5-87ba-070f9bacf61f','77aad906-0eb3-4d98-b1c2-f3d66712d795','Diva Devina','2020-08-17','A3',3,'06:09','06:11',NULL,2,'2020-08-17 06:09:34','2020-08-17 06:11:44','020a9d14-51d3-4843-bfe2-162ff76bb63a','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','8c42f66a-1573-4ca1-bca3-38121222a192'),
('463b42ae-27a4-4795-a52b-1f26997c4892','7c7516c1-5075-4707-9301-4f226320b64e','beathoven','2020-08-16','A17',17,'20:29','20:30',NULL,-1,'2020-08-16 20:29:58','2020-08-16 20:30:29','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('473239c7-9e22-475f-b88f-c43c38c114fb','7118819e-9878-4ef4-b07b-9024934ecddb','mamangs','2020-08-17','A5',5,'09:12',NULL,NULL,0,'2020-08-17 09:12:47','2020-08-17 09:12:47',NULL,'7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1','b8480087-af48-4bc7-933a-ab5778c41f70'),
('48349e6a-c6d6-4386-833f-8c95bafec91a','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','dash','2020-08-17','A1',1,'01:14','01:20',NULL,-1,'2020-08-17 01:14:05','2020-08-17 01:20:49','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('509a22e1-f247-4e4f-a766-9861004fc20e','7c7516c1-5075-4707-9301-4f226320b64e','Tony Stark','2020-08-16','A16',16,'20:26','20:26',NULL,-1,'2020-08-16 20:26:46','2020-08-16 20:26:54','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('515a9430-b142-42ca-80b4-adebcc457c26','7c7516c1-5075-4707-9301-4f226320b64e','dash','2020-08-16','A15',15,'20:22','20:26','20:26',2,'2020-08-16 20:22:55','2020-08-16 20:26:52','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('580a0188-15bc-4adc-b847-cfb36b756c6b','7c7516c1-5075-4707-9301-4f226320b64e','Chris Brown','2020-08-16','A25',25,'21:32','21:42',NULL,-1,'2020-08-16 21:32:43','2020-08-16 21:42:41','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('5a22ac74-5e8d-441a-aebc-27ab83afd41d','7c7516c1-5075-4707-9301-4f226320b64e','Post Malone','2020-08-16','A24',24,'21:31','21:32','21:33',2,'2020-08-16 21:31:41','2020-08-16 21:33:05','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('5c928ddd-6124-413d-9ca5-0f948035e78c','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','drake','2020-08-17','A14B',14,'11:08','11:09',NULL,-1,'2020-08-17 11:08:49','2020-08-17 11:09:23','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('600a1b36-1253-437e-b5ca-06cedf948169','77aad906-0eb3-4d98-b1c2-f3d66712d795','Andika Pratama','2020-08-17','A4',4,'06:11','08:33','08:34',2,'2020-08-17 06:11:14','2020-08-17 08:34:11','ffa3ceb2-e3c5-4b62-ab78-822d0b644783','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','8c42f66a-1573-4ca1-bca3-38121222a192'),
('6a1f3838-8193-4f15-8a0f-4c840a00ca99','7c7516c1-5075-4707-9301-4f226320b64e','Ludwig Van Beethoven','2020-08-16','A18',18,'20:30','20:30','20:30',2,'2020-08-16 20:30:25','2020-08-16 20:30:33','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('6bc9fcb6-e870-4e8a-bd35-027bfea447f1','7c7516c1-5075-4707-9301-4f226320b64e','Putri Dian Insani','2020-08-16','A1',1,'11:10','11:30','11:34',2,'2020-08-16 11:10:07','2020-08-16 11:43:26','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','ded3d480-8735-4e2a-af28-6cea40a542c5'),
('6d2d58c4-2d5e-44ca-9543-fd473a42a02f','7c7516c1-5075-4707-9301-4f226320b64e','mamangs','2020-08-16','A6',6,'15:46','19:04','19:04',2,'2020-08-16 15:46:26','2020-08-16 19:04:48','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','03066f7c-d747-450d-a399-124743314ecb'),
('76565b6f-f550-4443-9867-87a47d2c3ab7','7c7516c1-5075-4707-9301-4f226320b64e','Nella Kharisma','2020-08-16','A11',11,'19:55','19:58','19:58',2,'2020-08-16 19:55:28','2020-08-16 19:58:11','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('76999f0c-e2f7-4d07-987a-f661110bb189','7c7516c1-5075-4707-9301-4f226320b64e','Yuli','2020-08-16','A19',19,'20:34','20:34',NULL,-1,'2020-08-16 20:34:27','2020-08-16 20:34:37','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('77f15446-5957-43af-8edb-a3eb560233df','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','dash1','2020-08-17','A13B',13,'10:44','11:08','11:08',2,'2020-08-17 10:44:21','2020-08-17 11:08:26','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('7ced899f-4a67-4e7c-9d28-93f206b75a7d','77aad906-0eb3-4d98-b1c2-f3d66712d795','Andika Pratama','2020-08-17','A7',7,'08:22','08:34','11:13',2,'2020-08-17 08:22:56','2020-08-17 11:13:13','ffa3ceb2-e3c5-4b62-ab78-822d0b644783','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','8c42f66a-1573-4ca1-bca3-38121222a192'),
('7d006f97-54a6-45d7-b822-a130eb8facea','77aad906-0eb3-4d98-b1c2-f3d66712d795','Renaldin','2020-08-17','A10',10,'12:15',NULL,NULL,0,'2020-08-17 12:15:34','2020-08-17 12:15:34',NULL,'1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','1d1aaa10-fe01-4757-a566-634ca4178e98'),
('7d7ee746-9143-4b28-9c11-685a5d13cb28','bc467607-b772-441f-8ed5-7300f180e0fd','Dian test offline','2020-08-16','A-1',1,'20:22','20:27','20:49',2,'2020-08-16 20:22:47','2020-08-16 20:49:09','ace6f522-e54e-48ad-9b6e-8878d4c81154','7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1',NULL),
('802e607e-67fc-4b42-a2ea-f0190ace12e3','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','dash','2020-08-17','A12',12,'10:43','10:44',NULL,-1,'2020-08-17 10:43:23','2020-08-17 10:44:17','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('87001fa8-b114-44ba-8a10-fce9278db5e7','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','hish','2020-08-17','A4',4,'01:44','01:45','01:45',2,'2020-08-17 01:44:42','2020-08-17 01:45:41','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('88a92490-a040-4b2f-9724-5318d6c48747','b5593fb5-af5c-4284-ba85-7bafcdff645f','Andika Pratama','2020-08-17','P3C',3,'12:10',NULL,NULL,0,'2020-08-17 12:10:48','2020-08-17 12:10:48',NULL,'0dbbfdb0-715d-44cd-8458-c1187a3fd84e','8c42f66a-1573-4ca1-bca3-38121222a192'),
('8961b889-921b-430f-a401-dd527f8f0ccb','7118819e-9878-4ef4-b07b-9024934ecddb','arifa','2020-08-17','A6',6,'09:14',NULL,NULL,0,'2020-08-17 09:14:41','2020-08-17 09:14:41',NULL,'7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1','b8480087-af48-4bc7-933a-ab5778c41f70'),
('9082af48-1ab3-45ee-b478-aa50737b5837','7118819e-9878-4ef4-b07b-9024934ecddb','Arif Khairuddin','2020-08-17','A2',2,'08:04',NULL,NULL,0,'2020-08-17 08:04:16','2020-08-17 08:04:16',NULL,'7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1','ded3d480-8735-4e2a-af28-6cea40a542c5'),
('908c5823-47a5-4131-913c-e2c5944e725f','7c7516c1-5075-4707-9301-4f226320b64e','Arif Khairuddin','2020-08-16','A4',4,'12:50','18:45','18:45',2,'2020-08-16 12:50:35','2020-08-16 18:45:57','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','ded3d480-8735-4e2a-af28-6cea40a542c5'),
('90f94a78-992b-45c3-a483-0cba40ba8e03','7c7516c1-5075-4707-9301-4f226320b64e','medusa','2020-08-16','A23',23,'21:29','21:32',NULL,-1,'2020-08-16 21:29:58','2020-08-16 21:32:51','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('933d9882-29aa-4aa2-89d0-310557038a9e','7118819e-9878-4ef4-b07b-9024934ecddb','aripa','2020-08-17','A4',4,'08:51',NULL,NULL,0,'2020-08-17 08:51:22','2020-08-17 08:51:22',NULL,'7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1','eba12bbc-092e-400e-b5a3-6f4b761078eb'),
('96bc176a-7ddc-4d5d-b401-d106a9b221a1','7c7516c1-5075-4707-9301-4f226320b64e','A.K','2020-08-16','A20',20,'20:46','20:46',NULL,-1,'2020-08-16 20:46:39','2020-08-16 20:46:56','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('98c185a8-a890-44b5-a0d3-f9825d6b3b00','7c7516c1-5075-4707-9301-4f226320b64e','Zara Larsson','2020-08-16','A12',12,'19:58','20:00','20:18',2,'2020-08-16 19:58:00','2020-08-16 20:18:09','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('99eef22b-25cf-4185-a723-3cfecfe865ad','77aad906-0eb3-4d98-b1c2-f3d66712d795','Andika Pratama','2020-08-17','A1',1,'06:07','06:08',NULL,-1,'2020-08-17 06:07:02','2020-08-17 06:08:31','020a9d14-51d3-4843-bfe2-162ff76bb63a','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','8c42f66a-1573-4ca1-bca3-38121222a192'),
('9eda929e-f8d4-4888-82b1-bd3cf86a279d','7c7516c1-5075-4707-9301-4f226320b64e','aripa aripa','2020-08-16','A5',5,'14:38','18:45',NULL,-1,'2020-08-16 14:38:12','2020-08-16 18:45:58','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','249688ab-f95b-43b3-b787-a76a72b21c5c'),
('a1f7191f-6b4f-40a9-ad95-5ffe5bcff7f7','7c7516c1-5075-4707-9301-4f226320b64e','dash','2020-08-16','A14',14,'20:10','20:18',NULL,-1,'2020-08-16 20:10:57','2020-08-16 20:18:07','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('ac10a35a-3070-4271-89a7-26a108fc4b74','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','Arif Khai','2020-08-17','A8',8,'02:11','02:32','02:32',2,'2020-08-17 02:11:28','2020-08-17 02:32:26','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','04bce141-f9ad-4a2c-b749-3f53c74c3b3e'),
('b2f11411-af43-43dd-a6b9-eb16a0de538f','7c7516c1-5075-4707-9301-4f226320b64e','aripa','2020-08-16','A3',3,'12:50','18:44','18:44',2,'2020-08-16 12:50:31','2020-08-16 18:44:18','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','ded3d480-8735-4e2a-af28-6cea40a542c5'),
('b3c28fc1-29e6-4ba1-bb7b-098c2f801e1c','77aad906-0eb3-4d98-b1c2-f3d66712d795','Senny Hapiffah','2020-08-17','A8',8,'09:37','11:13','11:14',2,'2020-08-17 09:37:16','2020-08-17 11:14:05','ffa3ceb2-e3c5-4b62-ab78-822d0b644783','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','8c42f66a-1573-4ca1-bca3-38121222a192'),
('b4d06518-cd97-4c53-b3fd-b3695f9512c9','ffe43726-cc00-401e-8ae6-190ea24841c5','Putri Dian Insani','2020-08-15','A1',1,'13:49','14:49','15:49',2,'2020-08-15 13:49:21','2020-08-15 13:49:21',NULL,'68182b8e-1373-424f-86e3-36023bcd49ea','ded3d480-8735-4e2a-af28-6cea40a542c5'),
('b67a7371-6d06-4752-a450-94a1f0722758','7c7516c1-5075-4707-9301-4f226320b64e','dash','2020-08-16','A13',13,'20:10','20:18',NULL,-1,'2020-08-16 20:10:04','2020-08-16 20:18:05','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('bd64ab57-9162-4b87-ac85-40a99f2fc24b','b5593fb5-af5c-4284-ba85-7bafcdff645f','Dewi','2020-08-17','P5C',5,'12:12',NULL,NULL,0,'2020-08-17 12:12:47','2020-08-17 12:12:47',NULL,'0dbbfdb0-715d-44cd-8458-c1187a3fd84e','8c42f66a-1573-4ca1-bca3-38121222a192'),
('c4bf38de-4b18-4d2c-a220-4d137ce003cb','7c7516c1-5075-4707-9301-4f226320b64e','Arif Khairudin','2020-08-16','A7',7,'16:55','19:05',NULL,-1,'2020-08-16 16:55:48','2020-08-16 19:05:26','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','49aec392-6bfd-4fec-9462-b1a3257b253c'),
('cab593f8-e1ae-43ea-8817-b2bd988d86f2','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','Baru offline','2020-08-17','A7',7,'01:54','02:32','02:32',2,'2020-08-17 01:54:56','2020-08-17 02:32:20','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('cb3c3d13-5ed8-4321-ba0e-b5316742e85c','7c7516c1-5075-4707-9301-4f226320b64e','Joyner Lucas','2020-08-16','A26',26,'21:46','21:48','21:48',2,'2020-08-16 21:46:04','2020-08-16 21:48:39','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('cc0abb78-3435-4216-95b0-826d55b83943','7c7516c1-5075-4707-9301-4f226320b64e','dash','2020-08-16','A22',22,'21:14','21:30',NULL,-1,'2020-08-16 21:14:11','2020-08-16 21:30:43','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('cc6683ea-5336-413b-b052-3a0643a7076e','7c7516c1-5075-4707-9301-4f226320b64e','aripa','2020-08-16','A2',2,'12:34','18:44',NULL,-1,'2020-08-16 12:34:00','2020-08-16 18:44:05','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','249688ab-f95b-43b3-b787-a76a72b21c5c'),
('ce261df4-b946-4cb2-9a64-697b9a6bac33','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','Azra Dian','2020-08-17','A16B',16,'11:12','11:14',NULL,1,'2020-08-17 11:12:02','2020-08-17 11:14:13','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','8c42f66a-1573-4ca1-bca3-38121222a192'),
('d93c0ae2-8273-42bc-8025-8a26c05e1efb','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','aripa','2020-08-17','A9',9,'05:58','08:44',NULL,-1,'2020-08-17 05:58:11','2020-08-17 08:44:56','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','b8480087-af48-4bc7-933a-ab5778c41f70'),
('e08b6f16-71c0-4e33-821a-2bf156fcaa92','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','Arif K','2020-08-17','A11',11,'08:05','09:24','09:24',2,'2020-08-17 08:05:22','2020-08-17 09:24:25','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','ded3d480-8735-4e2a-af28-6cea40a542c5'),
('e15d5d41-d8bb-4e7a-bab3-c84ce948072b','7c7516c1-5075-4707-9301-4f226320b64e','Zera','2020-08-16','A10',10,'19:55','19:58','19:58',2,'2020-08-16 19:55:15','2020-08-16 19:58:09','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('e584a3fa-ed35-47a3-8efc-8a683960206b','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','Arif kh','2020-08-17','A3',3,'01:19','01:45',NULL,-1,'2020-08-17 01:19:51','2020-08-17 01:45:30','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea','8eb9b67b-1c20-47e8-a477-8087942912aa'),
('e73ae9c8-dd56-49ac-95c1-5645d5811fdd','7c7516c1-5075-4707-9301-4f226320b64e','Mosa','2020-08-16','A8',8,'19:41','19:54',NULL,-1,'2020-08-16 19:41:54','2020-08-16 19:54:11','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('f5a33326-d585-4331-a403-d90756c063e6','7c7516c1-5075-4707-9301-4f226320b64e','Dian','2020-08-16','A21',21,'20:56','21:20',NULL,-1,'2020-08-16 20:56:01','2020-08-16 21:20:26','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('fa607a06-8247-4494-b652-9c08cd2e2d20','bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','hash','2020-08-17','A2',2,'01:18','01:21','01:45',2,'2020-08-17 01:18:24','2020-08-17 01:45:27','954b439a-5553-444d-afe5-7f45c98bf03c','68182b8e-1373-424f-86e3-36023bcd49ea',NULL),
('fb81759a-c0b0-408c-9aaf-f5d69c896659','b5593fb5-af5c-4284-ba85-7bafcdff645f','Cecep','2020-08-17','P2C',2,'12:10','12:10',NULL,-1,'2020-08-17 12:10:27','2020-08-17 12:10:46','515b9e1e-9360-4c3d-b6b5-f9746c4d2dec','0dbbfdb0-715d-44cd-8458-c1187a3fd84e','8c42f66a-1573-4ca1-bca3-38121222a192');

/*Table structure for table `trx_instance_history_queues` */

DROP TABLE IF EXISTS `trx_instance_history_queues`;

CREATE TABLE `trx_instance_history_queues` (
  `id` varchar(100) NOT NULL,
  `instance_id` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_queue` int(11) DEFAULT '0',
  `total_queue` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trx_instance_history_queues_mst_instances_id_fk` (`instance_id`),
  CONSTRAINT `trx_instance_history_queues_mst_instances_id_fk` FOREIGN KEY (`instance_id`) REFERENCES `mst_instances` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trx_instance_history_queues` */

insert  into `trx_instance_history_queues`(`id`,`instance_id`,`date`,`last_queue`,`total_queue`,`created_at`,`updated_at`) values 
('4b86b326-fc50-4594-948d-c9a796ad5ec8','31d67572-987a-4752-af51-29e7417af063','2020-08-17',0,1,'2020-08-17 08:43:24','2020-08-17 08:43:24'),
('7118819e-9878-4ef4-b07b-9024934ecddb','7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1','2020-08-17',0,6,'2020-08-17 07:52:36','2020-08-17 09:14:41'),
('77aad906-0eb3-4d98-b1c2-f3d66712d795','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa','2020-08-17',9,10,'2020-08-17 06:07:02','2020-08-17 12:15:34'),
('7c7516c1-5075-4707-9301-4f226320b64e','68182b8e-1373-424f-86e3-36023bcd49ea','2020-08-16',26,26,'2020-08-16 11:10:07','2020-08-16 21:48:21'),
('b5593fb5-af5c-4284-ba85-7bafcdff645f','0dbbfdb0-715d-44cd-8458-c1187a3fd84e','2020-08-17',2,5,'2020-08-17 12:09:54','2020-08-17 12:12:47'),
('bb6b25a5-4df3-4c2e-b0fb-d5e92b1ab1b8','68182b8e-1373-424f-86e3-36023bcd49ea','2020-08-17',16,17,'2020-08-17 01:14:05','2020-08-17 12:13:21'),
('bc467607-b772-441f-8ed5-7300f180e0fd','7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1','2020-08-16',2,2,'2020-08-16 20:22:47','2020-08-16 20:49:11'),
('ffe43726-cc00-401e-8ae6-190ea24841c5','68182b8e-1373-424f-86e3-36023bcd49ea','2020-08-15',1,1,'2020-08-15 13:49:21','2020-08-15 13:49:21');

/*Table structure for table `trx_instance_settings` */

DROP TABLE IF EXISTS `trx_instance_settings`;

CREATE TABLE `trx_instance_settings` (
  `id` varchar(100) NOT NULL,
  `instance_id` varchar(100) DEFAULT NULL,
  `with_max_queue` tinyint(4) DEFAULT '0',
  `max_queue` int(11) DEFAULT NULL,
  `start_time` varchar(5) DEFAULT NULL,
  `end_time` varchar(5) DEFAULT NULL,
  `is_close_queue` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trx_instance_settings_mst_instances_id_fk` (`instance_id`),
  CONSTRAINT `trx_instance_settings_mst_instances_id_fk` FOREIGN KEY (`instance_id`) REFERENCES `mst_instances` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trx_instance_settings` */

insert  into `trx_instance_settings`(`id`,`instance_id`,`with_max_queue`,`max_queue`,`start_time`,`end_time`,`is_close_queue`,`created_at`,`updated_at`) values 
('1cc309a9-0b1a-430a-85ff-3726766298d1','0dbbfdb0-715d-44cd-8458-c1187a3fd84e',1,20,'09:00','17:00',0,'2020-08-17 12:09:27','2020-08-17 12:09:27'),
('5d2b9ebd-680b-41f5-8f35-59b25a0329ff','68182b8e-1373-424f-86e3-36023bcd49ea',1,100,'01:00','22:00',0,'2020-08-15 03:10:54','2020-08-17 01:13:58'),
('d65f2225-dfbf-4330-9235-b74c223750d0','7c90dcc2-4874-4dcd-a89b-3d03a26e5fd1',1,20,'07:00','21:00',0,'2020-08-16 14:02:28','2020-08-16 14:02:28'),
('e709a089-e381-4d4d-9fe6-3fd7303bfa0d','1f1dbc2a-aeec-4c73-a6f9-81996b9f92aa',1,11,'06:00','17:00',0,'2020-08-17 05:57:26','2020-08-17 05:57:26'),
('ed866f26-f1d4-4f1f-94d6-553f02ae220c','31d67572-987a-4752-af51-29e7417af063',1,20,'08:00','22:00',0,'2020-08-16 21:43:46','2020-08-16 21:47:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
