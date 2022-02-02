<?php

namespace App\Entity;

use App\Repository\TicketMessageWithAttachmentRepository;
use Doctrine\ORM\Mapping as ORM;
use Hackzilla\Bundle\TicketBundle\Model\TicketMessageWithAttachment as BaseTicketMessageWithAttachment;

#[ORM\Entity(repositoryClass: TicketMessageWithAttachmentRepository::class)]
class TicketMessageWithAttachment extends BaseTicketMessageWithAttachment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
