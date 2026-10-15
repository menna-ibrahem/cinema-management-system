#  Cinema Management System

A Laravel-based cinema management application that allows users to explore movies and provides administrators with tools to manage movie data. The project also includes a RESTful API and an AI-powered chatbot to help users discover movies.

##  Features

###  Movie Management
- Create, view, update, and delete movies (CRUD).
- Store movie details such as title, description, release year, rating, and image.

###  Authentication & Authorization
- User authentication.
- Role-based authorization and access control.
- Protected administrative features.

###  Admin Dashboard
- Manage movie records through the dashboard.
- Organize and maintain movie information.

###  RESTful API
- API endpoints for movie-related operations.
- Test API requests using Postman.

###  AI Movie Chatbot
- AI-powered movie discussions and recommendations using the Google Gemini API.
- Supports follow-up questions within the current conversation.
- API key configured through an environment variable.

##  Tech Stack

- **Backend:** PHP, Laravel
- **Database:** MySQL
- **API Testing:** Postman
- **AI Integration:** Google Gemini API
- **Version Control:** Git and GitHub

##  Installation & Setup

### Prerequisites
- PHP and Composer
- MySQL
- Node.js and npm, if required by the project's frontend assets

### 1. Clone the repository

```bash
git clone https://github.com/menna-ibrahem/cinema-management-system.git
cd cinema-management-system
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure environment variables

```bash
cp .env.example .env
php artisan key:generate
```

On Windows, you can copy `.env.example` to `.env` manually if needed.

### 4. Configure the database

Create a MySQL database and update the database settings in `.env`:

```env
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 5. Configure the AI chatbot

Add your Google Gemini API key to `.env`:

```env
GEMINI_API_KEY=your_gemini_api_key
```

Get an API key from [Google AI Studio](https://aistudio.google.com/apikey).

**Security:** Never commit your `.env` file or expose API keys publicly.


### 6. Configure the Movie Data API

This project uses the [TMDB API](https://www.themoviedb.org/) to retrieve movie information.

1. Create a TMDB account and obtain an API key from your account settings.
2. Add the key to your `.env` file:

```env
TMDB_API_KEY=your_tmdb_api_key
```

Keep your API key private and never commit your `.env` file to GitHub.

### 7. Run migrations

```bash
php artisan migrate
```

### 8. Start the development server

```bash
php artisan serve
```

Open the local URL displayed in your terminal.

##  API Testing

Use Postman to send requests to the application's API endpoints. Authentication requirements and available routes depend on the endpoint configuration.

##  Security Notes

- Keep API keys and database credentials in environment variables.
- Do not commit `.env` or other files containing secrets.
- Configure authentication and authorization appropriately before deploying the application.

##  Author

**Menna Ibrahim**

- GitHub: [menna-ibrahem](https://github.com/menna-ibrahem)

---

*Built as a practical Laravel backend project to apply CRUD operations, authentication, authorization, database relationships, REST API development, and AI integration.*

