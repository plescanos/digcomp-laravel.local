<?php

if (!function_exists('check_chat_id_exists')) {
    function check_chat_id_exists($chat_id, $chat_id_collection) : bool {

        foreach ($chat_id_collection as $value) {
            $array_chat_id[] = $value->chat_id;
        }

        if (!in_array($chat_id, $array_chat_id)) {
            
            return false;

        } else {

            return true;

        }
    }
}