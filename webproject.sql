SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE administrators (
  `id` SMALLINT(3), -- PRIMARY NOT NULL
  `username` varchar(20), -- NOT NULL
  `password` varchar(64)  -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
-- ALTER TABLE `` CHANGE `id` `id` SMALLINT(3) PRIMARY KEY;
-- ALTER TABLE `` MODIFY COLUMN `id` SMALLINT(3) NOT NULL AI;
-- ALTER TABLE `` MODIFY COLUMN `username` varchar(20) NOT NULL UNIQUE;
-- ALTER TABLE `` MODIFY COLUMN `password` varchar(64) NOT NULL;
-----------------------------------------------------------------
CREATE TABLE resturant (
  `id` SMALLINT(3), -- PRIMARY KEY NOT NULL
  `name` varchar(50), -- NOT NULL UNIQUE
  `description` varchar(1000), -- NOT NULL
  `logo` varchar(2000) -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
-----------------------------------------------------------------
CREATE TABLE adminComments (
  `id` SMALLINT(3), -- PRIMARY NOT NULL
  `adminID` SMALLINT(3), -- FOREIGN KEY NOT NULL
  `username` varchar(20), -- NOT NULL
  `messagesCount` SMALLINT(3), -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
------
CREATE TABLE adminCommentsBody (
  `id` SMALLINT(3), -- PRIMARY NOT NULL
  `SenderID` SMALLINT(3), -- FOREIGN KEY NOT NULL
  --`username` varchar(20), -- NOT NULL ,,  security issues prevention
  `body` varchar(2000) -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4oDB
COLLATE=utf8mb4_unicode_ci;
-----------------------------------------------------------------

-- 2 Tables for Contact us section.
-- First table, storing:
-- name, email, and messages counter
-- Second table, messages content for each customer.
CREATE TABLE customersMessages (
  `id` SMALLINT(4), -- PRIMARY NOT NULL
  `customerName` varchar(20), -- NOT NULL
  `email` varchar(100), -- UNIQUE
  `messagesCount` SMALLINT(3) -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
------
CREATE TABLE messagesContent (
  `messageID` SMALLINT(3), -- PRIMARY NOT NULL
  `customerID` SMALLINT(3), -- FOREIGN KEY NOT NULL
  `messageContent` varchar(2000), -- NOT NULL
  `inserted_at` (23) -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;