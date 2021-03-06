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

/**
 * Configuration registry interface.
 * @since 1.0.0
 */
interface ConfigRegistryInterface {

    public function getConfigs();

    public function get(string $namespace, string $name);
}
