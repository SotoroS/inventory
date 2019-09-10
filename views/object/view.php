<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Object */
?>
<div class="object-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'inventory_id',
            'budget',
            'date',
            'count',
            'cost',
            'position',
            'description',
            'status.name',
            'category.name',
        ],
    ]) ?>

</div>
