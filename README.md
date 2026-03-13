# ToonHub

## 1. Description
ToonHub is a modern web application designed for reading and managing comics. It features a dual-interface system that provides a personalized experience for readers (Users) and a robust content management system for curators (Admins). The application is built with performance and user experience in mind, utilizing a dark-themed UI optimized for reading.

## 2. Key Features

### User Features
- **Authentication:** Secure login and registration system.
- **Personal Dashboard:** A hub showing "Continue Reading" status and a curated "My Favorites" list.
- **Comic Discovery:** Browse the latest comics and filter by categories.
- **Favorites System:** One-click functionality to save comics to a personal library.
- **Responsive Design:** Optimized for both desktop and mobile viewing.

### Admin Features
- **Admin Control Center:** A dashboard displaying system statistics (Total Comics, Users, Categories).
- **Comic Management:** Full CRUD (Create, Read, Update, Delete) capabilities for comic entries.
- **User Monitoring:** Track new member registrations.
- **Quick Actions:** Shortcuts for adding new content or managing categories.

## 3. Tech Stack

- **Backend Framework:** Laravel (PHP)
- **Frontend:** 
  - Blade Templates
  - Tailwind CSS (Styling)
  - Alpine.js (Interactivity & State Management)
- **Database:** MySQL / SQLite
- **Authentication:** Laravel Breeze

## 4. Data Structure (Entity Relationship)

- **User:** Represents the registered users (Admin/User).
  - *One-to-Many* relationship with **Favorites**.
- **Comic:** Represents the comic books/series.
  - *Many-to-Many* relationship with **Categories**.
  - *Many-to-Many* relationship with **Users** (via Favorites).
- **Category:** Represents genres or tags (e.g., Action, Romance).
- **Favorite:** A pivot table linking Users and Comics.

## 5. Installation Instructions

To run this project locally, follow these steps:

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd toonhub-app
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup:**
   Configure your database credentials in the `.env` file, then run:
   ```bash
   php artisan migrate
   ```

5. **Link Storage:**
   ```bash
   php artisan storage:link
   ```

6. **Run the application:**
   ```bash
   npm run build
   php artisan serve
   ```
