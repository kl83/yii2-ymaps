<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $widget kl83\ymaps\CoordsInput */
/* @var $hasModel boolean */

?>

<?= Html::beginTag('div', $widget->options) ?>

    <?php if ($hasModel) : ?>
        <?= Html::activeHiddenInput(
            $widget->model,
            $widget->attribute . '[0]',
            $widget->latInputOptions
        ) ?>
        <?= Html::activeHiddenInput(
            $widget->model,
            $widget->attribute . '[1]',
            $widget->lngInputOptions
        ) ?>
    <?php else : ?>
        <?= Html::hiddenInput(
            $widget->name . '[0]',
            $widget->value[0],
            $widget->latInputOptions
        ) ?>
        <?= Html::hiddenInput(
            $widget->name . '[1]',
            $widget->value[1],
            $widget->lngInputOptions
        ) ?>
    <?php endif; ?>

    <div class="ymaps-map" id="<?= $widget->options['id'] ?>-map"></div>

<?= Html::endTag('div') ?>
