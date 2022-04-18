<?php

namespace App\Service;

use Hackzilla\Bundle\TicketBundle\Manager\PermissionManagerInterface;
use Hackzilla\Bundle\TicketBundle\Manager\PermissionManagerTrait;

class TicketPermissionService implements PermissionManagerInterface
{
    use PermissionManagerTrait;
}
