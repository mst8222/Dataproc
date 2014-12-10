<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gl2009idid */

$this->title = 'Update Gl2009idid: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gl2009idids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gl2009idid-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
