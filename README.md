Ticket App Demo
===============

# About

Example install of my [Ticket Bundle](https://github.com/hackzilla/TicketBundle), for testing and debugging purposes.


# Installation

See [Setting up Permissions](http://symfony.com/doc/5.4/book/installation.html) for setting up the cache and log directories.

```
bin/console doctrine:database:create
bin/console doctrine:schema:create
bin/console doctrine:fixtures:load
```

# Testing Locally

This project can use the [symfony cli](https://symfony.com/download) to create a web server.

```
symfony serve
```


# Pull Requests

All pull requests considered.

At some point there is a plan to add tickets and messages to fixtures.
