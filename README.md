[![Latest Stable Version](https://img.shields.io/github/v/release/proxeuse/fortify-tabler?style=flat-square)](https://packagist.org/packages/proxeuse/fortify-tabler) [![Total Downloads](https://img.shields.io/packagist/dt/proxeuse/fortify-tabler?style=flat-square)](https://packagist.org/packages/proxeuse/fortify-tabler) [![PHP Version Support](https://img.shields.io/packagist/php-v/proxeuse/fortify-tabler?style=flat-square)](https://packagist.org/packages/proxeuse/fortify-tabler)
[![License](https://img.shields.io/github/license/Proxeuse/fortify-tabler?style=flat-square)](https://github.com/Proxeuse/fortify-tabler/blob/master/LICENSE.md)

<p align="center"><img width="400" src="https://github.com/Proxeuse/fortify-tabler/raw/master/fortify-tabler.png"></p>

# Introduction

Laravel 8 has a new and very efficient application scaffolding package called [Jetstream](https://jetstream.laravel.com), many users however do not want to learn a new framework (TailWind CSS). Luckily, the backend of Jetstream has been made available under the name of Fortify. Fortify is a headless authentication backend without any pre-configured frontend templates which is a disadvantage. [FortifyUI](https://github.com/zacksmash/fortify-ui) improves Fortify by adding that missing feature.

This package is a preset for FortifyUI, it brings ready-to-use and beautiful templates for the most important pages which include: login, registration, password reset pages and two factor authentication. In the latest release, avatars and device management are introduced. The templates are based and build on the [Tabler.io](https://tabler.io) framework which is build with Bootstrap 5.0.

This preset includes Tabler assets for [release 1.0.0-alpha.21](https://github.com/tabler/tabler/releases/tag/v1.0.0-alpha.21).

- [Installation](#installation)
- [Update Instructions](#update)
- [Two Factor Authentication](#2fa)
- [Mail Verification](#mail-verification)
- [Password Confirmation](#password-confirmation)
- [Update User Profile and Password](#update-user-profile-and-password)

<a name="installation"></a>

## Installation

To get started please install the package using composer. This command also installs [FortifyUI](https://github.com/zacksmash/fortify-ui) so you shouldn't install it first.

```bash
composer require proxeuse/fortify-tabler
```

Once installed, please run the installer using the following PHP artisan command. The installer will take you through the installation process and ask you some questions.

```bash
php artisan tabler:install
```

Please do not forget to run the `php artisan migrate` command after the successfull installation!

<a name="update"></a>

## Update Instructions

You are able to perform certain updates using the built in updater. This updater will try to override certain files which are included in a new release. Please note that changes applied to those files will be discarded and you should make sure your changes are safe.

Firstly, make sure that you update all files from the repository. This can be done by running the following command or by copying the contents of the repository to your `/vendor/proxeuse/fortify-tabler/` folder.

```bash
composer update
```

Once succeeded, you should run the built in update command. You're able to choose between a couple of different updates. 

```bash
php artisan fortify:update
```

The command above will update all files, it functions the same as the `--type=full` command. All of other the options are listed below:

| Command                                         | Action                                                                               |
|-------------------------------------------------|--------------------------------------------------------------------------------------|
| `php artisan tabler:update --type=full`         | This will override all files originally installed by the installer.                  |
| `php artisan tabler:update --type=views`        | This will override all views which are used by the installer.                        |
| `php artisan tabler:update --type=language`     | This will replace the language files with updated ones.                              |
| `php artisan tabler:update --type=controllers`  | This will update the controllers which are used by the package.                      |
| `php artisan tabler:update --type=public`       | This will update all public resources, including for example `.css` and `.js` files. |

### Set session driver to database

This package features a function for users to force-logout devices from their account. In order for this function to work you'll need to have set the session driver to database. This can be done by chaning the `SESSION_DRIVER` variable in the `.env` file to `database`. A part of the file will look like the one below. In this example the session lifetime is set to 5 days instead of the default 2 hours.

```bash
BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=database
SESSION_LIFETIME=7200
```

<a name="2fa"></a>

## Two Factor Authentication

For the 2FA to work, you'll need to perform some manual steps. Firstly, uncomment `Fortify::twoFactorChallengeView()` from your `/app/Providers/FortifyUIServiceProvider.php` file to register the view. Then, go to the `fortify.php` config file and make sure `Features::twoFactorAuthentication` is uncommented. Next, you'll want to update your User model to include the following:

```php
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;
    ...
```

<a name="mail-verification"></a>

## Mail Verification
To enable the email verification feature, you'll need to visit the FortifyUI service provider (`/app/Providers/FortifyUIServiceProvider.php`) and uncomment `Fortify::verifyEmailView()`, to register the view. Then, go to the fortify.php config file and make sure `Features::emailVerification()` is uncommented. Next, you'll want to update your User model to include the following:

```php
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    ...
```
This allows you to attach the verified middleware to any of your routes.

<a name="password-confirmation"></a>

## Password Confirmation
To enable the password confirmation feature, you'll need to visit the FortifyUI service provider (`/app/Providers/FortifyUIServiceProvider.php`) and uncomment `Fortify::confirmPasswordView()`, to register the view. This allows you to attach the `password.confirm` middleware to any of your routes.

<a name="update-user-profile-and-password"></a>

## Update User Profile and Password
To enable the ability to update user passwords and/or profile information, go to the `fortify.php` config file and make sure these features are uncommented:

```php
Features::updateProfileInformation(),
Features::updatePasswords(),
```

## Screenshot
<p align="center"><img  src="https://github.com/Proxeuse/fortify-tabler/raw/master/tabler-screenshot.png"></p>

## License

**fortify-tabler** is open-sourced software licensed under the [MIT license](LICENSE.md).
