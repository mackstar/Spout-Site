Spout-Site
==========

A website Skeleton for creating a spout app and contributing to the project.

## Checkout/Install and get Running
```
git clone git@github.com:mackstar/Spout-Site.git
cd Spout-Site
composer install
rm -rf vendor/mackstar/spout
composer install --prefer-source
./vendor/bin/spout install -e dev
php -S localhost:8080 -t var/www var/www/index.php
```

### Create your user account
```
curl -XPOST 'http://localhost:8080/api/users/index' -d '{
    "email": "email@example.com",
    "password": "secret",
    "name": "Your Name",
    "role": {
        "id": "1",
        "name": "Admin"
    }
}';
```

### Access the admin screen

```
http://localhost:8080/spoutadmin
```

## For JS/CSS dev

The following compliles and transports your JS/CSS
```
cd vendor/mackstar/spout
npm install
grunt watch
```

### JS/CSS files live in:
```
vendor/mackstar/spout/dist/spout-admin
```
