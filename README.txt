This is a very simple, straight forward little CRUD app ... unfortunately it's all I had time for.
There is however a tiny chatGPT component, it's quite fun to play with .. just please don't generate more than 3 or 4 posts  :-)

!!! In order for the chatGPT functionality to work, please paste the below key into config/app.php !!!


In order to run the app, please follow the steps below:
(please note this was run on a windows machine with Laragon and DBeaver, using MailTrap to test emailing)

Please remember to run 'composer install' and 'npm install'

Also, remember to run 'php artisan key:generate'

Create a Database (I simply called mine 'people') -> remember to point your .env to it.

Run 'php artisan migrate:fresh --seed' (this will create all the necessary tables and data for you)
Run 'php artisan serve' (this should direct you to the registration page when opening your localhost)

You can register a new user, but to make use of the seeded data, please login as the user.
I've set the seeders to create only one user, so all the data will point to it.
Username:  The seeded email address of the user
Password:  password

In order to kick off the emailer, you must create a contact manually.

Sadly I wasn't able to get around to everything I wanted to, so the app may seem slightly disjointed, and the architecture is near none existant.
The routes are secure though, and the app does the necessary CRUD functionality on the contacts, and sends an email.