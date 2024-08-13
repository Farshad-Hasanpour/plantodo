## Awesome Todo List

Powered by TALL (Tailwind, Alpine, Laravel, Livewire) stack.

### How to Run
Execute these two commands and open http://localhost:8000

- ```php artisan serve```
- ```npm run dev```


### How to Set Up
#### Clone the Repository
```git clone https://github.com/Farshad-Hasanpour/tall-learning.git```

#### Navigate to the Project Directory
```cd tall-learning```

#### Install Composer Dependencies
```composer install```

#### Set Up Environment Variables
```cp .env.example .env```
<p style="color: orange;">dont forget to update database connection info</p>

#### Generate an Application Key
```php artisan key:generate```

#### Run Database Migrations
```php artisan migrate```

#### Seed Database
```php artisan db:seed```

#### Install NPM Dependencies
```npm install```

#### Set Up Cron Jobs
set up a cron job to run ```php artisan app:reset-daily-habits``` every midnight.

e.g.
```0 0 * * * /usr/bin/php /path-to-your-project/artisan app:reset-daily-habits >> /dev/null 2>&1```
