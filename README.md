Quote quiz
====================
This is a quote quiz game consisting of 10 questions. You can play in multiple choice, or yes/no format. 
It also provides statistics about the number of users and percentage of correct answers.

Technical decisions
====================

I decided to use Element IO because I am familiar with this library and it provides useful front-end features like flexible layout and out of the box styling.

I have created separate tables for quotes and authors. 
This way I can add authors that don't have any quotes and use them as answers. 
If an author has several quotes it won't be necessary to duplicate the authors info in the db.

For the statistics I decided against creating an individual db record for every answer, as we only need simple statistics. 
I created an initial table with default values and update them as a new user plays the game.


Getting started
====================

To set up the project run `composer install` in the terminal.
Update the .env file with your database config.
Run `npm install`.
Run `php artisan migrate`.
Run `php artisan db:seed`.

