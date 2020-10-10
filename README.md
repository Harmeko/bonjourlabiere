# bonjourlabiere

requirements: 
- yarn/npm
- php >=7.2.5

INSTALLATION

1. clone the project

2. cd to project directory

3. `composer install`

4. `php bin/console doctrine:schema:update --force`

5 `yarn encore prod`

6. `php -S 127.0.0.1:8000 -t public`

7. go to 127.0.0.1:8000 for the website


USAGE

- go to /register to add your first user

- go to your profile to add the first picture

- every user is an admin for ease of use but you should change that in Entity/User.php > getRoles()
