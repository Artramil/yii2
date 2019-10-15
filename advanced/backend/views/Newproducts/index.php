<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\grid\GridView;
   
?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'description:ntext',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img($data->urlImage,[
                        'alt'=>'yii2 - картинка в gridview',
                        'style' => 'width:50px;'
                   ]);
                },
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url,$model,$key) {
                    return Html::a('Edit', ['edit', 'id' => $model->id], ['class' => 'btn btn-success']);
                    },
                'delete'  => function ($url,$model,$key) {
                    return Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-success',
                    'data' => [
                        'method' => 'post',
                    ],
                    ]);
                },
            ],
        ],
        ],
    ])?>
    <?= Html::tag('a', 'Додати', ['href'=>Url::toRoute('/newproducts/create')]) ?>
