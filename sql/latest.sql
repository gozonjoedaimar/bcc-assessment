#
# TABLE STRUCTURE FOR: admin_groups
#

DROP TABLE IF EXISTS `admin_groups`;

CREATE TABLE `admin_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('1', 'webmaster', 'Webmaster');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('2', 'admin', 'Administrator');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('4', 'staff', 'Staff');


#
# TABLE STRUCTURE FOR: admin_login_attempts
#

DROP TABLE IF EXISTS `admin_login_attempts`;

CREATE TABLE `admin_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: admin_users
#

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('1', '127.0.0.1', 'webmaster', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', NULL, NULL, NULL, NULL, NULL, NULL, '1451900190', '1545835107', '1', 'Webmaster', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('2', '127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', NULL, NULL, NULL, NULL, NULL, 'tTXDuQ63FrUQg5x39cDFgO', '1451900228', '1545832318', '1', 'Admin', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('3', '127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', NULL, NULL, NULL, NULL, NULL, NULL, '1451900430', '1543586196', '0', 'Manager', NULL);
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('4', '127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', NULL, NULL, NULL, NULL, NULL, NULL, '1451900439', '1545006024', '1', 'Staff', '');


#
# TABLE STRUCTURE FOR: admin_users_groups
#

DROP TABLE IF EXISTS `admin_users_groups`;

CREATE TABLE `admin_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_user_ref` (`user_id`),
  KEY `admin_group_ref` (`group_id`),
  CONSTRAINT `admin_users_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin_users` (`id`),
  CONSTRAINT `admin_users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `admin_groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES ('1', '1', '1');
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES ('2', '2', '2');


#
# TABLE STRUCTURE FOR: api_access
#

DROP TABLE IF EXISTS `api_access`;

CREATE TABLE `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: api_keys
#

DROP TABLE IF EXISTS `api_keys`;

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `api_keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES ('1', '0', 'anonymous', '1', '1', '0', NULL, '1463388382');


#
# TABLE STRUCTURE FOR: api_limits
#

DROP TABLE IF EXISTS `api_limits`;

CREATE TABLE `api_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: api_logs
#

DROP TABLE IF EXISTS `api_logs`;

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: assessment
#

DROP TABLE IF EXISTS `assessment`;

CREATE TABLE `assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment` double DEFAULT NULL,
  `paid` int(11) DEFAULT NULL,
  `assessment_group` int(11) DEFAULT NULL,
  `form_type` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `main_balance` (`assessment_group`),
  CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`assessment_group`) REFERENCES `assessment_group` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `assessment` (`id`, `payment`, `paid`, `assessment_group`, `form_type`, `description`, `datetime`) VALUES ('7', '1000', '0', '9', 'assessment_form', '', '2018-12-26 22:35:11');
INSERT INTO `assessment` (`id`, `payment`, `paid`, `assessment_group`, `form_type`, `description`, `datetime`) VALUES ('8', '100', '0', '9', 'statement_of_account', 'City Smile', '2018-12-26 22:35:51');
INSERT INTO `assessment` (`id`, `payment`, `paid`, `assessment_group`, `form_type`, `description`, `datetime`) VALUES ('9', '1200', '0', '9', 'statement_of_account', 'midterm | old_account | NSTP', '2018-12-26 22:37:41');


#
# TABLE STRUCTURE FOR: assessment_group
#

DROP TABLE IF EXISTS `assessment_group`;

CREATE TABLE `assessment_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) DEFAULT NULL,
  `year_level` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text,
  `balance` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_ref0001` (`student_id`),
  KEY `course_ref0002` (`course_code`),
  CONSTRAINT `assessment_group_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `courses` (`code`),
  CONSTRAINT `assessment_group_std_ref` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `assessment_group` (`id`, `student_id`, `year_level`, `course_code`, `datetime`, `description`, `balance`) VALUES ('9', '2998', '1', 'BSIT', '2018-12-26 22:35:11', NULL, '3195');


