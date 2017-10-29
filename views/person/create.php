<?php

use app\models\Company;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var Company[] $companies */

$this->title = Yii::t('app', 'Create Person');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'companies' => $companies,
    ]) ?>

</div>
