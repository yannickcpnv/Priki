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

This is a Laravel project, so there is a lot of them from Laravel that you can see in the `composer.json` file.

Other dependencies that was manually added can be found in files :

- `composer.json` for composer.
- `package.json` for npm.

## Installation

1. `git clone https://github.com/yannickcpnv/Priki.git && cd Priki`
2. `composer setup`
3. The new `.env` file is a copy of `.env.example`. Change it for you needs, specially the variables `DB_*`.
4. When you update the file, create the database for the project. The name need to be the same as mentioned in
   the `.env`
   file.
5. `composer m:f-s`

You will now have all the dependencies installed, the public files compiled and a database with some data.

## Usage

```shell
composer serve
```

## Test

There is no test for the moment.
