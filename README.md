# Laravel Project Setup

Welcome to the Laravel project! This guide will walk you through the steps needed to set up and run the project on your local machine.

## Prerequisites

Make sure you have the following tools installed on your machine:

- **PHP** (version 8.1 or higher)
- **Composer** (Dependency Manager for PHP)
- **Node.js** and **NPM** (for managing frontend dependencies)
- **Git** (version control)

## Installation

Follow these steps to get the project up and running:

1. **Clone the repository**:

   ```bash
   git clone https://github.com/Kaung-MinHtet/weather.git
   cd weather
   composer install
   cp .env.example .env
   npm install && npm run dev
   ```

---

### Open new terminal

    ```bash
    php artisan key:generate
    php artisan serve
    ```
