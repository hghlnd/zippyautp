# zippyauto
Project Overview
You will build a PHP web application for a client called Zippy Used Autos.

Database Setup
Create a database called zippyusedautos.
The database should have four tables: vehicles, makes, types, and classes.
Use foreign keys to connect these tables.
The attached Excel file contains Zippy's vehicle inventory data for you to import.


Zippy used auto Sample Data


Public Homepage
Display all vehicles when the page loads, sorted from most expensive to least expensive.
Add an option for users to change the sort order to year (descending) or back to price.
Provide dropdown menus so users can filter by make, type, or class (one filter at a time).
Display only one category filter at a time; combining filters is not required.
Zippy’s Admin Backend
Create an admin area in a folder called admin. The admin URL should end with /admin/.
The admin homepage should list all vehicles, similar to the public view, but with an option to delete vehicles.


Create separate pages for:

Adding and deleting makes
Adding and deleting types
Adding and deleting classes
Adding new vehicles
The admin area should not be linked to the public homepage. We will only provide Zippy with the URL to this page.

Project Design
Follow the MVC design pattern.
Use multiple controllers to handle different sections of the application.


Example:

controllers/makes.php for managing makes
model/makes_db.php for database logic
view/makes_list.php for displaying makes
Organizing your code this way will improve its structure and maintainability.
