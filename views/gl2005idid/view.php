<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gl2005idid */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gl2005idids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gl2005idid-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'GL2005ID_HolderID',
            'HD2005ID_HolderID',
            'id',
        ],
    ]) ?>

</div>
