-- QUESTION 2

-- ********** CREATE TABLE `employee` **********

CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `salary` int(20) DEFAULT NULL,
  `dept_id` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `extra` varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
);

-- **********  INSERT INTO `employee` **********

INSERT INTO `employee` (`id`, `name`, `salary`, `dept_id`, `created_at`, `updated_at`, `extra`) VALUES
(1, 'ally', 1000, 1, '2022-06-03 13:19:50', '2022-06-03 13:19:50', NULL),
(2, 'allySE', 1000, 1, '2022-06-03 13:19:50', '2022-06-03 13:19:50', NULL),
(3, 'hellson', 1000, 2, '2022-06-03 13:19:50', '2022-06-03 13:19:50', NULL),
(4, 'john', 1000, 3, '2022-06-03 13:19:50', '2022-06-03 13:19:50', NULL),
(5, 'messhack', 1000, 3, '2022-06-03 13:19:50', '2022-06-03 13:19:50', NULL);


-- ********** CREATE TABLE `department` **********
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(400) DEFAULT NULL,
  `location` varchar(400) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (id)
);


INSERT INTO `department` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'executive', 'jalandar', '2022-06-03 13:22:13', '2022-06-03 13:22:13'),
(2, 'technical', 'jalandar', '2022-06-03 13:22:13', '2022-06-03 13:22:47'),
(3, 'customerCare', 'jalandar', '2022-06-03 13:22:13', '2022-06-03 13:23:54'),
(4, 'HEALTH', 'jalandar', '2022-06-03 13:22:13', '2022-06-03 13:23:54');





--  *********** Join two tables employee and department ***********`
SELECT department.name, COUNT(employee.dept_id)  
FROM department 
  LEFT OUTER JOIN employee ON employee.dept_id = department.id 
GROUP BY department.name ORDER BY COUNT(employee.dept_id) DESC;