## Laravel Timesheet App: Full Walkthrough & Explanations

This document summarizes the complete process and reasoning behind building your Laravel Timesheet application, covering everything from project setup to advanced features like session-based logging and dashboard filtering.

---

### 1. Project Setup

**Command:**
```bash
laravel new timesheet-app
cd timesheet-app
```

**Why:** This sets up a new Laravel project with built-in structure for MVC, routing, authentication, and database support.

---

### 2. Authentication Setup

**Command:**
```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

**Why:** Laravel Breeze provides basic authentication scaffolding with login, register, profile, and password update functionality.

---

### 3. Create Models and Migrations

**Command:**
```bash
php artisan make:model Project -m
php artisan make:model Task -m
php artisan make:model TaskSession -m
```

**Why:** Models represent data tables. Migrations define the schema structure of your tables.

---

### 4. Define Database Migrations

**Tables Created:**
- `projects`
- `tasks`
- `task_sessions`

**Key columns:**
- Projects: name, description, project_type, start_date, due_date, status, price_per_hour, user_id, etc.
- Tasks: name, description, project_id, status, notes, link, user_id
- TaskSessions: task_id, date, start_time, end_time, time_spent, notes

**Why:** We use normalized structure:
- `projects` are owned by users.
- `tasks` belong to `projects`.
- `task_sessions` allow logging multiple work sessions per task.

---

### 5. Define Fillable Fields in Models

**Example (Task.php):**
```php
protected $fillable = [
    'name', 'description', 'project_id', 'status', 'notes', 'link', 'user_id'
];
```

**Why:** Fillable protects against mass-assignment vulnerability and allows batch creation/updating of model data.

---

### 6. Define Relationships in Models

```php
// Project.php
public function tasks() { return $this->hasMany(Task::class); }

// Task.php
public function project() { return $this->belongsTo(Project::class); }
public function sessions() { return $this->hasMany(TaskSession::class); }

// TaskSession.php
public function task() { return $this->belongsTo(Task::class); }
```

**Why:** These Eloquent relationships make querying related data seamless (e.g., `$project->tasks`, `$task->sessions`).

---

### 7. Seeders & Factories

You created seeders for users, projects, and tasks, with factories generating realistic (faker) data.

**Why:** This helps with testing and development.

---

### 8. User Registration Enhancements

Added:
- Profile image upload
- Role selection (e.g., user or manager)

**Why:** Customizing registration helps tailor user experience.

---

### 9. CRUD Controllers & Views

You implemented:
- `ProjectController`
- `TaskController`
- `TaskSessionController`

**Views included:**
- Index, Create, Edit, Show views for projects and tasks
- Task session management (log work, edit session)

**Why:** Standard CRUD to manage each resource.

---

### 10. Custom Delete Modal

You replaced browser alert with a Bootstrap modal confirmation before delete.

**Why:** Improves UX and looks more professional.

---

### 11. User Profile Page

You displayed:
- Name
- Email
- Role
- Profile photo

**Why:** Helps users view their account details and settings.

---

### 12. Dashboard Implementation

**Route:** `/dashboard`

**Controller:** `DashboardController@index`
- Filters by type: task or project
- Filters by status (pending, in-progress, completed)
- Filters by due date (project) or task date
- Sorts by latest date

**Why:** Gives users a powerful tool to view key data in one place.

---

### 13. Navigation Update

Added links to:
- Projects
- Tasks
- Profile
- Dashboard
- Logout

**Why:** Easy navigation across app features.

---

### 14. Data Cleanup

You decided to remove these from `tasks`:
- `start_time`
- `end_time`
- `time_spent`

**Why:** `TaskSessions` now handle all time tracking across multiple days or intervals.

---

### 15. Future Add-ons

You discussed adding:
- Charts on dashboard
- Summaries per week/month
- PDF/Excel export

**Why:** Useful for reporting, analytics, and external review.

---

Let me know if you'd like to generate a README.md for GitHub or deploy this app to a platform like Render, Vercel, or Laravel Forge 🚀

