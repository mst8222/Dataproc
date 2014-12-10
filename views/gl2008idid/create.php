<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gl2008idid */

$this->title = 'Create Gl2008idid';
$this->params['breadcrumbs'][] = ['label' => 'Gl2008idids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gl2008idid-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
