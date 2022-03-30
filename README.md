# Web Security: SQL Injection

The purpose of this project is to demonstrate to our Web Security class how to combat SQL injection using PDO in PHP.

# Set up Locally

1. Install AMPPs

## Database

1. Launch the AMPPS dashboard
2. Under the "Database Tools" section select `phpMyAdmin` and login. The default login credentials are username: `root` password: `mysql`
3. Once you're logged in click on the `Databases` tab and create a new database
   - Name the database `CST8265`
   - Press the create button
4. Once you've created the database import the `db_setup_script` script
   - Click on your database then click on the `Import` tab
   - Under `File to import` click on the `Choose File` button then select the `db_setup_script` located in the root folder
   - Click on the `Go` button in the bottom right hand corner
5. Once you've imported the SQL script create a new database user
   - Click on your database then click on the `Privileges` tab
   - Click on the `Add user account` link
   - Assign the following follows in the input fields:
     - User name (`Use text field` dropdown option): `PHPSCRIPT`
     - Host (`Local` dropdown option): `localhost`
     - Password (`Use text field` dropdown option): `1234`
   - Under `Database for user` select `Grant all prvileges on database`
   - Under `Global Privileges` select all of the checkboxes under `Data`
   - Scroll down the page and press the `Go` button
