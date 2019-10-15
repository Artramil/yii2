<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    $form = ActiveForm::begin(['method'=>'post', 'options' => ['enctype' => 'multipart/form-data']]);
    echo $form->field($model, 'name')->textInput();
    echo $form->field($model, 'price')->Input(['type'=>'number', 'step'=>'0.1']);
    echo $form->field($model, 'description')->textInput();
    echo $form->field($model, 'imageFile')->fileInput();
    echo Html::beginTag("select", ['name' => 'Select_Category']);
    foreach ($category as $key => $value) {
        echo Html::tag('option', $value->name, [ 'value' => $value->id]);
    };
    echo Html::endTag("select");
    echo Html::beginTag("select", ['name' => 'Select_Discount']);
    foreach ($discaunt as $key => $value) {
        echo Html::tag('option', $value->name, [ 'value' => $value->id]);
    };
    echo Html::endTag("select");
    echo Html::submitButton('Edite', ['class' => 'btn btn-block btn-primary']);
    ActiveForm::end()?>

