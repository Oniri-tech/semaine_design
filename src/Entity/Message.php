<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sent_by;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $sent_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=Chatroom::class, inversedBy="messages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chatroom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSentBy(): ?User
    {
        return $this->sent_by;
    }

    public function setSentBy(?User $sent_by): self
    {
        $this->sent_by = $sent_by;

        return $this;
    }

    public function getSentAt(): ?\DateTimeInterface
    {
        return $this->sent_at;
    }

    public function setSentAt(\DateTimeInterface $sent_at): self
    {
        $this->sent_at = $sent_at;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getChatroom(): ?Chatroom
    {
        return $this->chatroom;
    }

    public function setChatroom(?Chatroom $chatroom): self
    {
        $this->chatroom = $chatroom;

        return $this;
    }
}
