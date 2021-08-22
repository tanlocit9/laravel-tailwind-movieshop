**Environment required:**

	1. Composer
	2. PHP 7.x
	3. NodeJs
	4. Postgres 13
    5. Git (optional)
**Build project:**

    1. git clone https://github.com/tanlocit9/laravel-tailwind-movieshop.git
	2. Composer install
	3. Composer dump-autoload
	4. php artisan key:generate
	5. npm run dev
	6. php artisan serve
    7. Open browser and connect to localhost:8000
**Run migration:**

	1. php artisan migrate --seed
**Re-run migration:**

	1. php artisan migrate:fresh --seed
**Accounts:**

	1. User:
		Email: test@gmail.com
		Password: 123456789
	2. Staff 1: 
		Email: superadmin@gmail.com
		Password: 123456789
		Role-permission: Permission
	2. Staff 2: 
		Email: ticketer@gmail.com
		Password: 123456789
		Role-permission: Manage ticket only.
