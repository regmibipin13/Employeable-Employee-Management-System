# Laravel Vue and Jquery Employee Management System

Advance Laravel Employee Management System based on [Adminator Bootstrap theme](https://github.com/puikinsh/Adminator-admin-dashboard)

What's inside:

- Login/Register/Forget Password functionality with default Laravel 
- Managing Users/Roles/Permissions CRUDs: tables, and forms
- Managing Employees CRUDs; table and forms
- Enable / Disable Employees
- Instant Mail to single Employees
- Account auto created and send through mail with most reset password feature for each employee of new registration by admin like e-bankings
- Designations and Departments For Employees
- Managing Employees CRUDS: tables and forms
- Attendance Management
- Leave Management (with admin approval feature)
- Salary Management 
	- Manage Due Salaries (Automatically shows the due salary of each employee according to the salary type of the employee)
	- Transaction History (Shows all the transaction of the system like salary payment of employee and others if have)

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL. 
- You can login to adminpanel with default credentials __admin@admin.com__ - __password__

