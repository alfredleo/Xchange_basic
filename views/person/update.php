<?php

use app\models\Company;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/** @var Company[] $companies */

$this->title = Yii::t('app', 'Update Person: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'companies' => $companies,
    ]) ?>

</div>
