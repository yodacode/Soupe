# Soupe
## Installation
### 1) Install BDD

You can import datas
**[BDD](https://github.com/yodacode/Soupe/blob/master/places.sql)** for REST and comments.xml for SOAP

````
sudo chmod 777 comments.xml
````

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

## Requests
### REST

#### Get places (GET)
* http://rest.dev/rest/server/places/  
* http://rest.dev/rest/server/places?id=X 
* http://rest.dev/rest/server/places?town_id=X

#### Delete place (DELETE)
* http://rest.dev/rest/server/deletePlace/?id=X


#### Add place (POST)
* http://rest.dev/rest/server/addPlace


**Params:** 

* STRING : 	'name'
* STRING : 	'address'
* STRING : 	'description'
* INT: 		'longitude'
* INT:  	'latitude'
* INT : 	'town_id'

#### Get Towns (GET)
* http://rest.dev/rest/server/towns

#### Get Countries (GET)
* http://rest.dev/rest/server/countries


### SOAP
#### Get comments (GET)
* http://rest.dev/app/ajax/get-comments.php

#### Add comment (POST)
* http://rest.dev/app/ajax/add-comment.php

**Params:** 

* STRING : 	'author'
* STRING : 	'content'
* STRING : 	'rate'
* INT: 		'place_id'


