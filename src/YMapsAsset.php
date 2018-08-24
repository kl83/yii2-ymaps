<?php

namespace kl83\ymaps;

use Yii;

/**
 * {@inheritdoc}
 */
class YMapsAsset extends \yii\web\AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->js = [
            'https://api-maps.yandex.ru/2.1/?lang=' . Yii::$app->language,
        ];
        return parent::init();
    }
}
