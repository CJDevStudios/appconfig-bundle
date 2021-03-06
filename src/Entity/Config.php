<?php
/**
 * ---------------------------------------------------------------------
 * App Configuration Bundle
 * Copyright (C) 2019-2020 CJ Development Studios and contributors.
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of App Configuration Bundle.
 *
 * App Configuration Bundle is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * App Configuration Bundle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with App Configuration Bundle. If not, see <http://www.gnu.org/licenses/>.
 * ---------------------------------------------------------------------
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
