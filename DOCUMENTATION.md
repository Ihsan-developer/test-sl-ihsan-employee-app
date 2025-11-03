# Employee Management System - Complete Documentation
## From Zero to Hero Guide
📚 Complete Documentation Includes:
1. Project Overview
What the project is and does
Architecture type (Livewire SSR, NOT REST API)
Key features
2. Tech Stack & Versions
Laravel 12.31.1, PHP 8.4.1
Livewire 3.x, Flux UI, TailwindCSS 4.x
Complete list of all dependencies
3. Architecture & Design Patterns
Visual diagrams of application flow
Data flow patterns (Livewire vs traditional)
MVC pattern explanation
How Livewire works (AJAX-style without JavaScript)
4. Installation from Scratch (Step-by-Step!)
Prerequisites and version checks
Installing Laravel from zero
Database configuration
Installing all dependencies (Livewire, Volt, Flux, Fortify)
Creating migrations, models, seeders
Setting up authentication
Running development servers
5. Database Structure
Complete ERD diagram
All table relationships explained
SQL examples for each relationship
6. API Endpoints & Routes
IMPORTANT NOTE: This is NOT a REST API!
All Livewire routes documented
What queries run for each endpoint
Authentication routes
CRUD operations for departments, positions, employees
7. Features Documentation
Department management (complete features + SQL queries)
Position management (complete features + SQL queries)
Employee management (complete features + SQL queries)
Dashboard features
Business rules for each feature
8. Development Workflow
Daily development process
How to create new features (step-by-step example)
Code formatting
Database management commands
9. Testing Guide
How to run tests
Writing new tests
Example Livewire tests
10. Deployment Guide
Production server requirements
Complete Ubuntu 22.04 deployment steps
Nginx configuration
SSL setup with Let's Encrypt
Queue workers and cron jobs
11. Troubleshooting
6 common issues with solutions
Vite assets not loading
Database connection errors
Livewire not working
Permission errors
12. Bonus: Converting to REST API
Complete guide on how to add REST API
Laravel Sanctum setup
Example API controller
API documentation format
13. Appendix
Commands cheat sheet
File structure reference
Environment variables reference
📁 File Location:
DOCUMENTATION.md
Key Highlights:
✅ Zero to Hero: Complete tutorial from empty folder to production
✅ Architecture Explanation: Clear explanation that this uses Livewire (NOT REST API)
✅ Direct Database Queries: Documented how Eloquent ORM queries the database
✅ Every Library Listed: With installation commands
✅ Visual Diagrams: ERD, architecture flow, data patterns
✅ SQL Examples: Actual queries for each operation
✅ Production Ready: Complete deployment guide
✅ Troubleshooting: Common issues solved This documentation is now a complete guide that anyone can follow to build this project from absolute scratch! 🚀
---

