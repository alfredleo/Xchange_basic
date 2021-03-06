<?php

use app\models\Address;
use app\models\Person;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/** @var Person $default_person */
/** @var Address $address */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'status',
        ],
    ]) ?>
    <h4>Default contact person: </h4>
    <?php
    if ($default_person !== null) echo DetailView::widget([
        'model' => $default_person,
        'attributes' => [
            'first_name',
            'last_name',
        ],
    ]) ?>
    <h4>Address: </h4>
    <?php
    if ($address !== null) echo DetailView::widget([
        'model' => $address,
        'attributes' => [
            'address',
            'city',
        ],
    ]) ?>
</div>
