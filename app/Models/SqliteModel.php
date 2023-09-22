<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SqliteModel extends Model
{
    use HasFactory;

    

    public function __construct() {
        
        DB::connection('sqlite_temp')->getPdo()->exec('ATTACH DATABASE ":memory:" AS user_db');
    }

    public function up_usuarios_data_table($table) {

        DB::connection('sqlite_temp')
        ->statement('CREATE TABLE user_db.' . $table . '
         (  
            id INTEGER PRIMARY KEY, 
            chat_id TEXT NULL,
            fisrt_name TEXT NULL,
            last_name TEXT NULL,
            username TEXT NULL,
            id_institucion INT NULL,
            id_edad INT NULL,
            id_sexo INT NULL,
            id_educacion INT NULL
        )');


    }

    public function down_sqlite() {
        $database = 'user_db';
        //$connection = DB::connection($database)->getConnection();
        //$connection->disconnect();
    }

    public static function set_usuario_info($campo, $valor, $table) {
        DB::connection('sqlite_temp')
        ->table('user_db.' . $table)
        ->insert([
            $campo => $valor,
                ]);
    }

    public static function get_chat_id($table) {
        return DB::connection('sqlite_temp')
        ->table('user_db.' . $table)
        ->select('chat_id')
        ->first();
    }


}