## Table of Contents
1. [Project Overview](#project-overview)
2. [Tech Stack & Versions](#tech-stack--versions)
3. [Architecture & Design Patterns](#architecture--design-patterns)
4. [Installation from Scratch](#installation-from-scratch)
5. [Database Structure](#database-structure)
6. [API Endpoints & Routes](#api-endpoints--routes)
7. [Features Documentation](#features-documentation)
8. [Development Workflow](#development-workflow)
9. [Testing Guide](#testing-guide)
10. [Deployment Guide](#deployment-guide)
11. [Troubleshooting](#troubleshooting)

---

## Project Overview

### What is this project?
A modern, full-featured **Employee Management System** built with Laravel and Livewire. It allows organizations to manage employees, departments, positions, and organizational structure efficiently.

### Key Features
- ✅ Employee CRUD operations
- ✅ Department management with hierarchical structure
- ✅ Position management with salary ranges
- ✅ User authentication (register, login, password reset)
- ✅ Real-time search and filtering
- ✅ Responsive modern UI with dark mode
- ✅ Role-based access control ready
- ✅ RESTful-like architecture using Livewire

### Architecture Type
**This is NOT a REST API project.** It uses:
- **Server-Side Rendering (SSR)** with Laravel Blade templates
- **Livewire** for reactive components (AJAX-like without writing JavaScript)
- **Direct database queries** through Eloquent ORM (no REST API layer)
- **Full-stack monolithic architecture**

---

## Tech Stack & Versions

### Backend Framework
```
Laravel Framework: 12.31.1
PHP Version: 8.4.1
Database: MySQL 8.0+
```

### Frontend Stack
```
Livewire: 3.x (reactive components)
Flux UI: Latest (Livewire component library)
TailwindCSS: 4.x (utility-first CSS)
Vite: 7.0.6 (build tool)
Alpine.js: 3.x (via Livewire)
```

### Development Tools
```
Composer: 2.x (PHP dependency manager)
Node.js: 18.x+ (JavaScript runtime)
NPM: 9.x+ (package manager)
Pest PHP: Latest (testing framework)
Laravel Pint: Latest (code formatter)
```

### Additional Libraries
```
Laravel Fortify: Authentication scaffolding
Laravel Volt: Single-file Livewire components
Laravel Concurrency: Parallel task execution
```

---

## Architecture & Design Patterns

### 1. Application Architecture

```
┌─────────────────────────────────────────────────┐
│                   Browser                        │
└────────────────────┬────────────────────────────┘
                     │ HTTP Request
                     ▼
┌─────────────────────────────────────────────────┐
│              Laravel Router                      │
│          (routes/web.php, auth.php)             │
└────────────────────┬────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────┐
│           Livewire Components                    │
│   (app/Livewire/*.php + views/livewire/*.blade) │
│   - Handle user interactions                     │
│   - Validate input                               │
│   - Business logic                               │
└────────────────────┬────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────┐
│           Eloquent Models                        │
│            (app/Models/*.php)                    │
│   - Define relationships                         │
│   - Query scopes                                 │
│   - Accessors/Mutators                          │
└────────────────────┬────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────┐
│              MySQL Database                      │
│   - departments, positions, employees, users    │
└─────────────────────────────────────────────────┘
```

### 2. Data Flow Pattern

**Traditional Request (Non-Livewire):**
```
User clicks link → Full page reload → Server renders → Browser displays
```

**Livewire Request (AJAX-style without JavaScript):**
```
User interacts → Livewire sends AJAX → Server updates component →
Only changed parts re-render → Browser updates DOM
```

### 3. Design Patterns Used

#### MVC Pattern (Model-View-Controller)
- **Model**: `app/Models/` - Data and business logic
- **View**: `resources/views/` - Presentation layer
- **Controller**: `app/Livewire/` - Request handling (Livewire components act as controllers)

#### Repository Pattern (Simplified)
Eloquent ORM acts as repository:
```php
// Instead of direct DB queries
Employee::where('department_id', 1)->get();

// Models abstract database operations
$department->employees; // Uses relationship
```

#### Observer Pattern
Livewire uses reactive properties:
```php
public $search = ''; // When this changes, view updates automatically
```

---

## Installation from Scratch

### Prerequisites
```bash
# Check versions
php --version    # Should be 8.2 or higher
composer --version
node --version   # Should be 18 or higher
npm --version
mysql --version  # Should be 8.0 or higher
```

### Step 1: Install Laravel

```bash
# Create new Laravel project
composer create-project laravel/laravel employee-app

# Navigate to project
cd employee-app

# Test installation
php artisan serve
# Visit http://127.0.0.1:8000
```

### Step 2: Configure Database

```bash
# Create database
mysql -u root -p
CREATE DATABASE employee_management;
EXIT;
```

Edit `.env` file:
```env
APP_NAME="Employee Management System"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8001

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 3: Install Core Dependencies

```bash
# Install Livewire
composer require livewire/livewire

# Install Livewire Volt (single-file components)
composer require livewire/volt

# Install Flux UI
composer require livewire/flux livewire/flux-pro

# Install Laravel Fortify (authentication)
composer require laravel/fortify

# Install testing framework
composer require pestphp/pest --dev --with-all-dependencies
composer require pestphp/pest-plugin-laravel --dev

# Install code formatter
composer require laravel/pint --dev
```

### Step 4: Install Frontend Dependencies

```bash
# Install Node packages
npm install

# Install TailwindCSS
npm install -D tailwindcss@next @tailwindcss/vite postcss autoprefixer

# Initialize Vite configuration (already exists)
```

Create `vite.config.js`:
```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '127.0.0.1',
        cors: true,
        hmr: {
            host: '127.0.0.1',
        },
    },
});
```

### Step 5: Setup Authentication

```bash
# Publish Fortify configuration
php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"

# Install Volt for auth views
php artisan volt:install

# Generate auth scaffolding
php artisan fortify:install
```

Configure `config/fortify.php`:
```php
'features' => [
    Features::registration(),
    Features::resetPasswords(),
    Features::emailVerification(),
    Features::updateProfileInformation(),
    Features::updatePasswords(),
    Features::twoFactorAuthentication([
        'confirm' => true,
        'confirmPassword' => true,
    ]),
],
```

### Step 6: Create Database Structure

#### Create Migrations

```bash
# Create departments migration
php artisan make:migration create_departments_table
```

Edit `database/migrations/xxxx_create_departments_table.php`:
```php
public function up(): void
{
    Schema::create('departments', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('code', 50)->unique();
        $table->text('description')->nullable();
        $table->foreignId('manager_id')->nullable()->constrained('employees')->nullOnDelete();
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}
```

```bash
# Create positions migration
php artisan make:migration create_positions_table
```

Edit `database/migrations/xxxx_create_positions_table.php`:
```php
public function up(): void
{
    Schema::create('positions', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('code', 50)->unique();
        $table->text('description')->nullable();
        $table->foreignId('department_id')->constrained()->cascadeOnDelete();
        $table->enum('level', ['entry', 'junior', 'senior', 'lead', 'manager', 'director']);
        $table->decimal('min_salary', 12, 2)->nullable();
        $table->decimal('max_salary', 12, 2)->nullable();
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}
```

```bash
# Create employees migration
php artisan make:migration create_employees_table
```

Edit `database/migrations/xxxx_create_employees_table.php`:
```php
public function up(): void
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
        $table->string('employee_number')->unique();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('phone')->nullable();
        $table->date('date_of_birth')->nullable();
        $table->enum('gender', ['male', 'female', 'other'])->nullable();
        $table->text('address')->nullable();
        $table->string('city')->nullable();
        $table->string('state')->nullable();
        $table->string('postal_code')->nullable();
        $table->string('country')->default('Indonesia');
        $table->string('national_id')->nullable()->unique();
        $table->date('hire_date');
        $table->foreignId('department_id')->constrained()->cascadeOnDelete();
        $table->foreignId('position_id')->constrained()->cascadeOnDelete();
        $table->foreignId('manager_id')->nullable()->constrained('employees')->nullOnDelete();
        $table->enum('employment_status', ['active', 'inactive', 'terminated', 'resigned'])->default('active');
        $table->enum('employment_type', ['full_time', 'part_time', 'contract', 'internship'])->default('full_time');
        $table->string('profile_photo')->nullable();
        $table->timestamps();
    });
}
```

```bash
# Run migrations
php artisan migrate
```

### Step 7: Create Models

```bash
# Create models
php artisan make:model Department
php artisan make:model Position
php artisan make:model Employee
```

Edit `app/Models/Department.php`:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'manager_id',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }
}
```

Edit `app/Models/Position.php`:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
    protected $fillable = [
        'title',
        'code',
        'description',
        'department_id',
        'level',
        'min_salary',
        'max_salary',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'min_salary' => 'decimal:2',
        'max_salary' => 'decimal:2',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
```

Edit `app/Models/Employee.php`:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'employee_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'national_id',
        'hire_date',
        'department_id',
        'position_id',
        'manager_id',
        'employment_status',
        'employment_type',
        'profile_photo',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'hire_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function subordinates(): HasMany
    {
        return $this->hasMany(Employee::class, 'manager_id');
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
```

### Step 8: Create Seeders

```bash
# Create seeders
php artisan make:seeder DepartmentSeeder
php artisan make:seeder PositionSeeder
php artisan make:seeder EmployeeSeeder
```

Edit `database/seeders/DepartmentSeeder.php`:
```php
<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'Human Resources', 'code' => 'HR', 'description' => 'Manages recruitment, employee relations, and HR policies'],
            ['name' => 'Information Technology', 'code' => 'IT', 'description' => 'Handles technology infrastructure and software development'],
            ['name' => 'Finance', 'code' => 'FIN', 'description' => 'Manages financial planning, accounting, and reporting'],
            ['name' => 'Marketing', 'code' => 'MKT', 'description' => 'Develops and executes marketing strategies'],
            ['name' => 'Sales', 'code' => 'SALES', 'description' => 'Manages sales operations and customer relationships'],
            ['name' => 'Operations', 'code' => 'OPS', 'description' => 'Oversees daily business operations'],
            ['name' => 'Customer Service', 'code' => 'CS', 'description' => 'Provides customer support and service'],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}
```

Edit `database/seeders/PositionSeeder.php`:
```php
<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\Department;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            // HR Department
            ['title' => 'HR Manager', 'code' => 'HR-MGR', 'department_code' => 'HR', 'level' => 'manager', 'min_salary' => 10000000, 'max_salary' => 15000000],
            ['title' => 'Recruitment Specialist', 'code' => 'HR-REC', 'department_code' => 'HR', 'level' => 'senior', 'min_salary' => 7000000, 'max_salary' => 10000000],

            // IT Department
            ['title' => 'IT Director', 'code' => 'IT-DIR', 'department_code' => 'IT', 'level' => 'director', 'min_salary' => 20000000, 'max_salary' => 30000000],
            ['title' => 'Senior Software Engineer', 'code' => 'IT-SSE', 'department_code' => 'IT', 'level' => 'senior', 'min_salary' => 12000000, 'max_salary' => 18000000],
            ['title' => 'DevOps Engineer', 'code' => 'IT-DEVOPS', 'department_code' => 'IT', 'level' => 'senior', 'min_salary' => 11000000, 'max_salary' => 16000000],

            // Finance Department
            ['title' => 'Finance Manager', 'code' => 'FIN-MGR', 'department_code' => 'FIN', 'level' => 'manager', 'min_salary' => 12000000, 'max_salary' => 18000000],
            ['title' => 'Accountant', 'code' => 'FIN-ACC', 'department_code' => 'FIN', 'level' => 'junior', 'min_salary' => 6000000, 'max_salary' => 9000000],

            // Marketing Department
            ['title' => 'Marketing Manager', 'code' => 'MKT-MGR', 'department_code' => 'MKT', 'level' => 'manager', 'min_salary' => 10000000, 'max_salary' => 15000000],
            ['title' => 'Digital Marketing Specialist', 'code' => 'MKT-DIG', 'department_code' => 'MKT', 'level' => 'senior', 'min_salary' => 8000000, 'max_salary' => 12000000],

            // Sales Department
            ['title' => 'Sales Director', 'code' => 'SALES-DIR', 'department_code' => 'SALES', 'level' => 'director', 'min_salary' => 15000000, 'max_salary' => 25000000],

            // Operations Department
            ['title' => 'Operations Manager', 'code' => 'OPS-MGR', 'department_code' => 'OPS', 'level' => 'manager', 'min_salary' => 11000000, 'max_salary' => 16000000],
            ['title' => 'Operations Coordinator', 'code' => 'OPS-COORD', 'department_code' => 'OPS', 'level' => 'junior', 'min_salary' => 6000000, 'max_salary' => 9000000],

            // Customer Service Department
            ['title' => 'Customer Service Manager', 'code' => 'CS-MGR', 'department_code' => 'CS', 'level' => 'manager', 'min_salary' => 9000000, 'max_salary' => 13000000],
            ['title' => 'Customer Service Representative', 'code' => 'CS-REP', 'department_code' => 'CS', 'level' => 'entry', 'min_salary' => 4500000, 'max_salary' => 6500000],
        ];

        foreach ($positions as $pos) {
            $department = Department::where('code', $pos['department_code'])->first();
            unset($pos['department_code']);
            $pos['department_id'] = $department->id;
            Position::create($pos);
        }
    }
}
```

Edit `database/seeders/DatabaseSeeder.php`:
```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            PositionSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}
```

### Step 9: Create Livewire Components

```bash
# Create Livewire components for departments
php artisan make:livewire DepartmentIndex
php artisan make:livewire DepartmentCreate

# Create Livewire components for positions
php artisan make:livewire PositionIndex
php artisan make:livewire PositionCreate

# Create Livewire components for employees
php artisan make:livewire EmployeeIndex
php artisan make:livewire EmployeeCreate
php artisan make:livewire EmployeeShow
php artisan make:livewire EmployeeEdit
```

### Step 10: Setup Routes

Edit `routes/web.php`:
```php
<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\DepartmentIndex;
use App\Livewire\DepartmentCreate;
use App\Livewire\PositionIndex;
use App\Livewire\PositionCreate;
use App\Livewire\EmployeeIndex;
use App\Livewire\EmployeeCreate;
use App\Livewire\EmployeeShow;
use App\Livewire\EmployeeEdit;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Department routes
    Route::get('/departments', DepartmentIndex::class)->name('departments.index');
    Route::get('/departments/create', DepartmentCreate::class)->name('departments.create');

    // Position routes
    Route::get('/positions', PositionIndex::class)->name('positions.index');
    Route::get('/positions/create', PositionCreate::class)->name('positions.create');

    // Employee routes
    Route::get('/employees', EmployeeIndex::class)->name('employees.index');
    Route::get('/employees/create', EmployeeCreate::class)->name('employees.create');
    Route::get('/employees/{id}', EmployeeShow::class)->name('employees.show');
    Route::get('/employees/{id}/edit', EmployeeEdit::class)->name('employees.edit');
});

require __DIR__.'/auth.php';
```

### Step 11: Run Development Server

```bash
# Start Vite dev server (terminal 1)
npm run dev

# Start Laravel server (terminal 2)
php artisan serve --port=8001

# Or use Laravel Concurrency (single command)
composer dev
```

Visit: `http://127.0.0.1:8001`

---

## Database Structure

### Entity Relationship Diagram (ERD)

```
┌─────────────┐         ┌──────────────┐         ┌─────────────┐
│    users    │         │  employees   │         │ departments │
├─────────────┤         ├──────────────┤         ├─────────────┤
│ id          │◄───┐    │ id           │    ┌───►│ id          │
│ name        │    │    │ user_id      │    │    │ name        │
│ email       │    └────│ employee_num │    │    │ code        │
│ password    │         │ first_name   │    │    │ description │
└─────────────┘         │ last_name    │    │    │ manager_id  │
                        │ email        │    │    │ is_active   │
                        │ phone        │    │    └─────────────┘
                        │ hire_date    │    │           ▲
                        │ department_id├────┘           │
                        │ position_id  ├────┐           │
                        │ manager_id   │    │           │
                        │ status       │    │    ┌──────┘
                        └──────────────┘    │    │
                               ▲            │    │
                               │            │    │
                               │            ▼    │
                               │     ┌──────────────┐
                               │     │  positions   │
                               │     ├──────────────┤
                               │     │ id           │
                               │     │ title        │
                               └─────┤ code         │
                                     │ description  │
                                     │ department_id│
                                     │ level        │
                                     │ min_salary   │
                                     │ max_salary   │
                                     │ is_active    │
                                     └──────────────┘
```

### Table Relationships

1. **users → employees**: One-to-One (optional)
   - A user can be linked to one employee
   - An employee can have one user account

2. **departments → employees**: One-to-Many
   - A department has many employees
   - An employee belongs to one department

3. **departments → positions**: One-to-Many
   - A department has many positions
   - A position belongs to one department

4. **positions → employees**: One-to-Many
   - A position has many employees
   - An employee has one position

5. **employees → employees** (manager): Self-referencing One-to-Many
   - An employee can have one manager
   - A manager can have many subordinates

6. **departments → employees** (manager): One-to-One
   - A department can have one manager (who is an employee)

---

## API Endpoints & Routes

### Important Note
**This application uses Livewire, NOT REST API.** Routes return HTML views, not JSON.

### Authentication Routes
```
GET  /register              - Show registration form
POST /register              - Create new user account
GET  /login                 - Show login form
POST /login                 - Authenticate user
POST /logout                - Log out user
GET  /forgot-password       - Show password reset form
POST /forgot-password       - Send password reset email
GET  /reset-password/{token}- Show new password form
POST /reset-password        - Update password
```

### Department Routes
```
GET /departments            - List all departments
    Controller: App\Livewire\DepartmentIndex
    Method: Renders view with paginated departments
    Query: SELECT * FROM departments ORDER BY name

GET /departments/create     - Show create/edit form
    Controller: App\Livewire\DepartmentCreate
    Query Param: ?edit={id} for editing

Actions (Livewire):
- createDepartment()        - INSERT INTO departments
- updateDepartment()        - UPDATE departments WHERE id = ?
- deleteDepartment()        - DELETE FROM departments WHERE id = ?
- toggleStatus()            - UPDATE departments SET is_active = !is_active
```

### Position Routes
```
GET /positions              - List all positions
    Controller: App\Livewire\PositionIndex
    Eager Loading: positions with department and employees
    Query: SELECT * FROM positions
           JOIN departments ON positions.department_id = departments.id

GET /positions/create       - Show create/edit form
    Controller: App\Livewire\PositionCreate
    Query Param: ?edit={id} for editing

Actions (Livewire):
- createPosition()          - INSERT INTO positions
- updatePosition()          - UPDATE positions WHERE id = ?
- deletePosition()          - DELETE FROM positions WHERE id = ?
- toggleStatus()            - UPDATE positions SET is_active = !is_active
```

### Employee Routes
```
GET /employees              - List all employees
    Controller: App\Livewire\EmployeeIndex
    Eager Loading: employees with department, position, manager
    Query: SELECT * FROM employees
           LEFT JOIN departments ON employees.department_id = departments.id
           LEFT JOIN positions ON employees.position_id = positions.id

GET /employees/create       - Show create form
    Controller: App\Livewire\EmployeeCreate

GET /employees/{id}         - Show employee details
    Controller: App\Livewire\EmployeeShow
    Query: SELECT * FROM employees WHERE id = ?

GET /employees/{id}/edit    - Show edit form
    Controller: App\Livewire\EmployeeEdit

Actions (Livewire):
- createEmployee()          - INSERT INTO employees
- updateEmployee()          - UPDATE employees WHERE id = ?
- deleteEmployee()          - DELETE FROM employees WHERE id = ?
```

### Public Routes
```
GET /                       - Home page (welcome view)
GET /dashboard              - Dashboard (requires authentication)
```

---

## Features Documentation

### 1. Department Management

**Location**: `http://127.0.0.1:8001/departments`

**Features**:
- ✅ View list of all departments
- ✅ Search departments by name or code
- ✅ Create new department
- ✅ Edit existing department
- ✅ Delete department (only if no employees)
- ✅ Toggle active/inactive status
- ✅ Assign department manager
- ✅ View employee count per department

**Business Rules**:
1. Department code must be unique
2. Cannot delete department with employees
3. Manager must be an existing employee
4. Inactive departments are hidden from dropdowns

**Database Queries**:
```sql
-- List departments with employee count
SELECT d.*, COUNT(e.id) as employees_count
FROM departments d
LEFT JOIN employees e ON d.id = e.department_id
GROUP BY d.id
ORDER BY d.name;

-- Create department
INSERT INTO departments (name, code, description, is_active)
VALUES ('Engineering', 'ENG', 'Software development', 1);

-- Delete department (with check)
DELETE FROM departments
WHERE id = ?
AND NOT EXISTS (SELECT 1 FROM employees WHERE department_id = ?);
```

### 2. Position Management

**Location**: `http://127.0.0.1:8001/positions`

**Features**:
- ✅ View list of all positions
- ✅ Search positions by title or code
- ✅ Filter by department
- ✅ Create new position
- ✅ Edit existing position
- ✅ Delete position (only if no employees)
- ✅ Toggle active/inactive status
- ✅ Set salary ranges (min/max)
- ✅ Define position levels

**Position Levels**:
- Entry: Entry-level position
- Junior: 1-3 years experience
- Senior: 3-7 years experience
- Lead: Team lead / tech lead
- Manager: People manager
- Director: Executive level

**Business Rules**:
1. Position code must be unique
2. Max salary must be >= min salary
3. Cannot delete position with employees
4. Position must belong to active department

**Database Queries**:
```sql
-- List positions with department
SELECT p.*, d.name as department_name, COUNT(e.id) as employees_count
FROM positions p
JOIN departments d ON p.department_id = d.id
LEFT JOIN employees e ON p.id = e.position_id
GROUP BY p.id
ORDER BY p.title;

-- Validate salary range
SELECT * FROM positions
WHERE max_salary >= min_salary;

-- Filter by department
SELECT * FROM positions
WHERE department_id = ?
AND is_active = 1;
```

### 3. Employee Management

**Location**: `http://127.0.0.1:8001/employees`

**Features**:
- ✅ View list of all employees
- ✅ Search by name, email, employee number
- ✅ Filter by department, position, status
- ✅ Create new employee
- ✅ Edit employee information
- ✅ View detailed employee profile
- ✅ Delete employee
- ✅ Assign manager
- ✅ Track employment history

**Employment Status**:
- Active: Currently working
- Inactive: On leave / suspended
- Terminated: Employment ended by company
- Resigned: Voluntarily left

**Employment Type**:
- Full Time: Standard full-time employment
- Part Time: Less than full-time hours
- Contract: Fixed-term contract
- Internship: Temporary training position

**Business Rules**:
1. Employee number must be unique
2. Email must be unique
3. Hire date cannot be in future
4. Manager cannot be self
5. Must belong to active department and position
6. Cannot delete employee if they are a department manager

**Database Queries**:
```sql
-- List employees with relationships
SELECT e.*,
       d.name as department_name,
       p.title as position_title,
       m.first_name || ' ' || m.last_name as manager_name
FROM employees e
LEFT JOIN departments d ON e.department_id = d.id
LEFT JOIN positions p ON e.position_id = p.id
LEFT JOIN employees m ON e.manager_id = m.id
ORDER BY e.first_name, e.last_name;

-- Get employee with full details
SELECT e.*, u.email as user_email
FROM employees e
LEFT JOIN users u ON e.user_id = u.id
WHERE e.id = ?;

-- Get subordinates
SELECT * FROM employees
WHERE manager_id = ?;
```

### 4. Dashboard

**Location**: `http://127.0.0.1:8001/dashboard`

**Features**:
- ✅ Total employee count
- ✅ Department breakdown
- ✅ Position distribution
- ✅ Recent hires
- ✅ Quick action buttons
- ✅ Department employee chart

**Statistics Queries**:
```sql
-- Total employees
SELECT COUNT(*) FROM employees WHERE employment_status = 'active';

-- Employees by department
SELECT d.name, COUNT(e.id) as count
FROM departments d
LEFT JOIN employees e ON d.id = e.department_id
WHERE e.employment_status = 'active'
GROUP BY d.id;

-- Recent hires (last 30 days)
SELECT * FROM employees
WHERE hire_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)
ORDER BY hire_date DESC
LIMIT 10;
```

---

## Development Workflow

### Daily Development Process

```bash
# 1. Pull latest changes
git pull origin main

# 2. Install dependencies (if composer.json or package.json changed)
composer install
npm install

# 3. Run migrations (if new migrations exist)
php artisan migrate

# 4. Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# 5. Start development servers
npm run dev &
php artisan serve --port=8001

# Or use Laravel Concurrency
composer dev
```

### Creating New Feature

#### Example: Add Employee Performance Reviews

**Step 1: Create Migration**
```bash
php artisan make:migration create_performance_reviews_table
```

```php
// database/migrations/xxxx_create_performance_reviews_table.php
public function up()
{
    Schema::create('performance_reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
        $table->foreignId('reviewer_id')->constrained('employees')->cascadeOnDelete();
        $table->date('review_date');
        $table->integer('rating'); // 1-5
        $table->text('comments');
        $table->enum('status', ['draft', 'submitted', 'approved']);
        $table->timestamps();
    });
}
```

**Step 2: Create Model**
```bash
php artisan make:model PerformanceReview
```

```php
// app/Models/PerformanceReview.php
class PerformanceReview extends Model
{
    protected $fillable = ['employee_id', 'reviewer_id', 'review_date', 'rating', 'comments', 'status'];

    protected $casts = ['review_date' => 'date'];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function reviewer() {
        return $this->belongsTo(Employee::class, 'reviewer_id');
    }
}
```

**Step 3: Create Livewire Components**
```bash
php artisan make:livewire PerformanceReviewIndex
php artisan make:livewire PerformanceReviewCreate
```

**Step 4: Add Routes**
```php
// routes/web.php
Route::get('/performance-reviews', PerformanceReviewIndex::class)->name('reviews.index');
Route::get('/performance-reviews/create', PerformanceReviewCreate::class)->name('reviews.create');
```

**Step 5: Run Migration**
```bash
php artisan migrate
```

### Code Formatting

```bash
# Format all PHP files
./vendor/bin/pint

# Check formatting (dry run)
./vendor/bin/pint --test
```

### Database Management

```bash
# Fresh migration (DELETES ALL DATA!)
php artisan migrate:fresh

# Fresh migration with seeders
php artisan migrate:fresh --seed

# Rollback last migration
php artisan migrate:rollback

# Seed only
php artisan db:seed

# Seed specific seeder
php artisan db:seed --class=DepartmentSeeder
```

---

## Testing Guide

### Running Tests

```bash
# Run all tests
php artisan test

# Run with coverage
php artisan test --coverage

# Run specific test file
php artisan test tests/Feature/DepartmentTest.php

# Run specific test method
php artisan test --filter test_can_create_department
```

### Writing Tests

Create test file:
```bash
php artisan make:test DepartmentTest
```

Example test:
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use App\Livewire\DepartmentCreate;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_departments_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/departments');

        $response->assertStatus(200);
    }

    public function test_can_create_department(): void
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(DepartmentCreate::class)
            ->set('name', 'Engineering')
            ->set('code', 'ENG')
            ->set('description', 'Software Development')
            ->call('save')
            ->assertRedirect('/departments');

        $this->assertDatabaseHas('departments', [
            'name' => 'Engineering',
            'code' => 'ENG',
        ]);
    }

    public function test_cannot_delete_department_with_employees(): void
    {
        $department = Department::factory()->create();
        $employee = Employee::factory()->create(['department_id' => $department->id]);

        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(DepartmentIndex::class)
            ->call('confirmDelete', $department->id)
            ->call('delete');

        $this->assertDatabaseHas('departments', ['id' => $department->id]);
    }
}
```

---

## Deployment Guide

### Production Server Requirements

```
PHP: 8.2+
MySQL: 8.0+
Composer: 2.x
Node.js: 18.x+
Nginx or Apache
SSL Certificate (Let's Encrypt recommended)
```

### Deployment Steps

**1. Server Setup (Ubuntu 22.04)**
```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install PHP 8.4
sudo apt install php8.4 php8.4-cli php8.4-fpm php8.4-mysql \
    php8.4-curl php8.4-mbstring php8.4-xml php8.4-zip php8.4-gd -y

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install -y nodejs

# Install MySQL
sudo apt install mysql-server -y
sudo mysql_secure_installation

# Install Nginx
sudo apt install nginx -y
```

**2. Clone Repository**
```bash
cd /var/www
sudo git clone https://github.com/yourusername/employee-app.git
cd employee-app
sudo chown -R www-data:www-data /var/www/employee-app
sudo chmod -R 755 /var/www/employee-app/storage
```

**3. Install Dependencies**
```bash
composer install --optimize-autoloader --no-dev
npm install
npm run build
```

**4. Environment Configuration**
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env`:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_production
DB_USERNAME=production_user
DB_PASSWORD=strong_password
```

**5. Database Setup**
```bash
php artisan migrate --force
php artisan db:seed --force
```

**6. Optimize Laravel**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

**7. Configure Nginx**
```nginx
# /etc/nginx/sites-available/employee-app
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/employee-app/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Enable site:
```bash
sudo ln -s /etc/nginx/sites-available/employee-app /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

**8. SSL Certificate (Let's Encrypt)**
```bash
sudo apt install certbot python3-certbot-nginx -y
sudo certbot --nginx -d yourdomain.com
```

**9. Setup Queue Worker (Optional)**
```bash
# /etc/systemd/system/laravel-worker.service
[Unit]
Description=Laravel Queue Worker
After=network.target

[Service]
User=www-data
Group=www-data
Restart=always
ExecStart=/usr/bin/php /var/www/employee-app/artisan queue:work --sleep=3 --tries=3

[Install]
WantedBy=multi-user.target
```

Enable and start:
```bash
sudo systemctl enable laravel-worker
sudo systemctl start laravel-worker
```

**10. Setup Cron Jobs**
```bash
sudo crontab -e -u www-data
```

Add:
```
* * * * * cd /var/www/employee-app && php artisan schedule:run >> /dev/null 2>&1
```

---

## Troubleshooting

### Common Issues

#### 1. Vite Assets Not Loading

**Problem**: CSS/JS not loading, white screen

**Solution**:
```bash
# Clear and rebuild
npm run build
php artisan config:clear
php artisan cache:clear

# Check .env
APP_URL=http://127.0.0.1:8001

# Check vite.config.js has correct host
server: {
    host: '127.0.0.1',
}
```

#### 2. Database Connection Errors

**Problem**: `SQLSTATE[HY000] [2002] Connection refused`

**Solution**:
```bash
# Check MySQL is running
sudo systemctl status mysql

# Verify credentials in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306

# Test connection
php artisan tinker
>>> DB::connection()->getPdo();
```

#### 3. Livewire Not Working

**Problem**: Buttons don't respond, no AJAX calls

**Solution**:
```bash
# Clear views
php artisan view:clear

# Republish Livewire assets
php artisan livewire:publish --assets

# Check browser console for errors
# Ensure @livewireScripts is in layout
```

#### 4. Flux Components Not Found

**Problem**: `Unable to locate a class or view for component [flux::table]`

**Solution**:
```bash
# Some Flux components may not exist
# Replace with HTML/TailwindCSS alternatives
# See department-index.blade.php for examples
```

#### 5. Permission Errors

**Problem**: `The stream or file could not be opened in append mode`

**Solution**:
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

#### 6. Migration Errors

**Problem**: `Syntax error or access violation`

**Solution**:
```bash
# Check MySQL version compatibility
mysql --version

# Roll back and retry
php artisan migrate:rollback
php artisan migrate

# Fresh install (DELETES DATA!)
php artisan migrate:fresh --seed
```

---

## Converting to REST API

If you need REST API endpoints for mobile apps or external integrations:

### Install Laravel Sanctum

```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

### Create API Controllers

```bash
php artisan make:controller Api/DepartmentController --api
```

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return Department::with('employees')->paginate(15);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:departments',
            'description' => 'nullable|string',
        ]);

        $department = Department::create($validated);

        return response()->json($department, 201);
    }

    public function show(Department $department)
    {
        return $department->load('employees', 'positions');
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'code' => 'string|max:50|unique:departments,code,' . $department->id,
            'description' => 'nullable|string',
        ]);

        $department->update($validated);

        return response()->json($department);
    }

    public function destroy(Department $department)
    {
        if ($department->employees()->count() > 0) {
            return response()->json(['error' => 'Cannot delete department with employees'], 422);
        }

        $department->delete();

        return response()->json(null, 204);
    }
}
```

### Add API Routes

```php
// routes/api.php
use App\Http\Controllers\Api\DepartmentController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('departments', DepartmentController::class);
    Route::apiResource('positions', PositionController::class);
    Route::apiResource('employees', EmployeeController::class);
});
```

### API Documentation

```
Authentication: Bearer Token (Laravel Sanctum)

