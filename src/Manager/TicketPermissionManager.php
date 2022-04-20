<?php

namespace App\Manager;

use Hackzilla\Bundle\TicketBundle\Manager\PermissionManagerInterface;
use Hackzilla\Bundle\TicketBundle\Manager\PermissionManagerTrait;

class TicketPermissionManager implements PermissionManagerInterface
{
    use PermissionManagerTrait;
}
