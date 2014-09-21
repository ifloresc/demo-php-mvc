/*
Scrip que crea tablas
*/
-- Module
CREATE TABLE `Module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `code` varchar(5) NOT NULL,
  `description` longtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `enabled` BOOL NOT NULL,
  CONSTRAINT UNIQUE uniq_module (code),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Application
CREATE TABLE `Application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `code` varchar(5) NOT NULL,
  `description` longtext NOT NULL,
  `enabled` BOOL NOT NULL,
  CONSTRAINT UNIQUE uniq_app (code),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Option
CREATE TABLE `Options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  `code` varchar(30) NOT NULL,
  `url` varchar(50) NOT NULL,
  `module_id` int(11) NOT NULL,
  `father_option` int(11),
  `enabled` BOOL NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_OPT_MOD` (`module_id`),
  CONSTRAINT UNIQUE uniq_option (code),
  CONSTRAINT `FK_OPT_MOD` FOREIGN KEY (`module_id`) REFERENCES `Module` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ApplicationOption
CREATE TABLE `ApplicationOption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `enabled` BOOL NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_APPOPT_APP` (`application_id`),
  KEY `IDX_APPOPT_OPT` (`option_id`),
  CONSTRAINT UNIQUE uniq_appoption (application_id, option_id),
  CONSTRAINT `FK_APPOPT_APP` FOREIGN KEY (`application_id`) REFERENCES `Application` (`id`),
  CONSTRAINT `FK_APPOPT_OPT` FOREIGN KEY (`option_id`) REFERENCES `Options` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Packet
CREATE TABLE `Packet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `enabled` BOOL NOT NULL,
  CONSTRAINT UNIQUE uniq_packet (name),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- PacketOption
CREATE TABLE `PacketOption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_opt_id` int(11) NOT NULL,
  `packet_id` int(11) NOT NULL,
  `enabled` BOOL NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PACKOPT_APP` (`app_opt_id`),
  KEY `IDX_PACKOPT_PACK` (`packet_id`),
  CONSTRAINT UNIQUE uniq_profappoption (app_opt_id, packet_id),
  CONSTRAINT `FK_PACKOPT_APP` FOREIGN KEY (`app_opt_id`) REFERENCES `ApplicationOption` (`id`),
  CONSTRAINT `FK_PACKOPT_PACK` FOREIGN KEY (`packet_id`) REFERENCES `Packet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Profile
CREATE TABLE `Profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `packet_id` int(11) NOT NULL,
  `enabled` BOOL NOT NULL,
  KEY `IDX_PROF_PACK` (`packet_id`),
  CONSTRAINT UNIQUE uniq_profile (name),
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_PROF_PACK` FOREIGN KEY (`packet_id`) REFERENCES `Packet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ProfileAppOption
CREATE TABLE `ProfileOption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `packet_opt_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `enabled` BOOL NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PROFOPT_APP` (`packet_opt_id`),
  KEY `IDX_PROFOPT_PROF` (`profile_id`),
  CONSTRAINT UNIQUE uniq_profappoption (packet_opt_id, profile_id),
  CONSTRAINT `FK_PROFOPT_APP` FOREIGN KEY (`packet_opt_id`) REFERENCES `PacketOption` (`id`),
  CONSTRAINT `FK_PROFOPT_PROF` FOREIGN KEY (`profile_id`) REFERENCES `Profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- UserType
CREATE TABLE `UserType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  CONSTRAINT UNIQUE uniq_userType (name),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- User
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `enabled` BOOL NOT NULL,
  `creation` datetime NOT NULL,
  `modify` datetime,
  `bloqued` BOOL NOT NULL DEFAULT false,
  PRIMARY KEY (`id`),
  KEY `IDX_USR_PROF` (`profile_id`),
  KEY `IDX_USR_TYPE` (`user_type_id`),
  CONSTRAINT UNIQUE uniq_user (login),
  CONSTRAINT `FK_USR_PROF` FOREIGN KEY (`profile_id`) REFERENCES `Profile` (`id`),
  CONSTRAINT `FK_USR_TYPE` FOREIGN KEY (`user_type_id`) REFERENCES `UserType` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Login
CREATE TABLE `Login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `enabled` BOOL NOT NULL,
  `attempts` int(11) DEFAULT 0,
  `temp` BOOL NOT NULL,
  `lastLogin` datetime,
  `expirate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_LOG_USR` (`user_id`),
  CONSTRAINT `FK_LOG_USR` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;