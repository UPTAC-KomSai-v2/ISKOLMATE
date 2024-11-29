# ISKOLMATE

CMSC-127 Machine Problem Project

## Environment Setup

Install git if you don't have it yet. If you are on windows you can do so via [git-scm.com](https://git-scm.com/downloads/win).

Visit [php.new](https://php.new/) and select your specific operating system.

Follow the instructions on the site to install everything needed for Laravel development.

Next visit [nodejs.org](https://nodejs.org/en/download/prebuilt-installer) and download version `v22.11.0(LTS)` for your specific operating system.

## Setting up this repository

Open a terminal/powershell in this folder and run these commands:

```sh
composer install
npm install
npm run build
```

Then make a copy of `.env.example` and rename it to `.env`. Change the values to match your database setup (port, username, password, etc)

Finally run these commands, make sure to say yes when asked:

```sh
php artisan key:generate
php artisan migrate
```

## Running a development server

Open a terminal/powershell in this folder and run `composer run dev`

## Troubleshooting

If you face issues running the Laravel dev server, you may need to change your `php.ini` file.

Change the line `variables_order = "EGPCS"` to `variables_order = "GPCS"`.

You can find the `php.ini` file in this path on windows: `C:\Users\<USER>\.config\herd-lite\bin\php.ini`.