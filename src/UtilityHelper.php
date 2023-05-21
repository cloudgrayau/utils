<?php
namespace cloudgrayau\utils;

use Craft;

abstract class UtilityHelper {
    
    // Public Methods
    // =========================================================================

    public static function registerModule(): void {
        $moduleId = 'cloudgrayau-utils';
        if (!Craft::$app->hasModule($moduleId)) {
            Craft::$app->setModule($moduleId, new Utils($moduleId));
            Craft::$app->getModule($moduleId);
        }
    }

}
