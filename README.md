# Abel_Construction™

[![Release](https://img.shields.io/github/v/release/Abel_Construction/Abel_Construction?label=release)](https://github.com/Abel_Construction/Abel_Construction/releases)
![Downloads](https://img.shields.io/github/downloads/Abel_Construction/Abel_Construction/total?label=downloads)
[![Translations](https://badges.crowdin.net/Abel_Construction/localized.svg)](https://crowdin.com/project/Abel_Construction)
[![Tests](https://img.shields.io/github/actions/workflow/status/Abel_Construction/Abel_Construction/tests.yml?label=tests)](https://github.com/Abel_Construction/Abel_Construction/actions)
[![License](https://img.shields.io/github/license/Abel_Construction/Abel_Construction?label=license)](LICENSE.txt)

Abel_Construction is a free, open source and online accounting software designed for small businesses and freelancers. It is built with modern technologies such as Laravel, VueJS, Tailwind, RESTful API etc. Thanks to its modular structure, Abel_Construction provides an awesome App Store for users and developers.

* [Home](https://Abel_Construction.com) - The house of Abel_Construction
* [Forum](https://Abel_Construction.com/forum) - Ask for support
* [Documentation](https://Abel_Construction.com/hc/docs) - Learn how to use
* [Developer Portal](https://developer.Abel_Construction.com) - Generate passive income
* [App Store](https://Abel_Construction.com/apps) - Extend your Abel_Construction
* [Translations](https://crowdin.com/project/Abel_Construction) - Help us translate Abel_Construction

## Requirements

* PHP 8.1 or higher
* Database (eg: MySQL, PostgreSQL, SQLite)
* Web Server (eg: Apache, Nginx, IIS)
* [Other libraries](https://Abel_Construction.com/hc/docs/on-premise/requirements/)

## Framework

Abel_Construction uses [Laravel](http://laravel.com), the best existing PHP framework, as the foundation framework and [Module](https://github.com/Abel_Construction/module) package for Apps.

## Installation

* Install [Composer](https://getcomposer.org/download) and [Npm](https://nodejs.org/en/download)
* Clone the repository: `git clone https://github.com/Abel_Construction/Abel_Construction.git`
* Install dependencies: `composer install ; npm install ; npm run dev`
* Install Abel_Construction:

```bash
php artisan install --db-name="Abel_Construction" --db-username="root" --db-password="pass" --admin-email="admin@company.com" --admin-password="123456"
```

* Create sample data (optional): `php artisan sample-data:seed`

## Contributing

Please, be very clear on your commit messages and pull requests, empty pull request messages may be rejected without reason.

When contributing code to Abel_Construction, you must follow the PSR coding standards. The golden rule is: Imitate the existing Abel_Construction code.

Please note that this project is released with a [Contributor Code of Conduct](https://Abel_Construction.com/conduct). By participating in this project you agree to abide by its terms.

## Translation

If you'd like to contribute translations, please check out our [Crowdin](https://crowdin.com/project/Abel_Construction) project.

## Changelog

Please see [Releases](../../releases) for more information what has changed recently.

## Security

Please review [our security policy](https://github.com/Abel_Construction/Abel_Construction/security/policy) on how to report security vulnerabilities.

## Credits

* [Denis Duliçi](https://github.com/denisdulici)
* [Cüneyt Şentürk](https://github.com/cuneytsenturk)
* [All Contributors](../../contributors)

## License

Abel_Construction is released under the [GPLv3 license](LICENSE.txt).
