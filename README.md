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

php artisan tinker
$admin = new App\Admin;
$admin->name = "<Admin Name>";
$admin->password = bcrypt"<Your Password>";
$admin->email = "<Your email>";
\$admin->save();
