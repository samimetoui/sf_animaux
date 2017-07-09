<?php

namespace AnimauxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Animal
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AnimauxBundle\Entity\AnimalRepository")
 */
class Animal {

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
  * @ORM\Column(name="Titre", type="string", length=255)
  * 
  * @Assert\NotBlank()
  */
 private $titre;

 /**
  * @var string
  *
  * @ORM\Column(name="description", type="text", nullable=true)
  */
 private $description;

 /**
  * @var string
  *
  * @ORM\Column(name="url", type="string", length=255)
  * 
  * @Assert\Url()
  */
 private $url;

 /**
  * @var DateTime
  *
  * @ORM\Column(name="date", type="datetime")
  */
 private $date;

 function __construct() {
  $this->setDate(new \DateTime());
 }

 /**
  * Get id
  *
  * @return integer
  */
 public function getId() {
  return $this->id;
 }

 /**
  * Set titre
  *
  * @param string $titre
  *
  * @return Animal
  */
 public function setTitre($titre) {
  $this->titre = $titre;

  return $this;
 }

 /**
  * Get titre
  *
  * @return string
  */
 public function getTitre() {
  return $this->titre;
 }

 /**
  * Set description
  *
  * @param string $description
  *
  * @return Animal
  */
 public function setDescription($description) {
  $this->description = $description;

  return $this;
 }

 /**
  * Get description
  *
  * @return string
  */
 public function getDescription() {
  return $this->description;
 }

 /**
  * Set url
  *
  * @param string $url
  *
  * @return Animal
  */
 public function setUrl($url) {
  $this->url = $url;

  return $this;
 }

 /**
  * Get url
  *
  * @return string
  */
 public function getUrl() {
  return $this->url;
 }

 /**
  * Set date
  *
  * @param \DateTime $date
  *
  * @return Animal
  */
 public function setDate($date) {
  $this->date = $date;

  return $this;
 }

 /**
  * Get date
  *
  * @return \DateTime
  */
 public function getDate() {
  return $this->date;
 }

}
