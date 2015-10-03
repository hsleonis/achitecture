<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="pane" style="float:left; width:100%;">
    <div class="comments-form">
        <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-6">

                <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

                <?= $form->field($model, 'city')->textInput(['maxlength' => 255]) ?>


                <?= $form->field($model, 'product_id')->textInput() ?>

                

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'is_approved')
                                                ->dropDownList(
                                                    array ('0'=>'No', '1'=>'Yes') 
                                                ); ?>

                <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>