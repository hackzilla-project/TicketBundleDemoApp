<?php

namespace App\Entity;

use App\Repository\TicketMessageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Hackzilla\Bundle\TicketBundle\Model\MessageAttachmentInterface;
use Hackzilla\Bundle\TicketBundle\Model\MessageAttachmentTrait;
use Hackzilla\Bundle\TicketBundle\Model\TicketMessageInterface;
use Hackzilla\Bundle\TicketBundle\Model\TicketMessageTrait;

#[ORM\Entity(repositoryClass: TicketMessageRepository::class)]
class TicketMessage implements TicketMessageInterface, MessageAttachmentInterface
{
    use TicketMessageTrait;
    use MessageAttachmentTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text', nullable: true)]
    private $message;

    #[ORM\Column(type: 'integer', nullable: false)]
    private $status;

    #[ORM\Column(type: 'integer', nullable: false)]
    private $priority;

    #[ORM\Column(type: 'datetime', nullable: false)]
    private $createdAt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $attachmentName;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $attachmentSize;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $attachmentMimeType;

    #[ORM\ManyToOne(targetEntity: Ticket::class, inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    private $ticket;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $user;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
