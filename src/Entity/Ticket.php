<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Hackzilla\Bundle\TicketBundle\Model\TicketInterface;
use Hackzilla\Bundle\TicketBundle\Model\TicketTrait;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket implements TicketInterface
{
    use TicketTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime', nullable: false)]
    private $lastMessage;

    #[ORM\Column(type: 'text', nullable: false)]
    private $subject;

    #[ORM\Column(type: 'integer', nullable: false)]
    private $status;

    #[ORM\Column(type: 'integer', nullable: false)]
    private $priority;

    #[ORM\Column(type: 'datetime', nullable: false)]
    private $createdAt;

    #[ORM\OneToMany(mappedBy: 'ticket', targetEntity: TicketMessage::class)]
    private $messages;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $userCreated;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $lastUser;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
