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
         $this->createTable('{{%Administrador}}', [
             'Id'=>  $this->primaryKey(),
             'NombreCompleto'=>$this->string(100)->notNull(),
             'Telefono'=>$this->string(10)->notNull(),
             'Id_user'=>$this->integer()->notNull(),
         ], $tableOptions);
         
         $this->createTable('{{%Integrantes}}', [
            'Id' => $this->primaryKey(),
            'NombreCompleto' => $this->string()->notNull(),
            'Telefono' => $this->string()->notNull(),
            'Id_user'=>$this->integer()->notNull(),
           ], $tableOptions);
        
         
         $this->createTable('{{%Historias}}',[
             'Id'=>$this->primaryKey(),
             'NombreHistoria'=>  $this->string()->notNull(),
             'NumeroHistoria'=> $this->integer()->notNull()->unique(),
             'DescripcionHistoria'=>  $this->text(),
             'PesoHistoria'=>  $this->integer()->notNull(),
             'Status'=>  $this->integer(),
             'fechafinal'=>$this->date(),
             'Id_Integrante'=>  $this->integer(),
             'Id_Sprints'=> $this->integer(),
        ],$tableOptions);
         
         $this->createTable('{{%Sprints}}',[
             'Id'=> $this->primaryKey(),
             'NombreSprint'=>  $this->string()->notNull(),
             'DescripcionSprint'=>  $this->text(),
             'F_inicio'=> $this->date()->notNull(),
             'F_final'=>$this->date()->notNull(),
             'NumeroDias'=>  $this->integer()->notNull(),
             'Status'=>$this->string()->notNull(),
             
         ],$tableOptions);
         
         
          $this->addForeignKey('FK_his_inte_proy','Historias','Id_Integrante','Integrantes','Id');
          $this->addForeignKey('FK_his_spr_proy','Historias','Id_Sprints','Sprints','Id');
          $this->addForeignKey('FK_admin_user_proy','Administrador','Id_user','user','id');
          $this->addForeignKey('FK_inte_user_proy','Integrantes','Id_user','user','id');
        

    }

    public function safeDown()
    {
     
        $this->dropForeignKey('FK_his_inte_proy', 'Historias');
        $this->dropForeignKey('FK_his_spr_proy', 'Historias');
        $this->dropForeignKey('FK_admin_user_proy', 'Administrador');
        $this->dropForeignKey('FK_inte_user_proy', 'Integrantes');
        $this->dropTable('{{%Administrador}}');
        $this->dropTable('{{%Integrantes}}');
         $this->dropTable('{{%Historias}}');
        $this->dropTable('{{%Sprint}}');
        
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
