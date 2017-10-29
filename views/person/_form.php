<?php

use app\models\Company;
use app\models\Person;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
/* @var Company[] $companies */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->dropDownList(Person::statuses(),
        ['options' => $model->isNewRecord ? [Person::STATUS_ACTIVE => ['Selected' => 'selected']] : '']
    ) ?>

    <?= $form->field($model, 'company_id')->dropDownList($companies, ['prompt' => ' -- Select Company --'])
    ?>

    <?= $form->field($model, 'default_person')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
