# 🩸 Blood Bank Management System

A comprehensive web-based application for managing blood bank operations including donors, patients, doctors, and blood inventory.

---

## 🚀 Live Preview

*(Add your GitHub Pages link or deployment URL here)*  
Example: https://github.com/AnmolS05/Blood-Bank-System

---

## 📌 Key Features

- **User Management**: Secure Login and Signup functionality.
- **Modules**:
  - **Doctor Module**: Manage doctor details.
  - **Donor Module**: Register and manage blood donors.
  - **Patient Module**: Manage patient records.
  - **Blood Bank Module**: Track blood inventory.
- **Search**: Search for blood availability.
- **Design**:
  - Responsive navigation bar.
  - Clean and functional dashboard layout.
  - Five module cards with hover effects.
  - Blood donation themed background.
  - Fully responsive on all screen sizes.

---

## ⚙️ How to Run Locally

### Prerequisites
- Install **XAMPP** (or WAMP/MAMP) to run PHP and MySQL.

### Installation Steps
1.  **Clone/Download** this repository.
2.  **Move Files**: Copy the project folder to your XAMPP `htdocs` directory.
    - Example Path: `C:\xampp\htdocs\blood-bank`
3.  **Start Server**: Open **XAMPP Control Panel** and start **Apache** and **MySQL**.

### Database Setup
1.  Open your browser and search [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2.  Click **New** (Sidebar) -> Database Name: `bloodb` -> Click **Create**.
3.  Click the **SQL** tab and execute the following queries to create the necessary tables:

```sql
USE bloodb;

-- Users Table (For Login/Signup)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Doctor Table
CREATE TABLE doctor(
    doctor_id INT PRIMARY KEY,
    doctor_name VARCHAR(30),
    doctor_address VARCHAR(50),
    d_ph VARCHAR(10)
);

-- Donor Table
CREATE TABLE donor(
    donor_id INT PRIMARY KEY,
    donor_name VARCHAR(20),
    gender VARCHAR(20),
    donor_address VARCHAR(30),
    dob DATE,
    blweight INT,
    phone_no VARCHAR(10),
    doctor_id INT,
    FOREIGN KEY(doctor_id) REFERENCES doctor(doctor_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Bloodbank Table
CREATE TABLE bloodbank(
    b_bank_id INT PRIMARY KEY,
    b_bank_name VARCHAR(20),
    b_bank_address VARCHAR(30),
    donor_id INT,
    bl_id INT,
    bl_type VARCHAR(5),
    FOREIGN KEY(donor_id) REFERENCES donor(donor_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Patient Table
CREATE TABLE patient(
    pat_id INT PRIMARY KEY,
    pat_name VARCHAR(20),
    pat_address VARCHAR(30),
    pat_phoneno VARCHAR(10),
    hosp_add VARCHAR(30),
    b_bank_id INT,
    FOREIGN KEY (b_bank_id) REFERENCES bloodbank(b_bank_id) ON DELETE CASCADE ON UPDATE CASCADE
);
```

### Running the App
1.  Open your browser.
2.  Visit: `http://localhost/blood-bank/index.html` (Change `blood-bank` to your folder name if different).

---

## 🛠 Technologies Used

- **Frontend**: HTML5, CSS3
- **Backend**: PHP (Procedural)
- **Database**: MySQL
- **Server**: Apache (via XAMPP stack)
- **IDE**: VS Code

---

## 👤 Author

- **Name:** Anmol S Poojary  
- **Email:** anmolspoojary@gmail.com  
- **GitHub:** [AnmolS05](https://github.com/AnmolS05)  
- **LinkedIn:** [anmol-s-poojary](https://www.linkedin.com/in/anmol-s-poojary/)

---

## 📸 Screenshot

<img width="1915" height="918" alt="image" src="https://github.com/user-attachments/assets/26decf28-ccdf-43b5-81c6-3bd450b569b7" />


---

## ✅ Task Outcome

This project helped me understand:
- How to structure navigation for multi-module systems
- Building responsive layouts using only HTML and CSS
- Modular UI design for large-scale systems
- Visual communication using background imagery and card-based layout
- Integrating PHP with MySQL for dynamic data management

