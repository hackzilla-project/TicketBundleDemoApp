<?php

namespace App\Entity;

use App\Repository\TicketWithAttachmentRepository;
use Doctrine\ORM\Mapping as ORM;
use Hackzilla\Bundle\TicketBundle\Model\Ticket as BaseTicketWithAttachment;

#[ORM\Entity(repositoryClass: TicketWithAttachmentRepository::class)]
class TicketWithAttachment extends BaseTicketWithAttachment
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column(type: 'integer')]
    // protected $id;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }
}
