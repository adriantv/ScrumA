<?php

use yii\db\Migration;

class m160623_213319_scrumA extends Migration
{
    public function safeUp()
    {
 
         $tableOptions = null;

        if ($this->db->driverName === 'mysql') {

            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci

            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
      
         $this->createTable('{{%integrantes}}', [
            'Id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull()->unique(),
            'correo' => $this->string()->notNull(),
            'telefono' => $this->string()->notNull(),
            'contrasenia' => $this->string()->notNull()->unique(),
             'idHistorias'=> $this->integer(),
           ], $tableOptions);
         
         $this->createTable('{{%historias}}',[
             'id'=>$this->primaryKey(),
             'nombreHistoria'=>  $this->string()->notNull()->unique(),
             'numeroHistoria'=> $this->string()->notNull()->unique(),
             'descripcionHistoria'=>  $this->text(),
             'pesoHistoria'=>  $this->string()->notNull()->unique(),
             'status'=>  $this->string()->notNull()->unique(),
             'idSprint'=> $this->integer(),
        ],$tableOptions);
         
         $this->createTable('{{%sprint}}',[
             'id'=> $this->primaryKey(),
             'descripcionSprint'=> $this->string()->notNull(),
             'f_inicio'=> $this->date()->notNull(),
             'f_final'=>$this->date()->notNull(),
             'numeroDias'=>  $this->string()->notNull()->unique(),
            'status'=>$this->string()->notNull()->unique()
             
         ],$tableOptions);
         
         
          $this->addForeignKey('FK_act_proy','integrantes','idHistorias','historias','id');
        
        

    }

    public function safeDown()
    {
     
        $this->dropForeignKey('FK_act_proy', 'integrantes');
        $this->dropTable('{{%integrantes}}');
         $this->dropTable('{{%historias}}');
        $this->dropTable('{{%sprint}}');
        
        echo "m160623_213319_scrumA cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
