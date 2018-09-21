<?php

use yii\db\Migration;

/**
 * Class m180906_111933_programa
 */
class m180906_125933_programa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $options = null;
      if ( $this->db->driverName=='mysql' ) {
        $options = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
      }
      $this->createTable('{{programa}}',[
          'id'      =>  $this->primaryKey(),
          'departamento_id' => $this->integer(),
          'status_id' => $this->integer(),
          'asignatura' => $this->string(100)->notNull(),
          //'carrera'     => $this->integer(),
          'curso'       => $this->string(60)->notNull(),
          'year'        => $this->string(4),
          'cuatrimestre'=> $this->integer(),
          'profadj_regular' => $this->string(60)->notNull(),
          'asist_regular'   => $this->string(60)->notNull(),
          'ayudante_p'             => $this->string(60)->notNull(),
          'ayudante_s'             => $this->string(60)->notNull(),
          'fundament'       => $this->text()->notNull(),
          'objetivo_plan'   => $this->text()->notNull(),
          //'objetivo_programa' => $this->string(255)->notNull(), fk
          'contenido_plan'  => $this->text()->notNull(),
          //'contenido_analitico' => $this->string()->notNull(), fkxunidad
          //bibliografía basica fkxunidad
          'propuesta_met'   => $this->text()->notNull(),
          'evycond_acreditacion' => $this->text()->notNull(),
          'parcial_rec_promo' => $this->text()->notNull(),
          'distr_horaria' => $this->text()->notNull(),
          'crono_tentativo' => $this->text()->notNull(),
          'actv_extracur' => $this->text()->notNull(),


          'created_at'  => $this->dateTime(),
          'updated_at'  => $this->dateTime(),
          'created_by'  => $this->integer(),
          'updated_by'  => $this->integer(),
      ], $options);

      $this->addForeignKey(
        'departamentoprograma',
        'programa',
        'departamento_id',
        'departamento',
        'id',
        'no action',
        'no action'
      );
      $this->addForeignKey(
        'statusprograma',
        'programa',
        'status_id',
        'status',
        'id',
        'no action',
        'no action'
      );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey('departamentoprograma','{{departamento}}');
      $this->dropForeignKey('statusprograma','{{status}}');
      $this->dropTable('{{programa}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180906_111933_programa cannot be reverted.\n";

        return false;
    }
    */
}
