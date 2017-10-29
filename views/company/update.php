<?php

use app\models\Person;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/** @var Person[] $people */

$this->title = Yii::t('app', 'Update Company: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'people' => $people,
    ]) ?>

</div>
