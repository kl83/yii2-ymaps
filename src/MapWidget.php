<?php

namespace kl83\ymaps;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\base\Widget;

/**
 * Widget to display the Yandex map and the placemarks.
 * Exampe:
 * echo MapWidget::widget([
 *      'mapState' => [
 *          'center' => [55.76, 37.64],
 *      ],
 *      'placemarks' => [
 *          [
 *              [55.76, 37.64],
 *          ],
 *      ],
 * ]);
 */
class MapWidget extends Widget
{
    /**
     * @var array Html attributes
     */
    public $options = [];

    /**
     * @var array Placemarks. Array structure:
     * [
     *      [
     *          [55.76, 37.64], // coords
     *          [],             // placemark properties, optional
     *                          // (merge with a defaultPlacemarkProperties)
     *          [],             // placemark options, optional
     *                          // (merge with a defaultPlacemarkOptions)
     *      ],
     *      ...
     * ]
     * For more details see
     * https://tech.yandex.ru/maps/doc/jsapi/2.1/ref/reference/Placemark-docpage/
     */
    public $placemarks = [];

    public $defaultPlacemarkProperties = [];

    public $defaultPlacemarkOptions = [];

    /**
     * @var array ymaps.Map state
     * For more details see
     * https://tech.yandex.ru/maps/doc/jsapi/2.1/ref/reference/Map-docpage/
     */
    public $mapState = [];

    protected $defaultMapState = [
        'zoom' => 7,
    ];

    /**
     * @var array ymaps.Map options
     * For more details see
     * https://tech.yandex.ru/maps/doc/jsapi/2.1/ref/reference/Map-docpage/
     */
    public $mapOptions = [];

    protected $defaultMapOptions = [];

    /**
     * Generates options to jQuery.mapWidget init function
     * @return array
     */
    protected function getJsConfig()
    {
        $placemarks = $this->placemarks;
        foreach ($placemarks as &$placemark) {
            if (isset($placemark[1])) {
                $placemark[1] = ArrayHelper::merge(
                    $this->defaultPlacemarkProperties,
                    $placemark[1]
                );
            } else {
                $placemark[1] = $this->defaultPlacemarkProperties;
            }
            if (isset($placemark[2])) {
                $placemark[2] = ArrayHelper::merge(
                    $this->defaultPlacemarkOptions,
                    $placemark[2]
                );
            } else {
                $placemark[2] = $this->defaultPlacemarkOptions;
            }
        }
        return [
            'state' => ArrayHelper::merge($this->defaultMapState, $this->mapState),
            'options' => ArrayHelper::merge($this->defaultMapOptions, $this->mapOptions),
            'placemarks' => $placemarks,
        ];
    }

    public function run()
    {
        MapWidgetAsset::register($this->view);
        $this->options['id'] = $this->id;
        Html::addCssClass($this->options, 'map-widget');
        $this->view->registerJs(
            'jQuery("#' . $this->id . '").mapWidget(' . Json::encode($this->getJsConfig()) . ');'
        );
        return Html::tag('div', '', $this->options);
    }
}
