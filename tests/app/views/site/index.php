<?php

/* @var $this yii\web\View */

$this->title = "Hello, world! I'm widget!";

if ( ! ($coords = Yii::$app->request->get('test')) ) {
    $coords = '[55.76,37.64]';
}

?>
<div class="site-index">

    <form action="">
        <?= kl83\ymaps\CoordsWidget::widget([
            'name' => 'test',
            'value' => $coords,
        ]) ?>
        <br>
        <button type="submit">Submit</button>
    </form>

</div>
