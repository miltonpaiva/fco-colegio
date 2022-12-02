-- kuv0hvqh598ze6l5.terms definition

CREATE TABLE `terms` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `term` mediumtext NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);