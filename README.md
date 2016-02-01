Ticket App Demo
===============

# About

Example install of my [Ticket Bundle](https://github.com/hackzilla/TicketBundle), for testing and debugging purposes.


# Installation

See [Setting up Permissions](http://symfony.com/doc/3.0/book/installation.html) for setting up the cache and log directories.

```
app/console doctrine:database:create
doctrine:migrations:migrate
app/console doctrine:fixtures:load
```

# Using

```
app/console server:run
```


# Pull Requests

All pull requests considered.

At some point there is a plan to add tickets and messages to fixtures.
