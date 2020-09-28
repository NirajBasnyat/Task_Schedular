# About Project

### It's a simple program that allows to add cron jobs and schedules dynamically.

# Installation Process

1. Download or clone using git
2. `composer install`
3. `npm install`
4. `cp .env.example .env`
5. `php artisan key:generate`
6.  fill in your env with credentials
7.  `php artisan migrate`
8.  `php artisan serve`

# How to check the system functionality?!

#### 1. Create a **test.php** file with content
    
    
    	<?php
          echo "This is a test"; 
          sleep(random_int(3,5));
          echo "Test completed";
    	?>
 then create a new task with command
 
 **cd path to test.php file**
 
 **ex-command:** *cd F:/cronFolder then run php **test.php** (in terminal to test the script)* 

        
### 2. OR create a artisan command using 

**php artisan make:command testCommand**

 *in app>console>commands>testCommand.php*
 
   *change signature to* **testCommand:run** 
   
   Add in handle function test code given below and 
  then `php artisan testCommand:run` to run code manually
    or `php artisan schedule:run` to run code with this app
   
         
         {
             $this->line("This is test command");
             sleep(random_int(3,5));
             $this->line("Test command Executed");
         }
         
### 3. Important step ADD this to the cron tab to automate the task.

    * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1           

