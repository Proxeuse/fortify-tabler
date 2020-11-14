<p align="center"><img width="400" src="https://github.com/Proxeuse/fortify-tabler/raw/master/fortify-tabler.png"></p>

# Introduction

**Tabler.io** is a framework based on Bootstrap. This repository is a Laravel Fortify UI preset which should be used in combination with [FortifyUI](https://github.com/zacksmash/fortify-ui). This preset includes the Tabler.io assets for [release 1.0.0-alpha.7](https://github.com/tabler/tabler/releases/tag/1.0.0-alpha.7).

- [Requirements](#requirements)
- [Installation](#installation)

<a name="requirements"></a>
## Requirements

This package requires Laravel Fortify and FortifyUI. Installing [*FortifyUI*](https://github.com/zacksmash/fortify-ui) will automatically install and configure Laravel Fortify for you, so you may start there.

<a name="installation"></a>
## Installation

To get started, you'll need to install **fortify-tabler** using Composer.

```bash
composer require proxeuse/fortify-tabler
```

Next, you'll need to run the install command:

```bash
php artisan fortify-ui:tabler
```

This command will publish **fortify-tabler's** views and resources to your project.

- All `auth` views
- Other files...

<p align="center"><img  src="https://github.com/Proxeuse/fortify-tabler/raw/master/tabler-screenshot.png"></p>

## License

**fortify-tabler** is open-sourced software licensed under the [MIT license](LICENSE.md).