GET    /api/departments          - List all departments
POST   /api/departments          - Create department
GET    /api/departments/{id}     - Get single department
PUT    /api/departments/{id}     - Update department
DELETE /api/departments/{id}     - Delete department

Response Format (JSON):
{
    "id": 1,
    "name": "IT Department",
    "code": "IT",
    "description": "Information Technology",
    "is_active": true,
    "created_at": "2025-11-03T12:00:00.000000Z",
    "updated_at": "2025-11-03T12:00:00.000000Z"
}
```

---

## Appendix

### Useful Commands Cheat Sheet

```bash
# Laravel
php artisan list                    # All available commands
php artisan route:list              # List all routes
php artisan tinker                  # Interactive shell
php artisan optimize                # Optimize application
php artisan optimize:clear          # Clear optimization
php artisan storage:link            # Link storage directory

# Livewire
php artisan livewire:make Name      # Create Livewire component
php artisan livewire:delete Name    # Delete Livewire component
php artisan livewire:copy Old New   # Copy component
php artisan livewire:move Old New   # Rename component

# Database
php artisan migrate                 # Run migrations
php artisan migrate:fresh           # Fresh install
php artisan migrate:fresh --seed    # Fresh with data
php artisan db:seed                 # Run seeders
php artisan migrate:status          # Migration status

