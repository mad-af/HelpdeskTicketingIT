<?php

namespace App\Schema;

use Illuminate\Support\Facades\Hash;

class UserSchema {
    public static function schemaInsert($payload) {
        return [
            'name' => $payload->name,
            'email' => $payload->email,
            'password' => Hash::make($payload->password),
            // 'level' => $payload->level
        ];
    }

    public static function schemaUpdate($payload) {
        $data = array_shift($payload);
        return (object) [
            'userId' => array_shift($payload),
            'data' => [
                'name' => $data->name
            ]
        ];
    }
}