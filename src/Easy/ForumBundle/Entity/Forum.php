<?php

namespace Easy\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Forum
 *
 * @ORM\Table(name="forum")
 * @ORM\Entity
 */
class Forum
{
    /**
    * @ORM\ManyToOne(targetEntity="Easy\ForumBundle\Entity\CategorieForum")
    * @ORM\JoinColumn(nullable=false)
    */
    private $categorie_forum;
    
    /**
    * @ORM\OneToMany(targetEntity="Easy\ForumBundle\Entity\Sujet", mappedBy="forum")
    */
    private $sujets;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=45, nullable=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer", nullable=true)
     */
    private $ordre;



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
     * Set libelle
     *
     * @param string $libelle
     * @return Forum
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Forum
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     * @return Forum
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    
        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer 
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set categorie_forum
     *
     * @param \Easy\ForumBundle\Entity\CategorieForum $categorieForum
     * @return Forum
     */
    public function setCategorieForum(\Easy\ForumBundle\Entity\CategorieForum $categorieForum)
    {
        $this->categorie_forum = $categorieForum;
    
        return $this;
    }

    /**
     * Get categorie_forum
     *
     * @return \Easy\ForumBundle\Entity\CategorieForum 
     */
    public function getCategorieForum()
    {
        return $this->categorie_forum;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sujets = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add sujets
     *
     * @param \Easy\ForumBundle\Entity\Sujet $sujets
     * @return Forum
     */
    public function addSujet(\Easy\ForumBundle\Entity\Sujet $sujets)
    {
        $this->sujets[] = $sujets;
    
        return $this;
    }

    /**
     * Remove sujets
     *
     * @param \Easy\ForumBundle\Entity\Sujet $sujets
     */
    public function removeSujet(\Easy\ForumBundle\Entity\Sujet $sujets)
    {
        $this->sujets->removeElement($sujets);
    }

    /**
     * Get sujets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSujets()
    {
        return $this->sujets;
    }
}