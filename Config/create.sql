
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- support_ticket
-- ---------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `support_ticket`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `status` TINYINT DEFAULT 0 NOT NULL,
    `customer_id` INTEGER NOT NULL,
    `admin_id` INTEGER,
    `order_id` INTEGER,
    `order_product_id` INTEGER,
    `subject` VARCHAR(255),
    `message` LONGTEXT,
    `response` LONGTEXT,
    `replied_at` DATETIME,
    `comment` LONGTEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `FI_support_ticket_customer_id` (`customer_id`),
    INDEX `FI_support_ticket_admin_id` (`admin_id`),
    INDEX `FI_support_ticket_order_id` (`order_id`),
    INDEX `FI_support_ticket_order_product_id` (`order_product_id`),
    CONSTRAINT `fk_support_ticket_customer_id`
        FOREIGN KEY (`customer_id`)
        REFERENCES `customer` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE,
    CONSTRAINT `fk_support_ticket_admin_id`
        FOREIGN KEY (`admin_id`)
        REFERENCES `admin` (`id`)
        ON DELETE SET NULL,
    CONSTRAINT `fk_support_ticket_order_id`
        FOREIGN KEY (`order_id`)
        REFERENCES `order` (`id`)
        ON DELETE SET NULL,
    CONSTRAINT `fk_support_ticket_order_product_id`
        FOREIGN KEY (`order_product_id`)
        REFERENCES `order_product` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
