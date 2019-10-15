<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    $form = ActiveForm::begin(['method'=>'post', 'options' => ['enctype' => 'multipart/form-data']]);
    echo Html::submitButton('Create', ['class' => 'btn btn-block btn-primary']);
    echo $form->field($model, 'name')->textInput();
   
    echo $form->field($model, 'description')->textInput();
    echo $form->field($model, 'imageFile')->fileInput();
    
    
    ActiveForm::end() ?>


