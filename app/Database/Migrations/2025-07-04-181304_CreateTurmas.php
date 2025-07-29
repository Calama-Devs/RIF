<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTurmas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],

            'nome' => [
                'type'          => 'VARCHAR',
                'constraint'    => 96,
                'unique'        => TRUE
            ],

            'curso_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->addForeignKey('curso_id', 'cursos', 'id'); //chave estrangeira        
        $this->forge->createTable('turmas');
    }

    public function down()
    {
        $this->forge->dropTable('turmas', true, true);
    }
}
