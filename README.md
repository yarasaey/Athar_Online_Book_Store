 📚 Athar - Online Book Store  


 📌 Description  
Athar is an E-commerce web application designed for selling books online.  
It provides a smooth and user-friendly experience for browsing and purchasing books, along with a powerful admin dashboard for managing products and orders.


 💡 Business Idea  
The idea behind this project is to build an online bookstore that allows users to:  
- Easily browse books  
- Search by category or author  
- Purchase books online  

At the same time, it gives administrators full control over managing the store.


 🎯 Project Goals  
- Build a complete E-commerce system  
- Apply Authentication & Authorization concepts  
- Manage products and orders dynamically  
- Deliver a simple and efficient user experience  

 🚀 Features  

 👤 User Features  
- 📝 Register / Login system  
- 🔐 Secure Authentication  
- 🛡️ Authorization (role-based access)  
- 🌍 Localization (multi-language support)  
- 📚 Browse books  
- 🔎 View product details  
- 🛒 Place orders  


 🛠️ Admin Dashboard  
- ➕ Add / Edit / Delete:
  - Products  
  - Categories  
  - Authors  
- 📦 Manage orders  
- 📊 Full control over store data  

 🧱 System Modules  
- Authentication Module  
- Product Management Module  
- Order Management System  
- Category & Author Management  
- Localization System  

 🧑‍💻 Tech Stack  

| Layer        | Technology |
|-------------|-----------|
| Backend      | Laravel (PHP) |
| Frontend     | HTML, CSS, JavaScript |
| Database     | MySQL |
| Architecture | MVC Pattern |


Screenshot
<img width="1920" height="800" alt="athar6" src="https://github.com/user-attachments/assets/da025454-e908-477c-9769-702f2ed0f13e" />



 ⚙️ Installation  

 1. Clone the Repository  
bash
git clone https://github.com/yarasaey/Athar_Online_Book_Store.git
cd Athar_Online_Book_Store

2. Install Dependencies
composer install
npm install
3. Setup Environment
cp .env.example .env
php artisan key:generate
4. Configure Database

Open .env file and update:

DB_DATABASE=your_db_name
DB_USERNAME=root
DB_PASSWORD=
5. Run Migrations
php artisan migrate
6. Run the Project
php artisan serve
📸 Screenshots

(Add your project screenshots here)
Home Page
Books Listing
Product Details
Orders Page
Admin Dashboard
🧪 Future Improvements
💳 Payment Integration (Stripe / PayPal)
🤖 Recommendation System
⭐ Reviews & Ratings
📱 Improve mobile responsiveness
📊 Dashboard analytics

🛡️ Security
Authentication using Laravel
Authorization (role-based access)
Protection against:
CSRF attacks
XSS
SQL Injection
🤝 Contributing
If you would like to contribute:

Fork the repository
Create a new branch
Submit a pull request
👩‍💼 Author
Yara Saay El-deen
Backend Developer (Laravel)
