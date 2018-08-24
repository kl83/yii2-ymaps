<?php

namespace kl83\ymaps;

/**
 * {@inheritdoc}
 */
class CoordsInputAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/kl83/yii2-ymaps/web';
    public $js = ['js/coords-input.js'];
    public $css = ['css/coords-input.css'];
    public $depends = [
        'yii\web\JqueryAsset',
        'kl83\ymaps\YMapsAsset',
    ];
}
