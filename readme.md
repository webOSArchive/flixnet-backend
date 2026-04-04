# Flixnet Service

This service has been superseded by a self-contained client. The app now bundles all movie and genre data locally and no longer depends on a live backend. This repository is kept running only to serve a graceful deprecation message to users who still have the old client installed.

The client repository is here: [Flixnet Client](https://github.com/webOSArchive/enyo1-flixnet).

## What's still running

### /api/movies and /api/genres

Both endpoints return a single hardcoded stub record directing old-client users to update their app. No database required.

### index.php

Public-facing landing page linking to the app download.

## Refreshing the bundled movie data

If the movie catalog ever needs to be updated, the app's `data/movies.json` and `data/genres.json` can be regenerated from the database using the export script.

### Requirements

- MySQL/MariaDB with the `flixnet` database still populated
- A `secrets.php` file in this directory (see `secrets-example.php`)

### Steps

1. Copy `secrets-example.php` to `secrets.php` and fill in your database credentials
2. Deploy `utils/export-app-data.php` to the server (it requires `database.php` to be present alongside it)
3. From the `enyo1-flixnet` directory, run:

```
sh fetch-fallback-data.sh
```

This will overwrite `enyo-app/data/movies.json` (full export with genre associations) and `enyo-app/data/genres.json`.

## Historical note

The original service stored movie metadata imported from TMDB and [cinedantan](https://github.com/casbah-ma/cinedantan/), with movie files hosted on Archive.org. The database schema, import tooling, and filtered API endpoints have been removed. The last exported snapshot of the data is bundled with the client app.
