SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE administrators (
  'id' int(3), -- PRIMARY NOT NULL
  'username' varchar(20), -- NOT NULL
  'password' varchar(64)  -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
-----------------------------------------------------------------
CREATE TABLE resturant (
  'id' int(3), -- PRIMARY NOT NULL
  'name' varchar(100), -- NOT NULL
  'description' varchar(2000), -- NOT NULL
  'logo' varchar(2000) -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
-----------------------------------------------------------------
CREATE TABLE adminComments (
  'username' varchar(100), -- PRIMARY NOT NULL
  'msgsNum' int(3), -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
------
CREATE TABLE adminCommentsBody (
  'username' varchar(100), -- PRIMARY NOT NULL
  'body' varchar(2000), -- NOT NULL
                    -- FOREIGN KEY("username")
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4oDB
COLLATE=utf8mb4_unicode_ci;
-----------------------------------------------------------------

-- 2 Tables for Contact us section.
-- First table, storing:
-- name, email, and messages counter
-- Second table, messages content for each customer.
CREATE TABLE customersMessages (
  'id' int(4), -- PRIMARY NOT NULL
  'customerName' varchar(50), -- NOT NULL
  'email' varchar(200), -- UNIQUE
  'messagesCount' int (3) -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
------
CREATE TABLE messagesContent (
  'messageID' int(3), -- PRIMARY NOT NULL
  'customerID' int(3), -- FOREIGN KEY NOT NULL
  'messageContent' varchar(2000), -- NOT NULL
  'inserted_at' (23) -- NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;