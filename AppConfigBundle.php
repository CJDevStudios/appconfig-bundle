<?php
/*
 * This file is part of AppConfig Bundle.
 *
 * (c) CJ Development Studios <contact@cjdevstudios.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CJDevStudios\AppConfigBundle;

use CJDevStudios\AppConfigBundle\DependencyInjection\AppConfigExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppConfigBundle extends Bundle {

   public function getContainerExtension()
   {
      return new AppConfigExtension();
   }
}
