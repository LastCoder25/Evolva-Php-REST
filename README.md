# ci_rest : CodeIgniter as a Rest server

CI_rest is based on the PHP framework CodeIgniter,  version 3.1.x.  

CI_rest uses the different functionalities offered by CodeIgniter to make a RestFul server.

CI_rest is not an extension for CodeIgniter or a adaptation. 

More info on CodeIgniter [official](https://codeigniter.com/) page and on [github](https://github.com/bcit-ci/CodeIgniter). 

# Requirements 
* Php >= 5.6.x
* A database, MySQL > 5.x or PostgreSQL 

#How to ? 
## Define your database
Go to config.database.php to enter database name, access, etc. 

## Define the routes
Define all the route in application/config/routes. 

The routes are not required to have the same name than the controllers

## Write Controllers
Your controllers will extract data from json and transmit it to Models. 

## Access your database : set Models 
Access the data in the database.

#TODO 
  * Securize access in GET, POST, DELETE, etc by session or authentification.
  * create html view to display API Rest documentation.
