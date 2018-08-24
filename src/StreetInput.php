<?php

namespace kl83\ymaps;

use yii\helpers\Html;
use yii\jui\AutoComplete;

/**
 * Input widget for the street name with autocomplete.
 * @package kl83\ymaps
 */
class StreetInput extends AutoComplete
{
    /**
     * @var string Search in specified city.
     */
    public $city;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        StreetInputAsset::register($this->view);
        Html::addCssClass($this->options, 'street-input-widget');
        $this->options['data']['city'] = $this->city;
        return parent::run();
    }
}
