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
