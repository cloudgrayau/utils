<?php
namespace cloudgrayau\utils\assetbundles;

use craft\web\AssetBundle;

class CloudGrayAsset extends AssetBundle {
    
    // Public Methods
    // =========================================================================

    public function init(): void {
        $this->sourcePath = "@cloudgrayau/utils/resources";
        $this->css = [
            'css/cloudgray.css',
        ];
        parent::init();
    }
}
