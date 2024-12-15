<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use DateTimeInterface;
use DateTime;
use App\Repository\TicketMessageRepository;
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
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    #[ORM\Column(type: Types::INTEGER, nullable: false)]
    private int $status;

    #[ORM\Column(type: Types::INTEGER, nullable: false)]
    private int $priority;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: false)]
    private DateTimeInterface $createdAt;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $attachmentName = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $attachmentSize = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $attachmentMimeType = null;

    #[ORM\ManyToOne(targetEntity: Ticket::class, inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ticket $ticket = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private ?User $user = null;

    public function __construct()
    {
        $this->createdAt = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
