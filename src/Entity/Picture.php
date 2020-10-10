<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 */
class Picture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('submitted', 'accepted', 'rejected', 'scheduled')", length=12)
     */
    private $status = "submitted";

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $publishingTime;

    /**
     * @ORM\Column(type="string")
     */
    private $pictureFilename;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="pictures")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPublishingTime(): ?\DateTimeInterface
    {
        return $this->publishingTime;
    }

    public function setPublishingTime(?\DateTimeInterface $publishingTime): self
    {
        $this->publishingTime = $publishingTime;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of pictureFilename
     */ 
    public function getPictureFilename()
    {
        return $this->pictureFilename;
    }

    /**
     * Set the value of pictureFilename
     *
     * @return  self
     */ 
    public function setPictureFilename($pictureFilename)
    {
        $this->pictureFilename = $pictureFilename;

        return $this;
    }
}
