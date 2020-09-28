<?php

use Illuminate\Support\Facades\Route;


/*     
   TO TEST

   1) create a test.php file with content
    <?php
        echo "This is a test";
        sleep(random_int(3,5));
        echo "Test completed";
    ?>    

    then create a new task with command cd <path to test.php file> 
        ex-command: cd F:/cronFolder && php test.php 

    2) OR create a artisan command using php artisan make:command testCommand 
         in app>console>commands>testCommand.php
         change signature to testCommand:run
         add in handle function 
         {
             $this->line("This is test command");
             sleep(random_int(3,5));
             $this->line("Test command Executed");
         }

    then php artisan testCommand:run to run code manually
    and php artisan schedule:run to run code with this app

    3)important step ADD this to the cron tab to automate the task
    * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1  
    
    //Note "* * * * *" represents cron expression in this case "run every minute" 

*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// task routes
Route::put('/tasks/{task}/toggle', 'TaskController@toggle')->name('tasks.toggle');
Route::resource('/tasks', 'TaskController');

Route::get('/home', 'HomeController@index')->name('home');
