<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCursos extends Migration
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
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->createTable('cursos');
    }

    public function down()
    {
        $this->forge->dropTable('cursos', true, true);
    }
}
