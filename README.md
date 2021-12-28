# Priki

Priki is a project for ES dev technician formation, in the context of the module PRW2.

![GitHub tag (latest SemVer)](https://img.shields.io/github/v/tag/yannickcpnv/Priki?label=Version)

## Requirements

| Tools                                         | Version           |
|-----------------------------------------------|-------------------|
| [PHP](https://www.php.net/downloads.php)      | 8.0.10            |
| [Composer](https://getcomposer.org/download/) | 2.1.9             |
| [MariaDB](https://mariadb.org/download/)      | 10.5.9-MariaDB    |
| [Npm](https://nodejs.org/en/download/)        | 8.3.0             |

You can use the MySQL version equivalent instead of MariaDb.

## Dependencies

This is a Laravel project, so there is a lot of them from Laravel that you can see in the `composer.josn` file.

Other dependencies that was manually added can be found in files :

- `composer.json` for composer.
- `package.json` for npm.

## Installation

```shell
git clone https://github.com/yannickcpnv/Priki.git
composer setup
```

## Usage

The new `.env` file is a copy of `.env.example`. Change it for you needs, basic changes often `DB_*` variables.

## Test

There is no tests for the moment.
