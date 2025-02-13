# Online Book Store - ECommerce Website in PHP

## Introduction  
Welcome to the **Online Book Store**, a robust PHP-based eCommerce platform designed to help bookstores create an online presence for their customers to explore and purchase a wide variety of books. This project features a powerful **Admin Panel** that enables store management to efficiently handle products, orders, and other system data. Whether you're a bookstore owner or a developer, this system provides a seamless solution for transitioning your bookstore operations online.

---

## About the Project  
The **Online Book Store** is a dynamic web application built using **PHP/MySQLi** for the backend, **MySQL** for the database, and **HTML, CSS, JavaScript (Ajax and jQuery), Bootstrap, and Admin LTE** for the frontend. Designed to be user-friendly and scalable, this system caters to both administrators and customers, ensuring a smooth and efficient experience.

---

## Features Overview  

### **Admin Panel Features**  
The Admin Panel is a secure area where administrators can manage the entire system. Key features include:  
- **Secure Login**: Admin users must authenticate with their credentials to access the panel.  
- **Dashboard**: A centralized view of system activities and metrics.  
- **Category and Sub-Category Management**: Add, edit, or remove categories and subcategories for books.  
- **Book List Management**: Manage the list of books available in the store.  
- **Inventory Management**: Track and update book inventory.  
- **Order Management**: View and update the status of customer orders.  
- **Sales Reports**: Generate and view printable sales reports.  
- **System Information Management**: Customize system details such as the store name and logo.  
- **Account Management**: Update admin account details.  

### **Client/Customer Features**  
The client-side of the system allows customers to explore and purchase books with ease. Key features include:  
- **Secure Login and Registration**: Customers can create accounts and log in securely.  
- **Book Exploration**: Browse books organized by categories and subcategories.  
- **Search Functionality**: Search for specific books using keywords.  
- **Book Details**: View detailed information about each book.  
- **Shopping Cart**: Add books to the cart, manage quantities, and proceed to checkout.  
- **Checkout and Order Placement**: Choose between pickup or delivery and select payment methods (Cash on Delivery or PayPal).  
- **Order History**: View past orders and their statuses.  

---

## Extra Tools I Used  

### **SCSS**  
SCSS (Sassy CSS) was used to enhance the styling process. It allowed for the use of variables, mixins, and nested rules, making the CSS code more modular, maintainable, and easier to manage. This significantly improved the efficiency of styling the website and ensured a consistent design across all pages.  

### **Hack**  
Hack, a programming language for the HipHop Virtual Machine (HHVM), was integrated to add type safety and modern programming features to the PHP codebase. This improved code reliability and performance, making the application more robust and scalable.  

### **PHP**  
PHP served as the backbone of the project, handling server-side logic and database interactions. Its flexibility and ease of integration with MySQL made it ideal for building the eCommerce platform. PHP also enabled dynamic content rendering and seamless communication between the frontend and backend.  

---

## How to Run the Project  

### **Requirements**  
1. **Local Web Server**: Download and install a local web server like [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](https://www.wampserver.com/en/).  
2. **Source Code**: Download the provided source code zip file from this repository.  

### **Installation/Setup**  
1. **Start Local Server**:  
   - Open your XAMPP/WAMP Control Panel.  
   - Start the **Apache** and **MySQL** services.  

2. **Extract and Move Files**:  
   - Extract the downloaded source code zip file.  
   - Copy the extracted folder and paste it into:  
     - **XAMPP**: `htdocs` directory.  
     - **WAMP**: `www` directory.  

3. **Set Up Database**:  
   - Open PHPMyAdmin in your browser (e.g., `http://localhost/phpmyadmin`).  
   - Create a new database named `book_shop_db`.  
   - Import the provided SQL file (`book_shop_db.sql`) located in the `database` folder.  

4. **Access the Application**:  
   - Open your browser and navigate to:  
     - **Client Side**: `http://localhost/book_shop`  
     - **Admin Side**: `http://localhost/book_shop/admin`  

---

## Access Information  

### **Admin Access**  
- **Username**: `admin`  
- **Password**: `admin123`  

### **Sample Customer Access**  
- **Email**: `jsmith@sample.com`  
- **Password**: `jsmith123`  

---

## Customization and Extensions  
The source code is well-documented and modular, making it easy to customize or extend based on your specific needs. Here are some ideas for enhancements:  
- Add more payment gateways (e.g., Stripe, Paytm).  
- Implement user reviews and ratings for books.  
- Integrate a recommendation engine for personalized book suggestions.  
- Add a blog or news section for the bookstore.  

---

## Contributing  
Contributions to this project are welcome! If you'd like to contribute, please follow these steps:  
1. Fork the repository.  
2. Create a new branch for your feature or bug fix.  
3. Commit your changes.  
4. Submit a pull request.  

---

## License  
This project is licensed under the **MIT License**. Feel free to use, modify, and distribute the code as per the license terms. See the [LICENSE](LICENSE) file for more details.  

---

## Support  
If you encounter any issues or have questions, please open an issue in this repository or contact the maintainers. We’re here to help!  

---

Thank you for choosing the **Online Book Store** project. We hope it serves as a valuable tool for your bookstore operations and inspires further innovation. Happy coding! 🚀
