CREATE TABLE department (
  faculty_code VARCHAR(100) NOT NULL UNIQUE,  
  department_id INT PRIMARY KEY, 
  dept_name VARCHAR(100) NOT NULL UNIQUE,
  establishment_date DATE NOT NULL
);

CREATE TABLE teacher (
  teacher_id INT PRIMARY KEY,
  teacher_name VARCHAR(50) NOT NULL,
  teacher_designation VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  join_date DATE NOT NULL,
  department_id INT NULL,
  salary FLOAT NOT NULL
);

CREATE TABLE staff (
  staff_id INT PRIMARY KEY,
  staff_name VARCHAR(50) NOT NULL,
  staff_designation VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  join_date DATE NOT NULL,
  department_id INT NULL,
  salary FLOAT NOT NULL
);

CREATE TABLE course (
  course_code VARCHAR(50) NOT NULL UNIQUE,
  course_title VARCHAR(100) NOT NULL,
  credits INT NOT NULL,
  department_id INT NULL
);

CREATE TABLE student (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    student_name VARCHAR(100) NOT NULL,
    registration INT UNIQUE, 
    email VARCHAR(100) UNIQUE,
    semester  VARCHAR(100),
    sessions  VARCHAR(100) NOT NULL
);

CREATE TABLE result (
    result_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    student_name VARCHAR(100) NOT NULL,
    semester VARCHAR(100) NOT NULL,
    sessions VARCHAR(100) NOT NULL,
    gpa FLOAT(3,2),
    cgpa FLOAT(3,2)
);

CREATE TABLE dean_merit (
    merit_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    student_name VARCHAR(100) NOT NULL,
    session VARCHAR(100) NOT NULL
);

CREATE TABLE notice (
    faculty_code VARCHAR(100),
    notice_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    publish_date DATE NOT NULL
);


CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
);

INSERT INTO `login` (`username`, `password`) VALUES
('mdsenarul72@gmail.com', '1234');
