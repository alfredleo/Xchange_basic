<?php

use app\models\Company;
use app\models\Person;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
/** @var Person[] $people */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->dropDownList(Company::statuses(),
        ['options' => $model->isNewRecord ? [Company::STATUS_ACTIVE => ['Selected' => 'selected']] : '']
    ) ?>

    <?php
    if ($people !== null)
        $form->field($model, 'default_person_id')->dropDownList($people, ['prompt' => ' -- Select default person --'])
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
