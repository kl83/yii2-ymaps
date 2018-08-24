<?php

namespace kl83\ymaps;

/**
 * {@inheritdoc}
 */
class StreetInputAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/kl83/yii2-ymaps/web';
    public $js = ['js/street-input.js'];
    public $depends = [
        'yii\jui\JuiAsset',
        'kl83\ymaps\YMapsAsset',
    ];
}
