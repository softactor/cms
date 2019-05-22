DROP TABLE IF EXISTS `assigned`;

CREATE TABLE `assigned` (
  `assing_id` int(200) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `complain_id` bigint(200) unsigned DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `sort_type` varchar(200) DEFAULT NULL,
  `dead_line` date DEFAULT NULL,
  PRIMARY KEY (`assing_id`),
  KEY `fk_u_id` (`user_id`),
  KEY `fk_c_id` (`complain_id`),
  CONSTRAINT `fk_c_id` FOREIGN KEY (`complain_id`) REFERENCES `complain_details` (`details_id`),
  CONSTRAINT `fk_u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `assigned` */

insert  into `assigned`(`assing_id`,`user_id`,`complain_id`,`status`,`sort_type`,`dead_line`) values (29,11,7,'accepted','new','2019-05-31'),(30,11,7,'processing','new','2019-05-31'),(31,18,10,'processing','new','2019-05-31'),(32,11,11,'processing','new','2019-05-31');

/*Table structure for table `complain_details` */

DROP TABLE IF EXISTS `complain_details`;

CREATE TABLE `complain_details` (
  `details_id` bigint(200) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(200) unsigned DEFAULT NULL,
  `complain_type_id` int(11) unsigned DEFAULT NULL,
  `complain_details` text,
  `complain_status` varchar(255) DEFAULT NULL,
  `issued_date` datetime DEFAULT NULL,
  PRIMARY KEY (`details_id`),
  KEY `fk_com_type_id` (`complain_type_id`),
  KEY `fkuid` (`user_id`),
  CONSTRAINT `fk_com_type_id` FOREIGN KEY (`complain_type_id`) REFERENCES `complain_type` (`type_id`),
  CONSTRAINT `fkuid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `complain_details` */

insert  into `complain_details`(`details_id`,`user_id`,`complain_type_id`,`complain_details`,`complain_status`,`issued_date`) values (7,1,2,'some computers','pending','2019-05-24 12:00:00'),(10,17,1,'cokivninvwjenv','pending','2019-05-24 12:00:00'),(11,17,2,'sdfakjfnkjvna','pending','2018-12-01 14:00:00');

/*Table structure for table `complain_feedback` */

DROP TABLE IF EXISTS `complain_feedback`;

CREATE TABLE `complain_feedback` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `complain_id` int(11) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `complain_details` text,
  `issued_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkuserid` (`user_id`),
  KEY `fkcomplainid` (`complain_id`),
  CONSTRAINT `fkcomplainid` FOREIGN KEY (`complain_id`) REFERENCES `complain_type` (`type_id`),
  CONSTRAINT `fkuserid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `complain_feedback` */

insert  into `complain_feedback`(`id`,`complain_id`,`user_id`,`complain_details`,`issued_date`) values (1,2,1,'erfaergaer','2019-04-23 00:08:00'),(2,2,1,'computers kharab','2019-04-30 14:57:00'),(3,2,1,'bsrgtbrtbetb','2019-04-04 13:59:00');

/*Table structure for table `complain_type` */

DROP TABLE IF EXISTS `complain_type`;

CREATE TABLE `complain_type` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `complain_type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `complain_type` */

insert  into `complain_type`(`type_id`,`complain_type_name`) values (1,'accesoriess'),(2,'computers'),(3,'network');

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(233) DEFAULT NULL,
  `dep_details` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `departments` */

insert  into `departments`(`id`,`dep_name`,`dep_details`) values (1,'infrastructure','hello infrustructure');

/*Table structure for table `engineers` */

DROP TABLE IF EXISTS `engineers`;

CREATE TABLE `engineers` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `complain_type` varchar(255) DEFAULT NULL,
  `complain_details` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `engineers` */

/*Table structure for table `executive` */

DROP TABLE IF EXISTS `executive`;

CREATE TABLE `executive` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `complain_type` varchar(255) DEFAULT NULL,
  `complain_details` text,
  `processing` smallint(2) DEFAULT '0',
  `status` smallint(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fkuser` (`user_id`),
  CONSTRAINT `fkuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `executive` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (7,'2014_10_12_000000_create_users_table',1);

/*Table structure for table `permision` */

DROP TABLE IF EXISTS `permision`;

CREATE TABLE `permision` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `actual_name` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `order` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `permision` */

insert  into `permision`(`id`,`actual_name`,`display_name`,`order`) values (1,'create_complain','crete',NULL),(2,'admin.user.list','view',NULL);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `roles_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`roles_id`,`role_name`) values (1,'engineer'),(2,'employee'),(3,'admin'),(4,'executive');

/*Table structure for table `user_permision` */

DROP TABLE IF EXISTS `user_permision`;

CREATE TABLE `user_permision` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `permision_id` bigint(20) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rle_id` (`role_id`),
  KEY `fk_userid` (`user_id`),
  KEY `fk_permison_id` (`permision_id`),
  CONSTRAINT `fk_permison_id` FOREIGN KEY (`permision_id`) REFERENCES `permision` (`id`),
  CONSTRAINT `fk_rle_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`roles_id`),
  CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_permision` */

insert  into `user_permision`(`id`,`user_id`,`permision_id`,`role_id`) values (1,1,1,3),(2,17,2,4);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(200) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) unsigned DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_permision_id` bigint(20) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Picture` blob,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_roles` (`role_id`),
  CONSTRAINT `fk_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`roles_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`role_id`,`password`,`user_permision_id`,`remember_token`,`created_at`,`updated_at`,`Picture`,`specialist`) values (1,'ahmed','sharmoboy@gmail.com',NULL,3,'$2y$10$/v8Q5.4eZdaseDKtu906sOUhPj.I7MOSoXUJnkaEHDJ6FV..ClPhm',NULL,NULL,'2019-04-09 15:33:01','2019-04-09 15:33:01',NULL,NULL),(11,'enginner1','sharmossboy@gmail.com',NULL,1,'$2y$10$/v8Q5.4eZdaseDKtu906sOUhPj.I7MOSoXUJnkaEHDJ6FV..ClPhm',NULL,NULL,'2019-04-16 21:24:07',NULL,NULL,'computers and network'),(12,'geedi','admin@admin',NULL,2,'$2y$10$/v8Q5.4eZdaseDKtu906sOUhPj.I7MOSoXUJnkaEHDJ6FV..ClPhm',NULL,NULL,NULL,NULL,NULL,NULL),(15,'ahmed','complain@complain',NULL,3,'202cb962ac59075b964b07152d234b70',NULL,NULL,NULL,NULL,NULL,NULL),(17,'test','test@gmail.com',NULL,4,'$2y$10$/v8Q5.4eZdaseDKtu906sOUhPj.I7MOSoXUJnkaEHDJ6FV..ClPhm',NULL,NULL,NULL,NULL,NULL,NULL),(18,'new enginner','eng@eng.com',NULL,1,'$2y$10$/v8Q5.4eZdaseDKtu906sOUhPj.I7MOSoXUJnkaEHDJ6FV..ClPhm',NULL,NULL,NULL,NULL,NULL,NULL);