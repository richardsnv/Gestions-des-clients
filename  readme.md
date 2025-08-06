# Gestion des clients
## This is a simple PHP application for managing clients, including user registration and login functionality.
## Features
- User registration with email and password
- User login with email and password
- Password hashing for security
- Session management for logged-in users
## Requirements
- PHP 7.0 or higher
- PDO extension for database access
- A MySQL or PostgreSQL database
## Installation
1. Clone the repository or download the source code.
2. Create a database and import the SQL schema from `schema.sql`.
3. Update the database connection settings in `config.php`.
4. Place the files on your web server.
5. Access the application via your web browser.
## Usage
- Navigate to `register.php` to create a new user account.
- Navigate to `login.php` to log in with your credentials.
- After logging in, you will be redirected to the main page where you can manage clients.
## Security
- Passwords are hashed using `password_hash()` and verified with `password_verify()`.
- Sessions are used to maintain user login state.
## Contributing
- Contributions are welcome! Please submit a pull request or open an issue for discussion.