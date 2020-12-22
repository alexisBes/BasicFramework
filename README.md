# BasicFramework
## Configuration
### Developement
Add a dev.ini file in the root folder of The framework with 
 * a dns to acess to your database,
 * a user 
 * his password.
The file have to looks like this :
```ini
[BD]
info : 'mysql:host=localhost;dbname=name_of_my_database;charset=utf8'
user : ;username
password : ;password
```

### Production
Add a prod.ini file in the root folder with all the information ask above.