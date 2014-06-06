<?php

namespace Netgusto\DistributionBundle\Composer;

use Composer\Script\CommandEvent;
use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler as SensioScriptHandler;

class ScriptHandler extends SensioScriptHandler {

    public static function forwardAssetsToWebDir(CommandEvent $event) {
        $options = self::getOptions($event);

        $appDir = rtrim($options['symfony-app-dir'], '/');
        $webDir = rtrim($options['symfony-web-dir'], '/');

        if (!is_dir($appDir)) {
            echo 'The symfony-app-dir ('.$appDir.') specified in composer.json was not found in '.getcwd().', can not install the requirements file.'.PHP_EOL;
            return;
        }

        if (!is_dir($webDir)) {
            echo 'The symfony-web-dir ('.$webDir.') specified in composer.json was not found in '.getcwd().', can not forward assets.'.PHP_EOL;
            return;
        }
        
        static::executeCommand($event, $appDir, 'ng:assets:forward', $options['process-timeout']);
    }
}