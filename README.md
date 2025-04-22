# Laravel Timesheet Tracker Called TimeKeep

A web-based timesheet tracking application built with Laravel. Users can register, manage projects, log tasks, track work sessions, and filter activity through a dynamic dashboard.

---

## Features

- User registration with profile image and role
- Create/manage Projects and Tasks
- Log work sessions across multiple days per task
- Dashboard filtering by type (project/task), status, and date
- Responsive layout with Laravel Breeze
- Confirmation modals for delete actions
- User profile page with photo and account details

---

## Tech Stack

- **Backend**: Laravel 10
- **Frontend**: Blade, Tailwind CSS, Bootstrap (for modals)
- **Authentication**: Laravel Breeze
- **Database**: MySQL / SQLite
- **Tooling**: Laravel Artisan, Faker, Eloquent ORM

---

## Installation

```bash
git clone https://github.com/your-username/timesheet-tracker.git
cd timesheet-tracker
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm install && npm run dev
php artisan serve
```

> Login with seeded user: `genevieve@gmail.com` / `Admin@1234`

---

## Database Structure

### Users
- name, email, password, role, photo_path, last_activity_date

### Projects
- name, description, start_date, due_date, status, price_per_hour, client_name, notes, user_id

### Tasks
- name, description, project_id, status, notes, link, user_id

### Task Sessions
- task_id, date, start_time, end_time, time_spent, notes

---

## Relationships

- A User has many Projects
- A Project has many Tasks
- A Task has many TaskSessions

---


## Roadmap

- [ ] Dashboard charts and analytics
- [ ] Export timesheet data (CSV, PDF)
- [ ] Weekly/monthly summaries
- [ ] Notifications/reminders for upcoming tasks

---

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

---

## License

[MIT](https://choosealicense.com/licenses/mit/)

---

## Author

**Genevieve Awa** – [@awsactivators](https://github.com/awsactivators)

---

> Designed with productivity and real-time task tracking in mind. Simplify your workflow and own your time

