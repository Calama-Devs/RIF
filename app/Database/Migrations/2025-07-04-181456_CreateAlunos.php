<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAlunos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'matricula' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'nome' => [
                'type'          => 'VARCHAR',
                'constraint'    => 96,
                'unique'        => TRUE
            ],

            'turma_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'status' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'unsigned'          => TRUE
            ]
        ]);

        $this->forge->addKey('matricula', true, true); //chave primária
        $this->forge->addForeignKey('turma_id', 'turmas', 'id'); //chave estrangeira        
        $this->forge->createTable('alunos');
    }

    public function down()
    {
        $this->forge->dropTable('alunos', true, true);
    }
}
