<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use froala\froalaeditor\FroalaEditorWidget;
/* @var $this yii\web\View */
/* @var $model backend\models\Tema */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tema-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->widget(FroalaEditorWidget::className(), [
        'attribute' => 'descripcion',
        'name' => 'descripcion',
        'options' => [
            'id'=>'descripcion',
        ],
        'clientOptions' => [
          'height' => 100,
          'language' => 'es',
          'height' => 100,
          'theme' => 'gray',
          'toolbarButtons' => ['bold', 'italic', 'underline', '|', 'paragraphFormat', 'fontSize','color','|','undo','redo','align'],
        ],

      ]) ?>

    <div class="form-group">
      <div class="row">

      </div>
    </div>
    <div class="form-group">
        <div class="row">
          <div class="col-xs-6 text-left">
            <?= Html::a('Volver', ['unidad/update', 'id' => $model->unidad_id],['class' => 'btn btn-warning']) ?>
          </div>
          <div class="col-xs-6 text-right">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success'])  ?>
          </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
