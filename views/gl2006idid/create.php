<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gl2006idid */

$this->title = 'Create Gl2006idid';
$this->params['breadcrumbs'][] = ['label' => 'Gl2006idids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gl2006idid-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
