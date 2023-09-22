<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected static $chat_id;
    protected static $update_id;
    protected static $message_id;
    protected static $first_name;
    protected static $last_name;
    protected static $username;
    protected static $texto;
    protected static $callback;
    protected static $current_id;
    protected static $enunciado;


    
}
