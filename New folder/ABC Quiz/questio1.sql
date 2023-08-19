
-- QUESTION 1
-- *********** CREATE TABLE `employees` ***********
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `salary` int(20) DEFAULT NULL,
  PRIMARY KEY (id)
) 
-- ***********  INSERT INTO `employees  ***********`
INSERT INTO `employees` (`id`, `name`, `age`, `address`, `salary`) VALUES
(1, 'Hellena', 27, 'Paris', 74635),
(2, 'Bob', 30, 'Sydney', 72167),
(3, 'Julia', 29, 'Paris', 75299),
(4, 'Samantha', 47, 'Sydney', 46681),
(5, 'David', 27, 'Texas', 11843);


-- *********** CREATE TABLE `employee_uin  ***********`
CREATE TABLE `employee_uin` (
  `id` int(11) NOT NULL,
  `uin` int(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `extra` int(4) NOT NULL,
   FOREIGN KEY (id) REFERENCES employees(id)
);
--  *********** INSERT INTO `employee_uin  ***********`
INSERT INTO `employee_uin` (`id`, `uin`, `created_at`, `updated_at`, `extra`) VALUES
(1, 575200440, '2022-06-03 14:17:30', '2022-06-03 14:17:30', 0),
(2, 49638001, '2022-06-03 14:17:30', '2022-06-03 14:17:30', 0),
(3, 63550194, '2022-06-03 14:17:30', '2022-06-03 14:17:30', 0);


--  *********** Join two tables employee_uin and employees ***********`
SELECT employees.Name,
       employee_uin.uin
  FROM employees
  LEFT OUTER JOIN employee_uin ON employees.id = employee_uin.id;


