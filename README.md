# Project Info

Name: Virtual Clinic
Developer: Bipin Neupane
Type: Advance
Tech: Laravel

#Instructions

1. composer install
2. npm install
3. create a database
4. rename your env.example file to .env within your IDE (code editor)
5. pass correct database credentials to .env file
6. migrate (code for it: php artisan migrate)
7. php artisan serve

#For creating admin
Use the following code in your terminal:

1. php artisan tinker
2. $admin = new App\Admin;
3. $admin->name = "<Admin Name>";
4. $admin->password = bcrypt"<Your Password>";
5. $admin->email = "<Your email>";
6. $admin->save();
