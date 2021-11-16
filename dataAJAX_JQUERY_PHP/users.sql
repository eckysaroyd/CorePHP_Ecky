CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `name`, `email`, `timestamp`) VALUES
(1, 'jiten', 'Jiten singh	', 'jiten93@gmail.com', '2018-11-16 05:02:35'),
(2, 'kuldeep', 'Kuldeep', 'kuldeep@gmail.com', '2018-11-16 05:02:52'),
(3, 'mayank', 'Mayank', 'mayank@yahoo.com', '2018-11-16 05:03:10'),
(4, 'yssyogesh', 'Yogesh singh', 'yogesh@makitweb.com', '2018-11-16 05:03:46'),
(5, 'vijay', 'Vijay', 'vijayec@gmai.com', '2018-11-16 05:45:23'),
(6, 'nitin', 'Nitin', 'nitin@gmail.com', '2018-11-16 05:04:34'),
(7, 'rahul', 'Rahul singh', 'rahul@gmail.com', '2018-11-16 05:45:23'),
(8, 'shreya', 'Shreya', 'shreya@yahoo.com', '2018-11-16 05:45:23'),
(9, 'mohit', 'Mohit', 'mohit@gmail.com', '2018-11-16 05:45:23'),
(10, 'rohit', 'Rohit singh', 'rohit@gmail.com', '2018-11-16 05:45:23'),
(11, 'sonarika', 'Sonarika', 'sonarika@gmail.com', '2018-11-16 05:06:33'),
(12, 'palash', 'Palash', 'palash@gmail.com', '2018-11-16 05:07:11'),
(13, 'mukesh', 'Mukesh', 'mukesh@yahoo.com', '2018-11-16 05:07:42'),
(14, 'vishal', 'Vishal Sahu	', 'vishal@gmail.com', '2018-11-16 05:08:23');
