# Soupe
## Installation
### 1) Install BDD

You can import datas with this dump
**[BDD](https://github.com/yodacode/Soupe/blob/master/places.sql)**


### 2) Create a virtualhost
````
rest.dev
````
### 3) Edit config.php
Set the constant fullhost, according to your virtualhost

````
define("FULL_HOST", 'http://rest.dev/');
````

Configure your Database

````
define('DB_DNS', 'mysql:host=localhost;dbname=places');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
````

### 4) Edit /app/js/App.js

Set the constant host, according to your virtualhost

````
Config.host = 'http://rest.dev';
````

## Lauch the Application
````
http://rest.dev/app
````


## WSDL & XSD

**[http://rest.dev/soap/server/server.php?wsdl](http://rest.dev/soap/server/server.php?wsdl)**

**[http://rest.dev/soap/data/shema.xsd](http://rest.dev/soap/data/shema.xsd)**