#
# TABLE STRUCTURE FOR: courses
#

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_ref_main` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `courses` (`id`, `code`, `name`) VALUES ('1', 'BSOA', 'Bachelor of Science in Office Administration');
INSERT INTO `courses` (`id`, `code`, `name`) VALUES ('2', 'BSIS', 'Bachelor of Science in Information Systems');
INSERT INTO `courses` (`id`, `code`, `name`) VALUES ('3', 'BSIT', 'Bachelor of Science in Industrial Technology');


#
# TABLE STRUCTURE FOR: groups
#

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES ('1', 'members', 'General User');


#
# TABLE STRUCTURE FOR: login_attempts
#

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: price_defaults
#

DROP TABLE IF EXISTS `price_defaults`;

CREATE TABLE `price_defaults` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `price_defaults` (`id`, `label`, `value`, `name`) VALUES ('2', 'Units', '30', 'units');
INSERT INTO `price_defaults` (`id`, `label`, `value`, `name`) VALUES ('3', 'Registration Fee', '100', 'registration_fee');
INSERT INTO `price_defaults` (`id`, `label`, `value`, `name`) VALUES ('4', 'Library Fee', '5', 'library_fee');
INSERT INTO `price_defaults` (`id`, `label`, `value`, `name`) VALUES ('5', 'Developement Fee', '25', 'development_fee');
INSERT INTO `price_defaults` (`id`, `label`, `value`, `name`) VALUES ('6', 'Sports', '10', 'sports');
INSERT INTO `price_defaults` (`id`, `label`, `value`, `name`) VALUES ('7', 'Cultural', '5', 'cultural');
INSERT INTO `price_defaults` (`id`, `label`, `value`, `name`) VALUES ('8', 'Laboratory Fee', '15', 'laboratory_fee');
INSERT INTO `price_defaults` (`id`, `label`, `value`, `name`) VALUES ('9', 'NSTP', '45', 'nstp');
INSERT INTO `price_defaults` (`id`, `label`, `value`, `name`) VALUES ('10', 'City Smile ( Sch. Paper )', '20', 'city_smile');


#
# TABLE STRUCTURE FOR: students
#

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `course_ref0001` (`course_code`),
  KEY `student_id_main` (`student_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('1', 'Murphils', 'Diane', '', NULL, 'dmurphy@classicmodelcars.com', '7869', '', '', 'male', '', 'BSOA', '2018-12-26 13:07:30');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('2', 'Patterson', 'Mary', 'Geralds', NULL, 'mpatterso@classicmodelcars.com', '2576', '', '', 'female', '', 'BSIT', '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('3', 'Firrelli', 'Jeff', '', NULL, 'jfirrelli@classicmodelcars.com', '2991', '', '', 'male', '', 'BSOA', '2018-12-26 13:07:41');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('4', 'Patterson', 'William', 'Spase', NULL, 'wpatterson@classicmodelcars.com', '2511', '', '', 'male', '', 'BSOA', '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('5', 'Bondur', 'Gerard', '', NULL, 'gbondur@classicmodelcars.com', '2512', '', '', 'male', '', 'BSOA', '2018-12-26 13:05:07');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('6', 'Bow', 'Anthony', '', NULL, 'abow@classicmodelcars.com', '7889', '', '', 'male', '', 'BSOA', '2018-12-26 13:07:11');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('7', 'Jennings', 'Leslie', '', NULL, 'ljennings@classicmodelcars.com', '9887', '', '', 'male', '', 'BSOA', '2018-12-26 13:10:48');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('8', 'Thompson', 'Leslie', NULL, NULL, 'lthompson@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('9', 'Firrelli', 'Julie', NULL, NULL, 'jfirrelli@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('10', 'Patterson', 'Steve', NULL, NULL, 'spatterson@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('11', 'Tseng', 'Foon Yue', NULL, NULL, 'ftseng@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('12', 'Vanauf', 'George', NULL, NULL, 'gvanauf@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('13', 'Bondur', 'Loui', NULL, NULL, 'lbondur@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('14', 'Hernandez', 'Gerard', NULL, NULL, 'ghernande@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('15', 'Castillo', 'Pamela', NULL, NULL, 'pcastillo@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('16', 'Bott', 'Larry', NULL, NULL, 'lbott@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('17', 'Jones', 'Barry', NULL, NULL, 'bjones@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('18', 'Fixter', 'Andy', NULL, NULL, 'afixter@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('19', 'Marsh', 'Peter', NULL, NULL, 'pmarsh@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('20', 'King', 'Tom', NULL, NULL, 'tking@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('21', 'Nishi', 'Mami', NULL, NULL, 'mnishi@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('22', 'Kato', 'Yoshimi', NULL, NULL, 'ykato@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('23', 'Gerard', 'Martin', NULL, NULL, 'mgerard@classicmodelcars.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('24', 'Doe', 'Jane', NULL, NULL, 'janedoe@example.com', NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 09:03:49');
INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `extension`, `email`, `student_id`, `phone_number`, `department`, `gender`, `permanent_address`, `course_code`, `datetime`) VALUES ('29', 'Firelli', 'Jeff', '', NULL, NULL, '2998', NULL, NULL, NULL, NULL, 'BSIT', '2018-12-26 22:35:11');


#
# TABLE STRUCTURE FOR: subjects
#

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `subjects` (`id`, `name`, `code`, `unit`) VALUES ('1', 'English', 'ENG111', '3');
INSERT INTO `subjects` (`id`, `name`, `code`, `unit`) VALUES ('2', 'Principles of Programming ', 'PROG101', '3');
INSERT INTO `subjects` (`id`, `name`, `code`, `unit`) VALUES ('3', 'Data structures and algorithm', 'DDD111', '3');
INSERT INTO `subjects` (`id`, `name`, `code`, `unit`) VALUES ('4', 'Psychology', 'PSY111', '3');
INSERT INTO `subjects` (`id`, `name`, `code`, `unit`) VALUES ('5', 'Rizal', 'RIZAL111', '3');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES ('1', '127.0.0.1', 'member', '$2y$08$kkqUE2hrqAJtg.pPnAhvL.1iE7LIujK5LZ61arONLpaBBWh/ek61G', NULL, 'member@member.com', NULL, NULL, NULL, NULL, '1451903855', '1451905011', '1', 'Member', 'One', NULL, NULL);
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES ('2', '::1', 'johndoe', '$2y$08$GW.BtJ3ANRQrMLr8XNlNUenTwGimkrKlGoa0T1uMOqXlrabEM2bM2', NULL, 'johndoe@example.com', NULL, NULL, NULL, NULL, '1543038536', NULL, '1', 'John', 'Doe', NULL, NULL);
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES ('3', '::1', 'janedoe', '$2y$08$3jhfEkrqpaDrus88S7gS8.ADsBPz.FKVng.7aG9CkN9x55GiAXn2O', NULL, 'janedoe@example.com', NULL, NULL, NULL, NULL, '1543042602', NULL, '1', 'Jane', 'Doe', NULL, NULL);


#
# TABLE STRUCTURE FOR: users_groups
#

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('1', '1', '1');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('2', '2', '1');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('3', '3', '1');


