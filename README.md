# 🎓 Faculty Management System (FMS)

## 📄 Abstract

The **Faculty Management System (FMS)** is a web-based system developed for the Department of Computer Science and Engineering, Patuakhali Science and Technology University. It helps in managing faculty, student, staff, course, department, notice, and result-related information.

### 🔑 Key Features:
- Digital record management of faculty, students, and staff
- Centralized course and department data
- Notice and result access
- Role-based access system with login authentication
- Faculty profiles and contact info

---

## 📚 Introduction

### 📌 Project Necessity
Educational institutions need efficient digital tools to manage academic data. FMS solves that by offering an all-in-one web platform.

### 🛠️ Problems Solved:
- Eliminates manual paper records
- Saves time and reduces human error
- Improves data security through login
- Facilitates department-wide coordination

---

## 🎯 Objectives

- To develop a user-friendly faculty record system  
- To automate teacher subject and schedule assignments  
- To enhance the accuracy and accessibility of academic data  
- To enable real-time data updates  
- To support future expansion (e.g., student-faculty modules)

---

## 💻 System Requirements

### 🖥️ Hardware
- Processor: Intel Core i3 or higher  
- RAM: Minimum 4 GB  
- Storage: 10 GB free space  
- Resolution: 1024×768 or higher  

### 🧰 Software
- OS: Windows 10  
- Web Server: XAMPP (Apache, MySQL, PHP)  
- Backend: PHP 7.4+  
- Database: MySQL  
- Browser: Chrome  

---

## ⚙️ Technology Stack

### 🌐 Frontend
- HTML5, CSS3  
- Custom Stylesheets: `home.css`, `about.css`, `contact.css`, `form.css`

### 🧠 Backend
- PHP for server-side logic  
- MySQL for database  
- Key Files: `login.php`, `add_teacher.php`, `add_student.php`, `add_course.php`  

### 🌍 Server
- Apache via XAMPP  
- phpMyAdmin for database management

---

## 🧩 System Design

- ER Diagram  
- Use Case Diagram  
- Database Schema  
- Flowchart or System Architecture  

(*Diagrams should be inserted as images if available*)

---

## 🗄️ Database Management

### Sample Connection Code:

```php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "w3youtube";
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
