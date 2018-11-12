<?php

use yii\db\Migration;

/**
 * Class m180906_124454_departamento
 */
class m120906_124454_departamento extends Migration
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
      $this->createTable('{{departamento}}',[
        'id'      =>  $this->primaryKey(),
        'nom'     => $this->string()->notNull(),
        'codigo'  => $this->integer(),
      ], $options);

      $this->insert('{{%departamento}}', [
          'id' => 1,
          'nom' => 'CyT',
          'codigo' => 50,
      ]);
      $this->insert('{{%departamento}}', [
          'id' => 2,
          'nom' => 'Lengua y comunicación',
          'codigo' => 10,
      ]);
      $this->insert('{{%departamento}}', [
          'id' => 3,
          'nom' => 'Pedagogía',
          'codigo' => 60,
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropTable('{{departamento}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180906_124454_departamento cannot be reverted.\n";

        return false;
    }
    */
}