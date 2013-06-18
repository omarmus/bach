
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- sys_migrations
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_migrations`;

CREATE TABLE `sys_migrations`
(
    `version` INTEGER(3) NOT NULL,
    PRIMARY KEY (`version`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_pages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_pages`;

CREATE TABLE `sys_pages`
(
    `id_page` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(100) NOT NULL,
    `slug` VARCHAR(100) NOT NULL,
    `order` INTEGER NOT NULL,
    `body` TEXT NOT NULL,
    PRIMARY KEY (`id_page`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_roles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_roles`;

CREATE TABLE `sys_roles`
(
    `id_rol` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50),
    `description` VARCHAR(255),
    PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_roles_x_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_roles_x_user`;

CREATE TABLE `sys_roles_x_user`
(
    `id_rol` INTEGER NOT NULL,
    `id_user` INTEGER NOT NULL,
    PRIMARY KEY (`id_rol`,`id_user`),
    INDEX `id_rol` (`id_rol`),
    INDEX `id_user` (`id_user`),
    CONSTRAINT `sys_roles_x_user_fk1`
        FOREIGN KEY (`id_user`)
        REFERENCES `sys_users` (`id_user`),
    CONSTRAINT `sys_roles_x_user_fk`
        FOREIGN KEY (`id_rol`)
        REFERENCES `sys_roles` (`id_rol`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_users`;

CREATE TABLE `sys_users`
(
    `id_user` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50),
    `password` VARCHAR(255),
    `email` VARCHAR(100),
    `first_name` VARCHAR(50),
    `last_name` VARCHAR(100),
    PRIMARY KEY (`id_user`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
