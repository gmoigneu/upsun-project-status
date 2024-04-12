# Upsun Project Status

The goal of this project is to provide an hosted application for Upsun or Platform.sh users to check the live status of a project based on activities.

You can use the app directly on `https://status.woop.ly/api/`. 

## Set this app

### Local development

```
composer install
vendor/bin/sail up
vendor/bin/sail php artisan migrate
```

### Upsun deployment

```
upsun project:create
upsun push
```

## Use the app

Add a `webhook` integration on your Platform.sh or Upsun project with the following target: `https://status.woop.ly/api/`.

After the integration is ready, you can query the following endpoint:

`https://status.woop.ly/api/<project-id>/<environment-name>`