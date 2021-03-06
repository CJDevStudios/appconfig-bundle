<?php
/*
 * This file is part of AppConfig Bundle.
 *
 * (c) CJ Development Studios <contact@cjdevstudios.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CJDevStudios\AppConfigBundle\Entity;

use CJDevStudios\EntityManagementBundle\Entity\AbstractEntity;
use CJDevStudios\EntityManagementBundle\ORM\Annotation\FieldOptions;
use Doctrine\ORM\Mapping as ORM;

/**
 * @since 1.0.0
 * @ORM\Entity
 * @ORM\Table(name="configs", uniqueConstraints={
 *     @UniqueConstraint(name="unicity",
 *         columns={"namespace", "name"})
 *     }))
 */
class Config extends AbstractEntity implements ConfigInterface {

   /**
    * @var string
    * @ORM\Column(type="string", length=255, nullable=false, options={"default": "app.general"})
    */
   private string $namespace = 'app.general';

   /**
    * @var string
    * @ORM\Column(type="string", length=255, nullable=false)
    */
   private string $name;

   /**
    * @var string
    * @ORM\Column(type="string", length=255, options={"default": "string"})
    * @FieldOptions(displayName="field.datatype")
    */
   private string $type;

   /**
    * @var string
    * @ORM\Column(type="text", nullable=true)
    */
   private $value;

   public function getName(): ?string
   {
      return $this->name;
   }

   public function setName(string $name): static
   {
      $this->name = $name;
      return $this;
   }

   public function getValue(): ?string
   {
      return $this->value;
   }

   public function setValue(?string $value): static
   {
      $this->value = $value;

      return $this;
   }

   public function getNamespace(): string
   {
      return $this->namespace;
   }

   public function setNamespace(string $namespace): static
   {
      $this->namespace = $namespace;

      return $this;
   }

   public function getType(): string
   {
      return $this->type;
   }

   public function setType(string $type): static
   {
      $this->type = $type;

      return $this;
   }
}
