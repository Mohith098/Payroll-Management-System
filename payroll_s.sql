SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `deductions` (
  `deduction_id` int(5) NOT NULL PRIMARY KEY,
  `healthinsurance` int(20) NOT NULL,
  `garnishments` int(20) NOT NULL,
  `nodeductions` int(20) NOT NULL,
  `fica` int(20) NOT NULL,
  `loans` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `deductions` (`deduction_id`, `healthinsurance`, `garnishments`, `nodeductions`, `fica`, `loans`) VALUES
(1, 2100, 1100, 0, 1499, 5000);

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL PRIMARY KEY,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `emp_type` varchar(20) NOT NULL,
  `division` varchar(30) NOT NULL,
  `deduction` int(10) NOT NULL,
  `overtime` int(10) NOT NULL,
  `bonus` int(10) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employee` (`emp_id`, `fname`, `lname`, `gender`, `emp_type`, `division`, `deduction`, `overtime`, `bonus`, `contact`, `address`, `email`) VALUES
(6, 'Uday', 'Kiran M', 'Male', 'Part-Time', 'Marketing', 750, 20, 1100, '1245875450', 'Bengaluru', 'udm@gmail.com'),
(8, 'Mohith', 'Gowda V', 'Male', 'Shiftworker', 'Human Resource', 1100, 26, 2999, '3454445470', 'Tumkur', 'mohith@gmail.com'),
(9, 'Ashika', 'Rangnath', 'Female', 'Casual', 'Maintenance', 2100, 12, 500, '5214570002', 'Shivamoga', 'ashu@gmail.com'),
(10, 'Abhishek', 'B R', 'Male', 'Full-Time', 'Finance', 1499, 11, 1100, '1245788880', 'Tumkur', 'abr@gmail.com'),
(11, 'Monkey D', 'Rajesh', 'Male', 'Full-Time', 'Finance', 650, 15, 1500, '1247778700', 'Mangaluru', 'luffy@gmail.com'),
(12, 'Smriti', 'Mandana', 'Female', 'Part-Time', 'Maintenance', 5000, 6, 1500, '2145557850', 'Chitradurga', 'queen@gmail.com'),
(13, 'Sai', 'Pallavi', 'Female', 'Casual', 'Finance', 1499, 16, 1350, '2450001695', 'Chennai', 'pallu@gmail.com');

CREATE TABLE `overtime` (
  `ot_id` int(10) NOT NULL PRIMARY KEY,
  `rate` int(10) NOT NULL,
  `none` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `overtime` (`ot_id`, `rate`, `none`) VALUES
(1, 285, 0);

CREATE TABLE `salary` (
  `salary_id` int(10) NOT NULL PRIMARY KEY,
  `salary_rate` int(10) NOT NULL,
  `none` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `salary` (`salary_id`, `salary_rate`, `none`) VALUES
(1, 36500, 0);

CREATE TABLE `user` (
  `id` int(5) NOT NULL PRIMARY KEY,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`) VALUES
(1, 'ethan', 'password', 'Ethan George', 'ethangg@gmail.com'),
(2, 'admin', 'admin', 'Administrator', 'adminp@gmail.com');


ALTER TABLE `deductions`
  MODIFY `deduction_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `overtime`
  MODIFY `ot_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `salary`
  MODIFY `salary_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

