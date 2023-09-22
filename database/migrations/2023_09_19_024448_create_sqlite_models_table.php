<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('sqlite_temp')->create('usuario_datos', function($table){
            $table->increments('id');
            $table->string('chahat_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('id_institucion');
            $table->string('id_edad');
            $table->string('id_sexo');
            $table->string('id_educacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sqlite_models');
    }
};
