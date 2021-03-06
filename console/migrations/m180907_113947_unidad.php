<?php

use yii\db\Migration;

/**
 * Class m180907_113947_unidad
 */
class m180907_113947_unidad extends Migration
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
       $this->createTable('{{unidad}}',[
           'id'      =>  $this->primaryKey(),
           'descripcion' => $this->string()->notNull(),
           'biblio_basica' => $this->string()->notNull(),
           'biblio_consulta' => $this->string()->notNull(),
           'crono_tent' => $this->date(),
           'programa_id' => $this->integer()
       ], $options);

       $this->addForeignKey(
         'programaunidad',
         'unidad',
         'programa_id',
         'programa',
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
       $this->dropForeignKey('programaunidad','{{programa}}');
       $this->dropTable('{{unidad}}');
     }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180907_113947_unidad cannot be reverted.\n";

        return false;
    }
    */
}
