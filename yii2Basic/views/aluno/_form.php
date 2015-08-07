<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; 
use backend\models\Standard;

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $form yii\widgets\ActiveForm */
/* <?= $form->field($model, 'sexo')->textInput(['maxlength' => true]) ?> */
/* <?= $form->field($model, 'id_curso')->textInput() ?> */
?>

<div class="aluno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matricula')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'sexo')->dropDownList(['Masculino','Feminino']) ?>
	
    <?= $form->field($model, 'id_curso')->dropDownList([$array_cursos],['prompt'=>'Selecione o curso']) ?>

    <?= $form->field($model, 'ano_ingresso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
