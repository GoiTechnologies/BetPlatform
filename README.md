goibet

installation

1. Clone this repo
2. Locate cd to folder 
3. Run cmd "composer install"
4. Run cmd "copy env.example .env"
5. Run cmd "php artisan key:generate"
6. Run cmd "php artisan storage:link"
7. Locate "storage\app\public" folder and paste this download and "extract here" - "https://drive.google.com/file/d/14PJkKbIHlL9RK2hNJwZASb8lxyr4BtEN/view?usp=sharing"
8. Locate "\vendor\laravel\ui\auth-backend\AuthenticatesUsers.php" and remplace "showLoginForm()->return view('auth.login', ['isGame' => false]);"
8. Locate "\vendor\laravel\ui\auth-backend\RegistersUsers.php" and remplace "showRegistrationForm()-return view('auth.register', ['isGame' => false]);"