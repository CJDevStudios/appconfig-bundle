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

interface ConfigInterface {

   /**
    * @return ?string
    */
   public function getName(): ?string;

   /**
    * @param string $name
    * @return static
    */
   public function setName(string $name): static;

   /**
    * @return ?string
    */
   public function getValue(): ?string;

   /**
    * @param ?string $value
    * @return $this
    */
   public function setValue(?string $value): static;

   /**
    * @return string
    */
   public function getNamespace(): string;

   /**
    * @param string $namespace
    * @return static
    */
   public function setNamespace(string $namespace): static;

   /**
    * @return string
    */
   public function getType(): string;

   /**
    * @param string $type
    * @return static
    */
   public function setType(string $type): static;
}
