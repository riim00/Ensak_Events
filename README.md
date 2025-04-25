# 🎉 ENSAK Events – Event Management Web Application

**ENSAK Events** is a web-based platform designed to simplify the creation, management, and discovery of events.  
Whether you're a student, organizer, or attendee, this tool helps you navigate campus events with ease and efficiency.

---

## 🚀 Overview

Built as a full-stack PHP application, ENSAK Events allows users to:
- Create and manage their own events
- Browse categorized event listings
- View event details
- Communicate with organizers via contact forms

---

## 🛠 Technologies Used

| Layer         | Technologies                          |
|---------------|----------------------------------------|
| **Backend**   | PHP                                     |
| **Frontend**  | HTML, CSS, JavaScript, AOS.js (animations) |
| **Database**  | MySQL                                   |
| **Versioning**| Git                                     |

---

## 🎯 Features

- ✅ **User Authentication** (Login / Logout)
- 🗓️ **Event Creation & Management**
- 📂 **Event Categorization**
- 📄 **Detailed Event Pages**
- ✉️ **Contact System** for inquiries or event questions

---

## 📦 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/berrahokhalil/ENSAK-Events
cd Ensak-events-app

   ```
2. **Set Up Database**
   - Create a MySQL database named `testproject`.
   - Import `database.sql` using:
     ```sh
     mysql -u root -p testproject < database.sql
     ```
3. **Configure Database Connection**
   - Edit `connection/DB.php` with your database credentials:
     ```php
     define('HOST','localhost');
     define('USERNAME','root');
     define('PWD','');
     define('DB','testproject');
     ```
4. **Run the Application**
   - Start Apache and MySQL (via XAMPP, MAMP, etc.)
   - Open your browser and go to:
http://localhost/Ensak-events-app/
---
## 🔧 Possible Enhancements
- 🔒 Add **password hashing** and **prepared statements** for security
- 🎨  Revamp UI using **Bootstrap** or **Tailwind CSS**
- 🔍 Implement **search and filtering** by event type, location, or date
- 📩 Add **email notifications** for updates and confirmations

---
👥 Team
This project was developed collaboratively by:
- Rim Taouab
- Berraho Khalil
- Aymane Souiles
- Akestaf Ahmed

All team members participated equally in the design, development, and deployment of the platform.


