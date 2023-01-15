# 1. How to build and run this application

This application allows users to submit their personal information such as name, date of birth (DOB), address, postcode and state. The state will be automatically filled based on the postcode entered by the user. The application uses AJAX to make calls to the server to retrieve the state and to submit the form. The application also uses PHP to handle the server-side logic and MySQL to store the data in a database.

## Prerequisites
- XAMPP
- PHP
- MySQL

## Installation
1. Download and install XAMPP on your computer.
2. Start the Apache and MySQL modules in XAMPP control centre.
3. Clone or download this repository to the `htdocs` folder located in the XAMPP installation directory. Please make sure to download or clone the repository as `directland`.
4. Open phpMyAdmin in a web browser by going to this URL `http://localhost/phpmyadmin`.
5. Create a new database called "test" in phpMyAdmin.
   ![Reference Image](/screenshot/createdb.JPG)
6. Import the `test.sql` file located in the root directory of this repository into the "test" database.
   ![Reference Image](/screenshot/importdb.JPG)
7. Open the application in a web browser by going to `http://localhost/directland/`. Note: it will run the 'index.php' file inside the 'directland' directory.
   
## Usage
1. Fill in the form with your personal information.
2. Enter the address and the postcode based on the given test cases:
   - Address: Jalan 1,2,3 OR Jalan 4,5,6 OR Jalan 7,8,9
   - Postcode: 35000 OR 50000 OR 80000
3. The state field will be automatically filled based on the postcode entered.
4. Click the "Submit" button to submit the form.
5. A message will pop up to confirm that the data has been submitted successfully.
6. To view the submitted data, go to phpMyAdmin and select the "test" database. The submitted data can be found in the "customer" table.

## Troubleshooting
- If the application is not loading, please ensure that the Apache and MySQL modules are running in XAMPP control center.
- If the "state" field is not being automatically filled, please ensure that the postcode entered is one of the 3 postcodes specified in the test cases.
- If the "Submit" button is not working, please ensure that the jQuery library is properly linked in the HTML file. You need an internet connection to your device.
- If the data is not inserted into the database, ensure that the database connection details in the PHP files are correct.

## Built With
- HTML, CSS, JavaScript, jQuery, PHP, MySQL
  
## Author
- Abdul Hakiim Rosli

# 2. Author's Assumption

- This application is a form that allows users to input their personal information such as Name, Date of Birth, Address, Postcode, and State.
- The State input field is disabled by default and will be automatically filled in based on the postcode entered by the user.
- The backend of the application is built using PHP and has two API endpoints: one for retrieving the state based on the postcode, and another for submitting and saving the user's input data.
- The application uses a MySQL database server to store the user's input data and has two tables: `Customer` and `Postcode`.
- The Customer table has columns for `id`, `name`, `dob`, `address`, and `postcode_id`. The Postcode table has columns for `id`, `state`, and `postcode`.
- The application uses jQuery and AJAX to handle the dynamic updates of the state input field and the submission of the form data.
- When the user clicks on the "Submit" button, the form data is sent to the "Submit/Save" endpoint via an AJAX call and is inserted into the database.
- The application has been tested and is able to handle 3 specific postcodes: 35000, 50000, and 80000.
- The application has a clean and user-friendly UI with appropriate styling for the form elements.
- The application uses XAMPP as the development environment and can be run by installing XAMPP, importing the database, and running the application on a web server such as Apache.

