<?php

use kartik\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\TabularForm;

$form = ActiveForm::begin();
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'form' => $form,
    'attributes' => $model->FormAttribs,
    'gridSettings' => ['condensed' => true]
]);
// Add other fields if needed or render your submit button
echo '<div class="text-right text-end">' .
    Html::submitButton('Submit', ['class' => 'btn btn-primary']) .
    '<div>';
ActiveForm::end();
