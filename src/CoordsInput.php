<?php

namespace kl83\ymaps;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Widget for selecting coordinates on the map.
 * The value is an array: [latitude, longitude].
 */
class CoordsInput extends \yii\widgets\InputWidget
{
    /**
     * @var array Latitude input html-attributes.
     */
    public $latInputOptions = [];

    /**
     * @var array Longitude input html-attributes.
     */
    public $lngInputOptions = [];

    /**
     * @var array Ynadex map JS options.
     * ymaps.Widget(ID, <b>options</b>).
     */
    public $ymapsClientOptions = [];

    /**
     * @var array Ynadex map default JS options.
     * ymaps.Widget(ID, <b>options</b>).
     */
    protected $defaultYmapsClientOptions = [
        'zoom' => 15,
        'controls' => ['fullscreenControl', 'searchControl'],
    ];

    /**
     * @var array Placemark JS properties.
     */
    public $placemarkClientProperties = [];

    /**
     * @var array Placemark default JS properties.
     */
    protected $defaultPlacemarkClientProperties = [];

    /**
     * @var array Placemark JS options.
     */
    public $placemarkClientOptions = [];

    /**
     * @var array Placemark default JS options.
     */
    protected $defaultPlacemarkClientOptions = [
        'draggable' => true,
    ];

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        CoordsInputAsset::register($this->view);
        Html::addCssClass($this->options, 'coords-input');
        Html::addCssClass($this->latInputOptions, 'coords-lat');
        Html::addCssClass($this->lngInputOptions, 'coords-lng');
        $this->options['data']['map'] = ArrayHelper::merge(
            $this->defaultYmapsClientOptions,
            $this->ymapsClientOptions
        );
        $this->options['data']['pm-prop'] = ArrayHelper::merge(
            $this->defaultPlacemarkClientProperties,
            $this->placemarkClientProperties
        );
        $this->options['data']['pm-opt'] = ArrayHelper::merge(
            $this->defaultPlacemarkClientOptions,
            $this->placemarkClientOptions
        );
        return $this->render('coords-input', [
            'widget' => $this,
            'hasModel' => $this->hasModel(),
        ]);
    }
}
