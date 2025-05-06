# Simple Laravel Note App

A basic web application built with the Laravel framework for creating, viewing, editing, and deleting notes. This project serves as a simple example of fundamental CRUD (Create, Read, Update, Delete) operations in Laravel.

## Features

* Create new notes with a title and content.
* View a list of all notes.
* View the full content of a single note.
* Edit existing notes.
* Delete notes with a confirmation modal.
* Basic styling using Tailwind CSS.

## Technologies Used

* Laravel Framework
* PHP
* Composer (for dependency management)
* Blade Templating Engine
* Eloquent ORM
* Tailwind CSS (via CDN for simplicity)
* Basic JavaScript (for the delete modal)

## Setup

Follow these steps to get the project running on your local machine:

1.  **Clone the repository:**

    ```bash
    git clone [https://github.com/TheVictorDevX/LaravelNoteApp.git](https://github.com/TheVictorDevX/LaravelNoteApp.git)
    ```

2.  **Navigate into the project directory:**

    ```bash
    cd LaravelNoteApp
    ```

3.  **Install Composer dependencies:**

    ```bash
    composer install
    ```

4.  **Copy the example environment file:**

    ```bash
    cp .env.example .env
    ```
    (On Windows, use `copy .env.example .env`)

5.  **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

6.  **Configure your database:**
    Open the `.env` file and update the `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` variables with your database credentials.

7.  **Run database migrations:**

    ```bash
    php artisan migrate
    ```
    This will create the `notes` table in your database.

8.  **Start the Laravel development server:**

    ```bash
    php artisan serve
    ```

9.  **Access the application:**
    Open your web browser and go to `http://127.0.0.1:8000/notes`.

## Contributing

Feel free to fork the repository and submit pull requests if you have suggestions for improvements or new features.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
