# Upsun Project Status

The goal of this project is to provide an hosted application for Upsun or Platform.sh users to check the live status of a project based on activities.

You can use the app directly on `https://status.woop.ly/api/`. 

## Install the application

### Local development

It requires `redis` and `pgsql` (or any Eloquent relational database). The best way to run it is through Laravel Sail. 

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

### Test payloads

You can test the app by using the payloads in `examples`:

```
curl -X POST -H "Accept: application/json" -H "Content-Type: application/json" -d @examples/redeploy-pending.json http://status.test/api/ | jq
curl -X POST -H "Accept: application/json" -H "Content-Type: application/json" -d @examples/redeploy-progress.json http://status.test/api/ | jq
curl -X POST -H "Accept: application/json" -H "Content-Type: application/json" -d @examples/redeploy-complete.json http://status.test/api/ | jq
```

To query the availability status, use:

```
curl -X GET -H "Content-Type: application/json" https://status.woop.ly/api/z3zxy3oknvllq/main | jq
```

### Debugging

If you need to look into what is happening, Telescope is installed.

Update the environments variables with the following:

```
APP_ENV => local
APP_DEBUG => true
```

You will then be able to access the `/telescope` endpoint.

## Use the hosted instance

Add a `webhook` integration on your Platform.sh or Upsun project with the following target: `https://status.woop.ly/api/`.

### Integration settings

`URL`: https://status.woop.ly/api/
`Shared key`: whatever-you-want
`Excluded environments to not execute the hook on`: empty
`States to report`: `pending,in_progress,complete`
`Included environments`: `*`
`Events to report`: `*`

### Testing

After the integration is ready, you can query the following endpoint to get the availability of the environment:

`https://status.woop.ly/api/<project-id>/<environment-name>`