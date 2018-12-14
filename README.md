# FAQ

To run the FAQ project:
1. git clone https://github.com/NJIT-WIS/faq.git
2. CD into FAQ and run composer install
3. cp .env.example to .env
4. run: php artisan key:generate
5. setup database / with sqlite or other https://laravel.com/docs/5.6/database
6. Run: php artisan migrate
7. Run: unit tests: phpunit
8. Run: seeds php artisan migrate:refresh --seed

#EPIC:
 
 ##Real time push notifications implementation
The new feature added to the existing FAQ project is creating real time push notifications without the need to refresh the webpage. Notifying a user that something of interest has happened is one of the first and most fundamental use cases for real-time web technology. Pusher is a hosted service that makes it super-easy to add real-time data and functionality to web and mobile applications.
I have used Laravel Echo, Pusher js and Vue js, inorder to create real-time notifications feature for the website. Laravel provides support for sending notifications across a variety of delivery channels, including mail, SMS (via Nexmo), and Slack. Notifications may also be stored in a database so they may be displayed in your web interface.

The real-time notifications feature works in such a way that if a user comments under any post, a notification is updated on the website automatically without the need of refreshing the webpage and when a user clicks on the notification bar it shows “someone has commented on a post” and redirects to the post under which that comment is posted. When no comment is posted, the notification bar shows “There is no new notification”. The user can create a post with title limited to atleast 6 characters and content which is limited to atleast 20 characters and will be able to comment under that post. After a post is created, it shows the message “A new post was successfully created” and the user can see all the posts created, in a tabular form where it shows the title and content and the day on which it is created. After clicking on the showpost button, the user can view the post and at first it shows “no comments”. The user can then create a comment and click on “comment” button and will be able to get back to the previous page by clicking on “go back” button. At this stage the user will be able to see that a new notification is updated as the notification bar shows “1” at its place and by clicking on that bar, a dropdown will appear saying that someone has commented on the post and you can click on the notification updated and it will redirect you to the post under which a comment is been posted. This way the feature is very reliable as you don’t need to refresh it every time to check for a new notification update.

###### Getting Started 

Installing the Pusher PHP library:
composer require pusher/pusher-php-server

Installing the Laravel Frontend Dependencies (these include Bootstrap, Axios, Vue.js and a couple of other things which are nice to have):
npm install

Installing Laravel Echo and Pusher-js which we will use to listen for broadcast events:
npm install -S laravel-echo pusher-js

###### Sign up for Pusher

Sign up for a free Pusher account via pusher.com/signup.
Once you've done that you'll land within an "App Keys" page for your application. For this workshop all you need to do is take a note of the "App Credentials". These are:
•	app_id
•	key
•	secret

######  Add the Pusher credentials to.env

When the Laravel application was created a.env file will also have been created in the   root of the app.
Take the Pusher credentials we noted down earlier (app_id, key and secret) - or you may even have a browser tap still open on the App Keys section of your app in the 

Pusher dashboard - and add them to the.env file:
PUSHER_APP_ID=YOUR_APP_ID
PUSHER_KEY=YOUR_APP_KEY
PUSHER_SECRET=YOUR_APP_SECRET

Finally, we will configure Echo to use Pusher. We do that by uncommenting and editing the values at the bottom of resources/assets/js/bootstrap.js:

// ./resources/assets/js/bootstrap.js

import Echo from "laravel-echo"

 window.Echo = new Echo({
     broadcaster: 'pusher',
     key: 'your_pusher_key'
});

