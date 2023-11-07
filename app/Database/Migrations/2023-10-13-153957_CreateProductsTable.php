<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'cat_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default null',
        ]);
        // $this->forge->addForeignKey('id', 'users', 'user_id', 'NULL', 'NULL');
        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('users','user_id');
        $this->forge->dropTable('products');
    }
}
