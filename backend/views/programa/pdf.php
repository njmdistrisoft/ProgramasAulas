<?php
  use \yii\helpers\Html;
  use \yii\helpers\HtmlPurifier;
  use backend\models\Departamento;
?>
<head>
  <meta charset="utf-8">
  <title>Programa de <?= Html::encode($model->asignatura) ?></title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <style type="text/css">
    body{
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body>
  <h4>
    UNIVERSIDAD NACIONAL DEL COMAHUE <br>
    CENTRO UNIVERSITARIO REGIONAL ZONA ATLANTICA <br> <br>
    Departamento de <?= Html::encode(Departamento::find($model->departamento_id)->one()->nom); ?> <br>
    PROGRAMA DE LA ASIGNATURA: <?= Html::encode($model->asignatura) ?> <br>
    CARRERA:
    <br>
    CURSO: <?= Html::encode($model->curso) ?><br>
    AÑO: <?= Html::encode($model->year) ?> <br>
    CUATRIMESTRE: <?= Html::encode($model->cuatrimestre) ?> <br>
    EQUIPO DE CATEDRA:
    <br>
  </h4>

  <h4> 1. FUNDAMENTACIÓN </h4>
  <?= HtmlPurifier::process($model->fundament) ?>

  <h4> 2. OBJETIVOS SEGÚN PLAN DE ESTUDIOS </h4>
  <?= HtmlPurifier::process($model->objetivo_plan) ?>

  <h4> 3. CONTENIDO SEGÚN PLAN DE ESTUDIOS </h4>
  <?= HtmlPurifier::process($model->contenido_plan) ?>

  <h4> 4. CONTENIDOS ANALÍTICOS </h4>

  <h4> 5. PROPUESTA METODOLÓGICA </h4>
  <?= HtmlPurifier::process($model->propuesta_met) ?>

  <h4> 6. EVALUACIÓN Y CONDICIONES DE ACREDITACIÓN </h4>
  <?= HtmlPurifier::process($model->evycond_acreditacion) ?>

  <h4> 7. PARCIALES, RECUPERATORIOS Y COLOQUIOS </h4>
  <?= HtmlPurifier::process($model->parcial_rec_promo) ?>

  <h4> 8. DISTRIBUCIÓN HORARIA </h4>
  <?= HtmlPurifier::process($model->distr_horaria) ?>

  <h4> 9. CRONOGRAMA TENTATIVO </h4>
  <?= HtmlPurifier::process($model->crono_tentativo) ?>

  <h4> 10. PLANIFICACIÓN DE ACTIVIDADES EXTRACURRICULARES </h4>
  <?= HtmlPurifier::process($model->actv_extracur) ?>

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
</body>
</html>
