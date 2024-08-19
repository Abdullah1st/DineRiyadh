SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE administrators (
  'username' varchar(20) PRIMARY NOT NULL,
  'password' varchar(64) NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;

CREATE TABLE resturant (
  'name' varchar(100) PRIMARY NOT NULL,
  'description' varchar(2000) NOT NULL,
  'logo' varchar(2000) NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


CREATE TABLE adminComments (
  'username' varchar(100) PRIMARY NOT NULL,
  'msgsNum' int(3) NOT NULL,
  FOREIGN KEY("username")
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;

CREATE TABLE adminCommentsBody (
  'username' varchar(100) PRIMARY NOT NULL,
  'body' varchar(2000) NOT NULL,
  FOREIGN KEY("username")
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


CREATE TABLE customersMsgs (
  'cusName' varchar(50),
  'email' varchar(200),
  'msgsNum' varchar(2000)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
