# Todo App with PHP

The Todo App with PHP is a simple web application that allows users to manage their tasks and stay organized. It is built using PHP, HTML, CSS, and MySQL for database storage.

![Todo App Screenshot](todo_app_screenshot.png)

## Features

- **Task Management**: Users can easily create, read, update, and delete tasks from their to-do list.

## Installation

Follow these steps to set up the Todo App on your local machine:

1. Ensure you have PHP and a web server (like Apache or Nginx) installed on your system.
2. Clone this repository to your local machine.
   ```
   git clone https://github.com/lexiscode/todo-app.git
   ```
3. Move the repository directory to your web server's document root directory (e.g., htdocs for XAMPP or www for WAMP).
4. Create a new MySQL database for the application.
5. Import the database schema located in `db/todo_app.sql` into your MySQL database.
6. Update the database connection credentials in `src/models/database/DbConnect.php` with your MySQL database details.

## Usage

1. Open your web browser and navigate to the Todo App URL (e.g., http://localhost/todo-app-php/).
2. If you are a new user, click on the "Sign Up" link to create a new account. Otherwise, log in using your existing credentials.
3. After logging in, you'll be directed to the main dashboard where you can add, view, update, and delete tasks.
4. To add a new task, simply enter the task details and click on the "Add Task" button.
5. You can mark a task as "completed" or "incomplete" by clicking on the checkbox next to each task.
6. Use the sorting and filtering options to organize your tasks according to your preference.
7. To edit or delete a task, click on the respective icons next to the task in the list.

## Screenshots

![Dashboard](screenshots/dashboard.png)

## Technologies Used

- **PHP**: The server-side scripting language used for handling data and processing tasks.
- **HTML**: The markup language used for creating the structure of the web pages.
- **CSS**: The styling language used to enhance the visual appearance of the application.
- **MySQL**: The database management system used to store task data.

## Contributing

Contributions to the Todo App are welcome! If you find any issues or have suggestions for improvements, please feel free to open an issue or submit a pull request.

Thank you for using the Todo App! We hope it helps you stay organized and boost your productivity. If you have any questions or need support, feel free to contact us. Happy task managing!