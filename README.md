# painterapi

> painterapi

## Build Setup For Ubuntu

``` bash
# install web server
sudo apt install nginx

# copy config file
sudo cp painterapi.nginx.conf /etc/nginx/sites-enabled/

# rename config file
sudo mv /etc/nginx/sites-enabled/painterapi.nginx.conf /etc/nginx/sites-enabled/painterapi

# change the server_name from api.localhost to whatever you want to use in the config file

# add the server_name to your hosts file in /etc/hosts

# restart nginx
sudo service nginx restart

# install composer
see: https://getcomposer.org/download/

# install dependencies
composer install

# create database table

# update database schema
php artisan migrate

# create .env file
cp .env.default .env

# edit .env file

# create oauth clients
php artisan passport:install

# edit vue store
# go to the file src/classes/Store.js in the frontend vue project and edit the parameters in it, 
# you can find the client_id and client_secret in the oauth_clients table (client_id is most likely 2, the password client)
```