# Development
npm run dev                         # Start Vite dev server
npm run build                       # Build for production
composer dev                        # Start all servers
./vendor/bin/pint                   # Format code

# Testing
php artisan test                    # Run tests
php artisan test --coverage         # With coverage
php artisan test --parallel         # Parallel execution

# Cache
php artisan cache:clear             # Clear application cache
php artisan config:clear            # Clear config cache
php artisan route:clear             # Clear route cache
php artisan view:clear              # Clear compiled views
```

### File Structure Reference

```
employee-app/
├── app/
│   ├── Http/
│   │   └── Controllers/         # (Not used much with Livewire)
│   ├── Livewire/               # ⭐ Livewire components (controllers)
│   │   ├── DepartmentIndex.php
│   │   ├── DepartmentCreate.php
│   │   ├── PositionIndex.php
│   │   └── ...
│   └── Models/                 # ⭐ Eloquent models
│       ├── Department.php
│       ├── Position.php
│       ├── Employee.php
│       └── User.php
├── database/
│   ├── migrations/             # ⭐ Database schema
│   └── seeders/                # ⭐ Sample data
├── resources/
│   ├── css/
│   │   └── app.css            # ⭐ TailwindCSS styles
│   ├── js/
│   │   └── app.js             # ⭐ JavaScript entry
│   └── views/
│       ├── livewire/          # ⭐ Livewire component views
│       │   ├── department-index.blade.php
│       │   └── ...
│       ├── components/        # Reusable Blade components
│       ├── dashboard.blade.php
│       └── welcome.blade.php
├── routes/
│   ├── web.php                # ⭐ Web routes
│   ├── api.php                # API routes (if needed)
│   └── auth.php               # Authentication routes
├── public/
│   ├── build/                 # Compiled assets (after npm run build)
│   └── index.php              # Entry point
├── tests/
│   ├── Feature/               # Feature tests
│   └── Unit/                  # Unit tests
├── .env                       # ⭐ Environment configuration
├── composer.json              # PHP dependencies
├── package.json               # JavaScript dependencies
├── vite.config.js             # ⭐ Vite configuration
└── CLAUDE.MD                  # Quick reference guide
```

### Environment Variables Reference

```env
# Application
APP_NAME="Employee Management System"
APP_ENV=local|production
APP_KEY=base64:...
APP_DEBUG=true|false
APP_URL=http://127.0.0.1:8001

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management
DB_USERNAME=root
DB_PASSWORD=

# Cache & Session
CACHE_STORE=database
SESSION_DRIVER=database
QUEUE_CONNECTION=database

# Mail (for password reset)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="noreply@employeeapp.com"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## Summary

This documentation covered:
1. ✅ Complete project overview and architecture
2. ✅ Full tech stack with versions
3. ✅ Step-by-step installation from scratch
4. ✅ Database structure and relationships
5. ✅ All routes and endpoints (Livewire-based, not REST API)
6. ✅ Feature documentation with queries
7. ✅ Development workflow
8. ✅ Testing guide
9. ✅ Deployment to production
10. ✅ Troubleshooting common issues
11. ✅ Converting to REST API (bonus)

**Key Takeaways**:
- This is a **Livewire full-stack application**, NOT a REST API
- Database queries are done through **Eloquent ORM**
- Routes return **HTML views**, not JSON
- Perfect for traditional web applications
- Can be converted to REST API if needed

---

**Generated**: November 3, 2025
**Version**: 1.0.0
**Laravel Version**: 12.31.1
**PHP Version**: 8.4.1

For questions or issues, create a GitHub issue or contact the development team.
