<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gl2009idid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gl2009idid-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'GL2009ID_HolderID')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'HD2009ID_HolderID')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
