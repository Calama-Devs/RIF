<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAlunoTelefone extends Migration
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
            
            'aluno_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'telefone' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => TRUE
            ],

            'status' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'unsigned'          => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->addForeignKey('aluno_id', 'alunos', 'matricula'); //chave estrangeira        
        $this->forge->createTable('alunos_telefones');
    }

    public function down()
    {
        $this->forge->dropTable('alunos_telefones', true, true);
    }
}
