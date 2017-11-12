<?php

namespace kl83\ymaps;

class CoordsWidgetAsset extends \yii\web\AssetBundle {
    public $sourcePath = __DIR__ . '/../dist';
    public $js = [ 'js/coords-widget.js' ];
    public $css = [ 'css/coords-widget.css' ];
    public $depends = [
        'kl83\ymaps\YMapsAsset',
    ];
}
