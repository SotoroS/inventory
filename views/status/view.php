<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Status */
?>
<div class="status-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
