
# 📚 Library Management System (LMS)

This is a full-featured **Library Management System** developed using **PHP**, **MySQL**, **HTML**, **CSS**, and **JavaScript**. It is designed for efficient management of books, users, borrow and purchase operations, payments, and reporting.

---

## 🚀 Features

### 🧑‍💼 Role-Based Access

- **Admin**  
  - Manage users (add/edit/delete, assign roles)
  - Configure system settings (borrow limits, policies)
  - Generate reports (borrow & purchase records)
  - Fine and payment approval
  - Manage book locations (rack/shelf)

- **Librarian**  
  - Manage borrow requests and returns  
  - Track overdue books and fines  
  - Notify users  
  - Generate borrowing reports  

- **Inventory Manager**  
  - Add, edit, delete books  
  - Update stock and location  
  - View inventory  

- **User/Student**  
  - Search books  
  - Request to borrow or purchase books  
  - View borrowing history  
  - Make fine or purchase payments

---

## 💡 Unique Features

- **Book Purchase Flow** (in addition to borrowing)
- **Simulated Payment Gateway** for testing payments (fines and purchases)
- **Downloadable Reports** in CSV format (with date range filter)
- **Book Location Mapping**: Rack and Shelf identification
- **Search Functionality** on borrow and view pages
- **Responsive UI** using custom CSS

---

## 🛠️ Technologies Used

- **Backend**: PHP, MySQL  
- **Frontend**: HTML, CSS, JavaScript  
- **Database**: MySQL (WAMP Server)  
- **Server**: WAMP (Windows Apache MySQL PHP stack)

---

## 📂 Folder Structure

```
project/
│
├── actions/               # All form handlers and backend PHP scripts
├── css/                   # Stylesheets
├── includes/              # DB config and common functions
├── pages/                 # Main UI pages
│   ├── login.php
│   ├── admin_dashboard.php
│   ├── librarian_dashboard.php
│   └── ...
├── index.php              # Entry point
└── README.md
```

---

## 📊 Sample Reports

- **Borrow Records Report**
  - Book ID, Title, Borrower Name, Borrow Date, Return Date, Fine
- **Purchase Records Report**
  - Book ID, Title, Buyer Name, Price, Purchase Date

---

## 🧪 Dummy Payment Gateway

Used to simulate transactions for purchases and fines — no real money is involved. The gateway accepts mock details and returns success/failure status to mimic real transactions.

---

## 🛠️ Setup Instructions

1. Install **WAMP/XAMPP** server.
2. Clone or download the project files into the `www` folder.
3. Create a database named `library_db` and import the SQL dump provided.
4. Update database credentials in `/includes/db_connect.php`.
5. Run the server and visit `http://localhost/final/`.

---

## ✅ Admin Credentials (Default)

```txt
Email ID: kris1@gmail.com
Password: 1234
```

You can change these in the database after first login.

---

## 📸 Screenshots

> Include screenshots of:
> - Admin dashboard  
> - Borrow & purchase reports  
> - Payment simulation  
> - Book location example  

---

## 📌 Project Status

✅ Completed for academic submission  
❌ Not intended for production use

---

## 📣 Acknowledgements

- PHP.net Documentation  
- W3Schools / MDN for frontend guidance  
- MySQL official documentation  

---

## 📬 Contact

For any queries or improvements, feel free to reach out.

> Created by: Kris Mevada  
