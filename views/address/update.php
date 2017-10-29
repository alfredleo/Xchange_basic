<?php

use app\models\Person;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Address */
/** @var Person[] $people */

$this->title = Yii::t('app', 'Update Address: {nameAttribute}', [
    'nameAttribute' => $model->person_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->person_id, 'url' => ['view', 'id' => $model->person_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'people' => $people,
    ]) ?>

</div>
