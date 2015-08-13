# HGTR: Histoimmunogenetics Genotyping Test Registration

<a href="http://hgtr.b12x.org" target="_blank">Visit The HGTR Site</a>

A php web application with forms for entering metadata on genotyping tests and kits for histoimmunogenetics. The forms then generate xml files similar to the standard from the Genetic Testing Registry (GTR).

### Structure

##### Filesystem

[HGTR](HGTR) directory is the root directory for the web files. This implementation is being run on an AWS Elastic Beanstalk, which deploys it as a
PHP application, so it does not reveal other directories and only cares about this one root directory. On your local development, you can use an Apache server where the contents of the HGTR
directory are typically placed within the 'www' or 'htdocs' directory of a server. 

##### Database

[database](database) contains a SQL file that will construct all the tables and populate them with the data needed. A MySQL database was used and the SQL file will run cleanly when executed on a MySQL Database. 
You can name your database whatever you want, but you must edit your database.php to reflect this database name.

### Development and Deployment

If you fork this repository, you should create a 'development' directory within the [config directory](HGTR/application/config). In here, copy [config.php](HGTR/application/config/config.php) and [database.php](HGTR/application/config/database.php) and in your local development, CodeIgniter will use the configuration settings found within this folder, while GitHub will ignore that directory when you commit (it is in the .gitignore already).

In config.php, you will set such things as the base_url. CodeIgniter will try to auto-guess this or it will load 'localhost' if it cannot guess correctly or if you are working locally.

In database.php you will configure your database connection here.

In the main 'config' directory, routes.php is where you can redefine your default controller if you wish to do so.

Do not put any login credentials or private information into the files within the main 'config' directory, as a copy on GitHub would be public. 

In the implementation of this website, the local development is configured from within the '/development' directory and the production deployment is handling the configuration on the server. This repository is directly linked to our Jenkin's server, which writes over the config files with its own, and deploys its build to Amazon. This server is also listening for commits to the base master branch. Any push to it will initiate a new build on Jenkins automatically. This means the website is automatically updated whenever the repository is updated.

##### Local Development

When working with this code locally, I suggest running it on an Apache Server with PHP 5.2 installed and a MySQL database. There are integrated packages that will install all of this, ready-to-use, available for free. Many
 of them are listed [here](https://en.wikipedia.org/wiki/List_of_Apache–MySQL–PHP_packages)

### Understanding the code

This site was written in PHP on the [CodeIgniter Web Framework](http://codeigniter.com).
CodeIgniter is a PHP Framework that is loosely based on MVC (Models-Views-Controllers) or sometimes argued as PAC (Presentation-Abstraction-Control)

From CodeIgniter's site:

"MVC separates application logic from presentation. It permits your web page to contain minimal scripting since the presentation is separate from the PHP scripting.

The **Model** represents your data structures. Typically your model classes will contain functions that help you retrieve, insert, and update information in your database.

The **View** is the information that is being presented to a user. A View will normally be a web page, but in CodeIgniter, a view can also be a page fragment like a header or footer. It can also be an RSS page, or any other type of 'page'.

The **Controller** serves as an intermediary between the Model, the View, and any other resources needed to process the HTTP request and generate a web page."

* Models can be found [here](HGTR/application/models)
* Views can be found [here](HGTR/application/views)
* Controllers can be found [here](HGTR/application/controllers)

All of the files within the above directories are PHP, so any other languages, such as HTML or SQL, are wrapped within these php files.

Other libraries or filetypes used to help construct the views, such as javascript, css, or images, can be stored within the assets directory [here](HGTR/assets)

The default controller must be defined, it tells CodeIgniter which controller to load when the base_url is accessed. This means you define the homepage response by loading a specific controller file first.

A controller is called and then it communicates with the server, the database if necessary, and then loads a response. Outside of the default controller, the URI is also what is calling other controllers. The first parameter
 passed to the URI after the base_url is the class name, and it will call the index function of that controller. If there are more named functions within the class, a second URI segment can call those functions by name. This
 can also be setup to redirect any request to another function instead of index, and data can be sent in the URI segments as a POST to the controller.

In CodeIgniter, all the heavy work is being done within the controller and then it builds the presentation
to send a response to the user. This typically means loading a view. Multiple views can be loaded into one controller response, such as the header, the specific page for this controller response, and the footer. The view
may contain the HTML (and js and css, but it is best to link to these from the assets folder instead of including them directly in the view script). The controller can also send data to the view, and the view can 
use PHP to programtically access and display data, such as echoing it or looping through arrays. On the client end, this all ends up being one html page served to them.

The controller may get its data from a model. The model interacts with the database and controller. A controller will call a model to request some data, and the model has the query constructured to query the database 
and then return that data to the controller. Sometimes this happens everytime the controller is called, for data that is being used in the view immediately. Sometimes this is done after a form or POST to send data through
the controller, to the model and either insert, update, or request another response from the database and return that to the controller. 

In this site code, you can see examples where the form has drop-down fields that are populated from the database. First, a form selection is made which posts to the form controller. The form controller gets the posted input to determine
how to respond. It will load the appriorate view (the html form) for the POSTed value. It will also request specific data for that view from the model. 
* One approach would be for a kit form selection to call the Kit_model and ask for all the data to populate the drop-down fields. The form controller will then send this data to the view and load the view and echo the data into javascript variables to be used for the drop-down options.
* A better solution is what is being implemented now. The form is loaded immediately, and then uses an asynchronous method to load the data for the drop-down fields. The view loads with a javascript file, which makes ajax calls to the server.
The way it does this is by simply calling a URL that responds with the JSON data. This has been constructed by adding functions to the form controller, that when called by function name, will ask the model to query the database and return the data, then the controller encodes it into JSON format and sets the output. This means an AJax call can be made directly to this URL/controller from any view or js, and it will load the appropriate data.

As mentioned, the forms POST to a controller. So the form has an action attribute which specifies the URI to post to, which calls a controller and POSTs the data from the form to it. Within this controller, PHP functions are used
to build an xml structured file. It will use variables where user input is needed, and the form POST will provide the data for this. For repeating sections, they are pushed into an array which is looped through in the controller to append those elements in the XML as often as needed. At the end of the document build, a PHP function is used to force a download of the XML file to the client's machine.

##### Additional Libraries and Packages

The [jQuery](https://jquery.com/) library is loaded for the dynamic functionality of many pages.

[Bootstrap](http://getbootstrap.com/) is being used to make quick work of formatting and styling the site. The site uses the boostrap theme css, as well as the required boostrap css and js files. 

Buttons, icons, and some images are from [Font Awesome](http://fortawesome.github.io/Font-Awesome/).

The drop-down menus are being populated with data through Ajax calls that return data from the database. The drop-downs are then being constructed by [Selectize](http://brianreavis.github.io/selectize.js/).

The form will not allow a file to be downloaded until certain rules are met. This is being enforced with [jQuery Validation Plugin](http://jqueryvalidation.org/).

Repeating sections are using jQuery functions to append a templated HTML section that in some places will update the ID and Name with a count so functions can be reapplied or separate arrays can be POSTed with similar, but different,
 names.