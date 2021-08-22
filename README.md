**Environment required:**

	1. Composer
	2. PHP 7.x
	3. NodeJs
	4. Postgres 13
**Build project:**

	1. Composer install
	2. Composer dump-autoload
	3. php artisan key:generate
	4. npm run dev
	5. php artisan serve
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
