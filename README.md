# Chat_xampp

Chat_xampp is a simple chat application built using HTML, PHP, and XAMPP, allowing users to communicate in real-time.

## Installation

To get started with Chat_xampp, follow these steps:

1. **Install XAMPP**: Download and install XAMPP from [here](https://www.apachefriends.org/index.html).

2. **Start Apache and MySQL**: After installing XAMPP, start both Apache and MySQL services.

3. **Create Database in PhpMyAdmin**: Open PhpMyAdmin (usually accessible at http://localhost/phpmyadmin/) and create a new database named "messages".

4. **Create Table**: Inside the "messages" database, execute the following SQL query to create the necessary table:
   ```sql
   CREATE TABLE messages (
       id INT AUTO_INCREMENT PRIMARY KEY,
       content TEXT
   );
