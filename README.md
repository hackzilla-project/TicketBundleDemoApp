Ticket App Demo
===============

# About

Example install of my [Ticket Bundle](https://github.com/hackzilla/TicketBundle), for testing and debugging purposes.


# Installation

See [Setting up Permissions](http://symfony.com/doc/2.7/book/installation.html) for setting up the cache and log directories.

```
app/console doctrine:database:create
doctrine:migrations:migrate
app/console doctrine:fixtures:load
```
