<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateControleRefeicao extends Migration
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

            'data_refeicao' => [
                'type'          => 'DATE'
            ],

            'data_confirmacao' => [
                'type'          => 'DATETIME',
                'null'          => TRUE,
            ],

            'data_retirada' => [
                'type'          => 'DATETIME',
                'null'          => TRUE,
            ],

            'status' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'unsigned'          => TRUE
            ],

            'motivo' => [
                'type'              => 'INT',
                'constraint'        => 2,
                'unsigned'          => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->addForeignKey('aluno_id', 'alunos', 'matricula'); //chave estrangeira        
        $this->forge->createTable('controle_refeicoes');
    }

    public function down()
    {
        $this->forge->dropTable('controle_refeicoes', true, true);
    }
}
