# Laravel 9 Showcase

[![Tests](https://github.com/vlasscontreras/laravel-9/actions/workflows/tests.yml/badge.svg)](https://github.com/vlasscontreras/laravel-9/actions/workflows/tests.yml)
[![Static Analysis](https://github.com/vlasscontreras/laravel-9/actions/workflows/static.yml/badge.svg)](https://github.com/vlasscontreras/laravel-9/actions/workflows/static.yml)
[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?style=flat)](https://github.com/vlasscontreras/laravel-9/blob/main/LICENSE.md)
[![PHPStan Enabled](https://img.shields.io/badge/PHPStan-level%208-brightgreen.svg?style=flat)](https://github.com/vlasscontreras/laravel-9/actions/workflows/tests.yml)

## 👀 About Laravel

Laravel is a web application framework with expressive, elegant syntax. I've created this sample/test/basic/shallow repository to test and showcase some of the hotest features of Laravel in its 9th major release.

## 📦 Installation

1. Install the dependencies (you will need Docker installed in your machine, PHP is not necessary on your host):

```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

2. Spin up the container:

```sh
./vendor/bin/sail up -d
```

3. Copy the `.env.example` file and generate an encryption key:

```sh
sail composer run-script post-root-package-install
sail composer run-script post-create-project-cmd
```

4. Run the tests:

```sh
sail artisan test --coverage --min=85
```

Feel free to sneak around and open PRs to demonstrate some more new features 😁.

## 📄 License

The Laravel framework and this repository are open-sourced projects licensed under the [MIT license](https://opensource.org/licenses/MIT).
