# Traffic Restrictions (Hungary, 2010)

Laravel homework for Web Programming II, John von Neumann University, GAMF. The app presents the road traffic restrictions of Hungary in 2010: what was restricted, for what reason, and to what extent.

- **Live site:** https://trafficapp.42web.io/
- **Repository:** https://github.com/ratul-420/laravel-traffic-app

## Team

| Name | Neptun | GitHub | Built |
|---|---|---|---|
| Ratul Fahim Muntashir | H1566N | ratul-420 | Authentication and roles, Database page, Contact form, Messages page, admin-only CRUD, Introduction/User/Admin pages, hosting |
| Islam Md Aminul | PQFBDZ | aminul23453 | Theme and footer, Mainpage, Graph page, README |

## Stack

- Laravel 13 (React starter kit / Inertia for the built-in login and register pages, Blade for our own pages)
- PHP 8.4 or newer
- MySQL, database `traffic`
- Pico.css v2 (free, MIT licence) for the responsive theme
- Chart.js 4.4.7 (via CDN) for the graph
- Hosted on InfinityFree

## Menus and roles

There are three kinds of visitors: not logged in (visitor), registered user, and admin.

| Menu | Visitor | Registered | Admin | Description |
|---|---|---|---|---|
| Home | yes | yes | yes | Intro page with hero section |
| Introduction | yes | yes | yes | About this application |
| Database | yes | yes | yes | Paginated table of restrictions with their reason and extent |
| Graph | yes | yes | yes | Bar chart of restrictions per reason (Chart.js) |
| Contact | yes | yes | yes | Contact form, validated on the server and saved to the database |
| Login / Register | yes | – | – | Authentication |
| Messages | – | yes | yes | Saved contact messages, newest first, with sent time |
| User | – | yes | yes | Own name, email and role |
| Admin | – | – | yes | Admin page with links to CRUD and messages |
| CRUD | – | – | yes | Create, edit and delete restrictions |
| Logout | – | yes | yes | |

Non-admins who open `/crud` get a 403 "Admins only" response. Every page has a footer with both team members' names and Neptun codes.

## Database

Tables `restriction`, `naming` (reason) and `extent`, created by a migration and filled by `TrafficSeeder` from `database/data/*.txt` (133 restrictions, 11 reasons, 6 extents). Models use Eloquent relations.

## Seeded logins

| Role | Email | Password |
|---|---|---|
| Registered | aaa@aaa.hu | aaaaaaaa |
| Admin | bbb@bbb.hu | bbbbbbbb |

## Setup (Windows, Laragon)

1. Install Laragon Full (PHP 8.4+, MySQL, Composer, Node), Git and VS Code. Use the Laragon terminal.
2. Clone the repo:
   ```
   git clone https://github.com/ratul-420/laravel-traffic-app.git
   cd laravel-traffic-app
   ```
3. Install dependencies:
   ```
   composer install
   npm install
   ```
4. Create the environment file:
   ```
   copy .env.example .env
   php artisan key:generate
   ```
5. Create an empty MySQL database named `traffic` (utf8mb4) and set these values in `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=traffic
   DB_USERNAME=root
   DB_PASSWORD=
   APP_TIMEZONE=Europe/Budapest
   ```
6. Create the tables, seed the data, build the assets and start the server:
   ```
   php artisan migrate:fresh --seed
   npm run build
   php artisan serve
   ```
7. Open http://localhost:8000

On macOS the steps are the same, using the Terminal instead of the Laragon terminal and `cp .env.example .env` instead of `copy`.

## Git workflow

`main` is never committed to directly. Each task has its own branch (for example `feature/theme`, `feature/graph`), a pull request, and a GitHub Issue on the project board.
