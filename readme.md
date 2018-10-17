## Basic API Authentication with Laravel/Passport

### Backend
1. install Passport via the Composer:

```
composer require laravel/passport
```
2. Run migrations that will create the tables to store clients and access tokens:

```
php artisan migrate
```

3. Add the `Laravel\Passport\HasApiTokens` trait to your `App\User` model. 

```php
<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
}
```

4. This command will create the encryption keys needed to generate secure access tokens

```
php artisan passport:install
```

5. Call the `Passport::routes` method within the boot method of `AuthServiceProvider`:

```php
public function boot()
{
    $this->registerPolicies();

    Passport::routes();
}
```

6. Set the driver in `config/auth.php`. This will instruct your application to use Passport's  TokenGuard when authenticating incoming API requests:

```php
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
    ],
],
```

### Frontend

1. Publish the Passport Vue components:

```
php artisan vendor:publish --tag=passport-components
```

2. Register components in `resources/js/app.js` file:

```javascript
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);
```

3. Run `npm run dev` to recompile assets:

4. Use components into one of the application's templates to get started creating clients and personal access tokens:

```
<passport-clients></passport-clients>
<passport-authorized-clients></passport-authorized-clients>
<passport-personal-access-tokens></passport-personal-access-tokens>
```

[Laravel Passport Docs](https://laravel.com/docs/5.7/passport)
