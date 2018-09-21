<?php
use kartik\tabs\TabsX;
use froala\froalaeditor\FroalaEditorWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->params['breadcrumbs'][] = ['label' => '...'];
$this->params['breadcrumbs'][] = ['label' => "Portada", 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => "Fundamentacion", 'url' => ['fundamentacion', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Objetivo según el plan de estudio';
?>

<?php $form = ActiveForm::begin([
'enableAjaxValidation'      => true,
'enableClientValidation'    => false,
'validateOnChange'          => false,
'validateOnSubmit'          => true,
'validateOnBlur'            => false,
]); ?>

<h3>2. Objetivo según Plan de estudio</h3>

<?= TabsX::widget([
  'position' => TabsX::POS_LEFT,
  'align' => TabsX::ALIGN_LEFT,
  'encodeLabels' => false,
  'items' => [
    [
      'label' => 'Descripcion',
      'content' =>  FroalaEditorWidget::widget([
                  'model' => $model,
                  'attribute' => 'objetivo_plan',
                  'name' => 'objetivo_plan',
                  'options' => [
                      'id'=>'objetivo_plan'
                  ],
                  'clientOptions' => [
                    'height' => 100,
                    'language' => 'es',
                    'height' => 100,
                    'theme' => 'gray',
                    'toolbarButtons' => ['bold', 'italic', 'underline', '|', 'paragraphFormat', 'fontSize','color','|','undo','redo','align'],
                  ],
      ])
    ],
    [
      'label' => 'Puntos',
      'content' =>  $this->renderAjax('_gridObjetivos', ['model'=>$model])
    ]
  ]
])?>

<div class="form-group">
    <?= Html::submitButton('Seguir', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Volver', ['fundamentacion', 'id' => $model->id],['class' => 'btn btn-warning']) ?>

</div>
<?php ActiveForm::end(); ?>
