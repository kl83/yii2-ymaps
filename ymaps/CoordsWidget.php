<?php

namespace kl83\ymaps;

use yii\helpers\Json;

class CoordsWidget extends \yii\widgets\InputWidget {
    public function run () {
        CoordsWidgetAsset::register($this->view);
        $className = 'kl83-ymaps-coords-widget';
        if ( isset($this->options['class']) ) {
            $this->options['class'] .= " $className";
        } else {
            $this->options['class'] = $className;
        }
        $jsOptions = [
            'id' => $this->options['id'],
        ];
        $this->view->registerJs("kl83YMapsInitializeCoordsWidget(jQuery, ".Json::encode($jsOptions).")");
        return $this->render('coords-widget', [
            'hasModel' => $this->hasModel(),
        ]);
    }
}
