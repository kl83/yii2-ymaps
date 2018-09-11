<?php

namespace kl83\ymaps;

class MapWidgetAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/kl83/yii2-ymaps/src/web';
    public $js = ['js/map-widget.js'];
    public $css = ['css/map-widget.css'];
    public $depends = [
        'yii\web\JqueryAsset',
        'kl83\ymaps\YMapsAsset',
    ];
}
