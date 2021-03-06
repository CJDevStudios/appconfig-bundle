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

namespace CJDevStudios\AppConfigBundle\Service;

use CJDevStudios\AppConfigBundle\Entity\Config;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;

/**
 *
 * @since 1.0.0
 */
class ConfigRegistry implements ConfigRegistryInterface {

    /** @var EntityManagerInterface */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

   /**
    * Retrieve all configuration values
    * @return mixed
    * @since 1.0.0
    */
    public function getConfigs(): mixed
    {
        $builder = $this->em->createQueryBuilder()
            ->select('c')
            ->from(Config::class, 'c');

        return $builder->getQuery()->getResult();
    }

   /**
    * Retrieve a configuration value for a given namespace and name.
    * @param string $namespace
    * @param string $name
    * @return mixed
    * @throws NonUniqueResultException
    * @since 1.0.0
    */
    public function get(string $namespace, string $name): mixed
    {
        $builder = $this->em->createQueryBuilder()
            ->select('c.value')
            ->from(Config::class, 'c')
            ->where('c.namespace = :namespace')
            ->andWhere('c.name = :name')
            ->setParameters([
                'namespace' => $namespace,
                'name'      => $name
            ]);

        return $builder->getQuery()->getOneOrNullResult(AbstractQuery::HYDRATE_SINGLE_SCALAR);
    }
}
