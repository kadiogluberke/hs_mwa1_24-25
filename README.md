# personal portfolio project
Example project for the BCN MWA 1 class of 2024-25

## Instructor 
- [bluePundit](https://bluepundit.eu) - Nico Deblauwe ([@ndeblauw](https://www.github.com/ndeblauw))

## Author 
- [portfolio](https://berkekadioglu.harbourspace.site/) :smile: - Berke Kadioglu ([@kadiogluberke](https://github.com/kadiogluberke))

## Requirements
This project uses
- [Laravel 11](https://laravel.com/docs/11.x/releases)

## Environment Variables
Nothing but the normal ones

## Dev Installation instructions
- Create a directory for the project and cd into it
- Clone the project into this directory (`git clone https://github.com/kadiogluberke/hs_mwa1_24-25.git  .`)
- run `composer install`
- Create a .env for your dev environment: `cp .env.example .env` and adjust the settings (local domain, database, etc)
- Set the encryption key in the .env: `php artisan key:generate`
- if using sqlite: do execute `touch database/database.sqlite`
- and then migrate the tables: `php artisan migrate`
- and then seed date: `php artisan db:seed`.

## Editing Website
- In order to editing website you need to login 
- Go to the page with url `/login`
- Email: test@example.com
- Password: password 
- After logged in you can edit your personal information and also other items like educations, works and tasks