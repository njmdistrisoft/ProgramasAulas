<?php
  use \yii\helpers\Html;
  use \yii\helpers\HtmlPurifier;
  use common\models\Departamento;
  $asignatura = $model->getAsignatura()->one();

?>
<h4> 1. FUNDAMENTACIÓN </h4>
<div style="margin-left:20px;">
  <?= HtmlPurifier::process($model->fundament) ?>
</div>

<h4> 2. OBJETIVOS SEGÚN PLAN DE ESTUDIOS </h4>
<div style="margin-left:20px">
  <?= HtmlPurifier::process($model->objetivo_plan) ?>
</div>
<div style="margin-left:40px">
  <h5><b> 2.1 OBJETIVOS DEL PROGRAMA </b></h5>
  <?= HtmlPurifier::process($model->objetivo_programa) ?>
</div>


<h4> 3. CONTENIDO SEGÚN PLAN DE ESTUDIOS </h4>
<div style="margin-left:20px;">
  <?= HtmlPurifier::process($model->contenido_plan) ?>
</div>

<h4> 4. CONTENIDOS ANALÍTICOS </h4>
<div style="margin-left:20px;">
  <?= HtmlPurifier::process($model->contenido_analitico) ?>
</div>

<h4> 5. BIBLIOGRAFÍA BÁSICA Y DE CONSULTA </h4>
<div style="margin-left:20px;">
  <?= HtmlPurifier::process($model->biblio_basica) ?>
  <?= HtmlPurifier::process($model->biblio_consulta) ?>
</div>

<h4> 6. PROPUESTA METODOLÓGICA </h4>
<div style="margin-left:20px;">
<?= HtmlPurifier::process($model->propuesta_met) ?>
</div>

<h4> 7. EVALUACIÓN Y CONDICIONES DE ACREDITACIÓN </h4>
<div style="margin-left:20px;">
  <?= HtmlPurifier::process($model->evycond_acreditacion) ?>
</div>

<h4> 8. PARCIALES, RECUPERATORIOS Y COLOQUIOS </h4>
<div style="margin-left:20px;">
  <?= HtmlPurifier::process($model->parcial_rec_promo) ?>
</div>

<h4> 9. DISTRIBUCIÓN HORARIA </h4>
<div style="margin-left:20px;">
  <?= HtmlPurifier::process($model->distr_horaria) ?>
</div>

<h4> 10. CRONOGRAMA TENTATIVO </h4>
<div style="margin-left:20px;">
  <?= HtmlPurifier::process($model->crono_tentativo) ?>
</div>

<h4> 11. PLANIFICACIÓN DE ACTIVIDADES EXTRACURRICULARES </h4>
<div style="margin-left:20px;">
  <?= HtmlPurifier::process($model->actv_extracur) ?>
</div>

  <br><br>
  <div class="" style="text-align:center">
    Firma del responsable <br>
    Aclaración <br>
    Cargo <br>
  </div>
  <br><br>
  <div class="" style="text-align:right">
    Lugar y fecha de entrega
  </div>
