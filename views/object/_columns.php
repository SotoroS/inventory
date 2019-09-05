<?php

use yii\helpers\Url;
use yii\helpers\ArrayHelper;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'inventory_id',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'budget',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'date',
        'width' => '100px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'count',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'cost',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'position',
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
            'options' => ['multiple' => true]
        ],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'description',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'status_id',
        'contentOptions' => ['style' => 'white-space: normal;'],
        'headerOptions' => ['style' => 'white-space: normal;'],
        'label' => 'Статус',
        'value' => function ($model)
        {
            return $model->status->name;
        },
        'filterType' => '\kartik\widgets\Select2',
        'filterWidgetOptions' => [
            'data' => \app\models\Object::getStatuses(),
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Любой статус'],
        'format' => 'raw',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],

];   