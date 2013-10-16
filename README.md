## This is an Invexp project code-source on GitHub.

### Application allows to calculate the efficiency of your project.
___

*Some API and Technical information:*

* You need to create an Apache virtual host for the application
* You need MongoDB
* Model classes

``` html

All classes for DB should be written like this: Mongo.Users.Fired.mng
Where
'Fired' is table (entity)
'.mng' is 'extension' (the type of data model, e.g. xml, mysql,mongodb etc.)
'Mongo.Users' are directories and subdirectories
```

* Controller classes

``` html

All classes for DB should be written like this: /user/register/checkLogin
Where
'checkLogin' is the function of a controller called to execute
'register' is the class of the controller (it originally named 'ControllerRegister' so the last word is taken)
'/user/../../' are directories and subdirectories within "Controllers" directory
```

*Other Info and Credentials*
``` html
Author: Egor Kolotaev
Technologies used: PHP, JS, CSS/HTML, MongoDB, Ajax, JQuery
Performed as a part of the thesis to degree
Date: june 2012
```
