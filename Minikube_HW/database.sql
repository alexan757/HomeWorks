CREATE DATABASE IF NOT EXISTS hotel_db;
CREATE TABLE `hotel` (hotel_id int(11) NOT NULL, hotel_name varchar(255) NOT NULL, hotel_surname varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `hotel` (hotel_id, hotel_name, hotel_surname) VALUES
	(1, "Michael", "Jordan"),
	(2, "Jennifer", "Lopez"),
	(3, "Nicole", "Kidman");
	ALTER TABLE `hotel`
		ADD PRIMARY KEY (hotel_id);
	ALTER TABLE `hotel`
		MODIFY hotel_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
	COMMIT;
