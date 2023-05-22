<?php
namespace cloudgrayau\utils\twigextensions;

use craft\helpers\ArrayHelper;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class Extension extends AbstractExtension {
    
    // Public Methods
    // =========================================================================
    
    public function getName(): string {
        return 'Twig Extensions';
    }

    public function getFunctions(): array {
        return [
            new TwigFunction('cgGetValue', [$this, 'getValue']),
        ];
    }
    
    public function getValue($array, $key, $default = null): mixed {
        if (is_array($array)) {
            return ArrayHelper::getValue($array, $key, $default);
        }
        return null;
    }
    
}
