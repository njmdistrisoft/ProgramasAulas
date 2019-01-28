<?php

/* @var $this yii\web\View */
use kartik\tabs\TabsX;
$this->title = 'Programas CURZA';

$items = [
    [
      'label' => '<i class="glyphicon glyphicon-info-sign"></i> Acerca de...',
      'content' => "
                    <p>Este sistema permite crear y organizar los programas de la institución para luego ser evaluados y distribuidos públicamente, facilitando así su obtención.</p>
                    <p>Tiene como objetivo:</p>
                      <ul>
                        <li type='disc'>Facilitar la creación de los programa,</li>
                        <li type='disc'>Agilizar el proceso de evaluación,</li>
                        <li type='disc'>Brindar diversas formas de obtener los programas,</li>
                        <li type='disc'>Disponer de un historial de los mismos.</li>
                      </ul>
                      <br>
                      <i> versión: 1.0.0 </i>
                    ",
      'active'=>true,
    ],
    [
      'label' => '<i class="glyphicon glyphicon-question-sign"></i> Contacto',
      'content' => "
                    <p> Puede realizar preguntas y/o sugerencias al siguiente email:</p>
                    <p>Murphy, Néstor Julián </p>
                    <p><b>Laboratorio de Informática (Dpto. Informática)</b></p>
                    <i> jmurphy@curza.net </i>
                  ",
    ],


];
?>
<div class="site-index">
  <!--<a href="#" id="tour" class="btn btn-dark">Tour</a>-->

    <div class="jumbotron">
        <img src="curza_logo.png" width=15% alt="">
        <h2 style="font-weight:bold">Centro Universitario Regional Zona Atlántica</h2>
        <h2>Universidad Nacional del Comahue</h2>
        <p class="lead">Gestor de programas basado en YiiFramework.</p>
    </div>
    <div class="body-content">
        <div class="row">
          <div class="col-md-8">
            <?=  TabsX::widget([
                'items'=>$items,
                'position'=>TabsX::POS_LEFT,
                //'align'=>TabsX::ALIGN_CENTER,
                'height' => TabsX::SIZE_MEDIUM,
                'bordered'=>true,
                'encodeLabels'=>false,

                'enableStickyTabs' => true,
                'stickyTabsOptions' => [
                    'selectorAttribute' => 'data-target',
                    'backToTop' => true,

                ],
            ]); ?>
          </div>
          <div class="col-md-4">
            <h3 style="font-weight:">Colaboradores</h3>
            <ul style="list-style-type: none">
              <li><i class="glyphicon glyphicon-star"></i> Leandro M. Boisselier</li>
              <li><i class="glyphicon glyphicon-star"></i> Pablo F. Boisselier</li>
              <li><i class="glyphicon glyphicon-star"></i> Borjas Vega Rivera</li>
              <li><i class="glyphicon glyphicon-star"></i> Carolina Juárez</li>
              <li><i class="glyphicon glyphicon-star"></i> Cecilia E. Camera</li>
              <li><i class="glyphicon glyphicon-star"></i> Juan Carlos Brocca</li>
              <li><i class="glyphicon glyphicon-star"></i> Diego Martinez Díaz</li>
            </ul>
          </div>
        </div>

    </div>
</div>
