<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $widget kl83\ymaps\CoordsWidget */
/* @var $hasModel boolean */

$widget = $this->context;

echo Html::beginTag('div', $widget->options);

if ( $hasModel ) {
    echo Html::activeHiddenInput($widget->model, $widget->attribute);
} else {
    echo Html::hiddenInput($widget->name, $widget->value);
}

echo Html::tag('div', '', [ 'id' => "{$widget->options['id']}-map", 'class' => 'ymaps-map' ]);

echo Html::endTag('div');
