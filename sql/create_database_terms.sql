-- kuv0hvqh598ze6l5.terms definition

CREATE TABLE `terms` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `term` mediumtext NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;