# Laravel 12 API with Flowbite & Tailwind CSS

A modern RESTful API built with Laravel 12, featuring Flowbite components, Tailwind CSS for styling, and Laravel Sanctum for API authentication. This project includes Docker support through Laravel Sail for easy development and deployment.

## 🚀 Tech Stack

- **Laravel 12** - PHP web application framework
- **Laravel Sanctum** - API token authentication
- **Tailwind CSS 3.x** - Utility-first CSS framework
- **Flowbite** - Tailwind CSS component library
- **MySQL 8.0** - Relational database
- **Docker & Laravel Sail** - Containerized development environment
- **PHP 8.4** - Server-side scripting language

## 📋 Prerequisites

- Docker Desktop installed and running
- Git
- Minimum 4GB RAM available for Docker

## 🛠️ Installation

### Initial Setup

1. Clone the repository:
```bash
git clone https://github.com/jorgehernandezch/laravel-12-flowbite-api
cd laravel-12-flowbite-api
```

2. Copy environment file:
```bash
cp .env.example .env
```

3. Install Composer dependencies (with Docker):
```bash
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

4. Start Laravel Sail:
```bash
./vendor/bin/sail up -d
```

5. Generate application key:
```bash
./vendor/bin/sail artisan key:generate
```

6. Run database migrations:
```bash
./vendor/bin/sail artisan migrate
```

7. Install NPM dependencies and build assets:
```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

### Quick Start with Sail Alias

Add this alias to your `~/.bashrc` or `~/.zshrc`:
```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

Then you can use:
```bash
sail up -d
sail artisan migrate
sail npm run dev
```

## 🐳 Docker Configuration (Laravel Sail)

Laravel Sail provides a Docker-based development environment with the following services:

- **PHP 8.3** with FPM
- **MySQL 8.0**
- **Redis**
- **Mailpit** (for email testing)
- **Minio** (for S3-compatible storage)

### Sail Commands

```bash
# Start containers
sail up -d

# Stop containers
sail down

# View logs
sail logs

# Access container shell
sail shell

# Run artisan commands
sail artisan <command>

# Run composer commands
sail composer <command>

# Run npm commands
sail npm <command>

# Run tests
sail test
```

## 🔐 API Authentication (Laravel Sanctum) Endpoints

Below is a list of the available endpoints.  
You can test them using tools such as **Postman** or **cURL**.

| **HTTP Method** | **Endpoint** | **Description** |
| :-------------- | :----------- | :-------------- |
| `POST` | `/login` | Authenticates a user and returns an access token. |
| `POST` | `/register/user` | Registers a new user in the system. |
| `POST` | `/forgot-password-token` | Sends a password reset link to the user's email. |
| `POST` | `/reset-password` | Resets the user's password using the provided token. |
| `GET` | `/user` | Retrieves information about the authenticated user. *(Auth required)* |
| `PUT` | `/user/basic-info` | Updates the user's basic information (name, email, etc.). *(Auth required)* |
| `PUT` | `/user/password` | Updates the user's password. *(Auth required)* |
| `PUT` | `/user/personal-data` | Updates the user's personal data (CPF, phone, etc.). *(Auth required)* |
| `PUT` | `/user/social-profile` | Updates the user's social profile links. *(Auth required)* |
| `POST` | `/user/deactivate` | Deactivates the authenticated user's account. *(Auth required)* |
| `DELETE` | `/user/delete` | Permanently deletes the authenticated user's account. *(Auth required)* |
| `POST` | `/logout` | Logs out the authenticated user and invalidates the token. *(Auth required)* |


## 🎨 Frontend Setup (Flowbite + Tailwind)

### Tailwind CSS Configuration

The `tailwind.config.js` file is configured to scan Laravel Blade files:

```javascript
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import flowbitePlugin from 'flowbite/plugin';

export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './node_modules/flowbite/**/*.js'
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [forms, flowbitePlugin],
}
```

### Flowbite Components

Flowbite provides pre-built Tailwind CSS components. Include in your layout:

```html
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
```

Or use the npm package (recommended):
```bash
sail npm install flowbite
```

## 📜 Available Scripts

### Artisan Commands
```bash
sail artisan migrate           # Run migrations
sail artisan db:seed           # Seed database
sail artisan migrate:fresh --seed  # Fresh database with seeds
sail artisan make:model <name> -m  # Create model with migration
sail artisan make:controller <name> # Create controller
sail artisan route:list        # List all routes
sail artisan queue:work        # Start queue worker
sail artisan cache:clear       # Clear application cache
```

### NPM Scripts
```bash
sail npm run dev              # Development build with HMR
sail npm run build            # Production build
sail npm run watch            # Watch for changes
```

## 📁 Project Structure

```
.
├── app/
│   ├── Http/
│   │   ├── Controllers/      # API Controllers
│   │   ├── Middleware/       # Custom middleware
│   │   └── Requests/         # Form requests
│   ├── Models/               # Eloquent models
│   └── Services/             # Business logic
├── bootstrap/
│   └── app.php               # Application bootstrap
├── config/
│   ├── sanctum.php           # Sanctum configuration
│   └── cors.php              # CORS configuration
├── database/
│   ├── migrations/           # Database migrations
│   ├── seeders/              # Database seeders
│   └── factories/            # Model factories
├── public/                   # Public assets
├── resources/
│   ├── css/                  # Stylesheets
│   ├── js/                   # JavaScript files
│   └── views/                # Blade templates
├── routes/
│   ├── api.php               # API routes
│   ├── web.php               # Web routes
│   └── console.php           # Console commands
├── storage/                  # Storage files
├── tests/                    # PHPUnit tests
├── docker-compose.yml        # Sail Docker configuration
├── tailwind.config.js        # Tailwind configuration
├── vite.config.js            # Vite configuration
├── composer.json             # PHP dependencies
└── package.json              # Node dependencies
```

## 🔧 Environment Configuration

Key environment variables in `.env`:

```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

SANCTUM_STATEFUL_DOMAINS=localhost,127.0.0.1
SESSION_DRIVER=redis
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
```

## 🔒 Security Best Practices

- Keep Laravel and dependencies updated
- Use environment variables for sensitive data
- Enable CSRF protection for web routes
- Implement rate limiting on API endpoints
- Use HTTPS in production
- Regularly rotate API tokens
- Sanitize user input
- Use Laravel's built-in security features

## 📚 API Documentation

Document your API endpoints using tools like:
- **Postman Collections**


## 🐛 Debugging

### Enable Debug Mode
```env
APP_DEBUG=true
```

### View Logs
```bash
sail logs -f
tail -f storage/logs/laravel.log
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is proprietary and confidential.

## 📧 Support

For questions or issues, please contact the development team or open an issue in the repository.

---
[Jorge Edo. Hernández](https://github.com/jorgehernandezch)  
_Engineer and Web Developer_

---
Built with ❤️ using Laravel, Sanctum, Tailwind CSS, and Flowbite