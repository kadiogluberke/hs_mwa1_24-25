# personal portfolio project
Example project for the BCN MWA 1 class of 2024-25

## Instructor 
- [bluePundit](https://bluepundit.eu) - Nico Deblauwe ([@ndeblauw](https://www.github.com/ndeblauw))

## Author 
- [demo](https://berkekadioglu.harbourspace.site/) :smile: - Berke Kadioglu ([@kadiogluberke](https://github.com/kadiogluberke))

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

## Potential Improvments 
- menu should be made suitable for mobile 
- footer should be edited 
- Controllers and actions for Projects, Articles and Skills 
- delete and re-install application in new directory for checking ready for prodution or not 
- Maybe Pagination for skills, taks, articles and projects 
- Maybe filters for skills etc.
- There should be only one user so after deploy register route should be deleted 
- Maybe Implementing rich text 
- Maybe Language change 

## Bugs 
There are small bugs in the website 
- Grade label is displayed whether there is a grade or not.  -->  [fix](https://github.com/kadiogluberke/hs_mwa1_24-25/commit/297f3a4b8c6e5fda7c1ae4dba49f86c2835960c7) 
- If Finish Date is empty, it takes 'Present' string but because of casting it seems as present's date --> [fix](https://github.com/kadiogluberke/hs_mwa1_24-25/commit/acbe9472aca39571600e72f02e4f1d86a0ee6c12)
- When you return to work edit from after editing, creating or deleting tasks, there will be no flash 
- Work Edit Form quite strange because of Html does not allow Nested Forms 