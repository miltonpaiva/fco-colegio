-- users definition

CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `cpf` bigint NOT NULL,
  `birth_date` date NOT NULL,
  `age` int DEFAULT NULL,
  `road` varchar(100) NOT NULL,
  `post_code` bigint NOT NULL,
  `district` varchar(100) NOT NULL,
  `road_number` int DEFAULT '0',
  `complement` varchar(250) NOT NULL,
  `County` varchar(100) NOT NULL,
  `uf` varchar(100) NOT NULL,
  `cell_phone` bigint NOT NULL,
  `residential` bigint DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `signature` mediumtext,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;