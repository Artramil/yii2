<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use common\models\User;
    $form = ActiveForm::begin(['method'=>'post', 'options' => ['enctype' => 'multipart/form-data']]);
    echo Html::tag('h1', $model->username, [ 'style' => 'text-align: center']);
    echo Html::beginTag("select", ['name' => 'Select_Role', 'style'=>'width: 100%; margin-bottom: 5px; font-size: 20px; text-align: center;']);
    foreach ($role as $key => $value) {
        echo Html::tag('option', $value->name, [ 'value' => $value->name]);
    }
    echo Html::endTag("select");
    echo Html::beginTag("div", ['class' => 'form-group']);
    echo Html::submitButton('Edit', ['class' => 'btn btn-block btn-primary']);
    echo Html::endTag("div");
    ActiveForm::end();
?>
