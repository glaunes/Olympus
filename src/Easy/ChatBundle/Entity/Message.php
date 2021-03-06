<?php

namespace Easy\ChatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Message
 *
 * @ORM\Table(name="chat_message")
 * @ORM\Entity(repositoryClass="Easy\ChatBundle\Entity\MessageRepository")
 */
class Message implements JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text", nullable=false)
     */
    private $texte;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", type="boolean")
     */
    private $isDeleted = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_mobile", type="boolean")
     */
    private $isMobile = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime")
     */
    private $timestamp;

    /**
     * @ORM\ManyToOne(targetEntity="Easy\UtilisateurBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;
    
    function __construct() {
        $this->timestamp = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return Message
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
    
        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return Message
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    
        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set isMobile
     *
     * @param boolean $isMobile
     * @return Message
     */
    public function setIsMobile($isMobile)
    {
        $this->isMobile = $isMobile;
    
        return $this;
    }

    /**
     * Get isModified
     *
     * @return boolean 
     */
    public function getIsMobile()
    {
        return $this->isMobile;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return Message
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    
        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set utilisateur
     *
     * @param \Easy\UtilisateurBundle\Entity\Utilisateur $utilisateur
     * @return Message
     */
    public function setUtilisateur(\Easy\UtilisateurBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \Easy\UtilisateurBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    function jsonSerialize() {
        return [
          'author' => $this->getUtilisateur()->__toString(),
          'text' => $this->getTexte(),
          'date' => $this->getTimestamp()->format(\DateTime::RFC3339)
        ];
    }
}
