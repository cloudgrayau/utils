<?php
namespace cloudgrayau\utils;

use cloudgrayau\utils\base\Module;
use cloudgrayau\utils\twigextensions\Extension;

use Craft;

class Utils extends Module {
    
    // Public Methods
    // =========================================================================

    public function init(): void {
        parent::init();
        $this->_registerTwigExtensions();
    }

    // Private Methods
    // =========================================================================

    private function _registerTwigExtensions(): void {
        Craft::$app->getView()->registerTwigExtension(new Extension);
    }
    
}