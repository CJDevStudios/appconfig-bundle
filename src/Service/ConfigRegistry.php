<?php
/*
 * This file is part of AppConfig Bundle.
 *
 * (c) CJ Development Studios <contact@cjdevstudios.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
