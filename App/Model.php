<?php

namespace App;

abstract class Model
{
    const TABLE = '';

    public static function findAll()
    {
        $db = new DB();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY id',
            static::class
        );
    }

    public static function findById($id)
    {
        $db = new DB();
        $rezArr = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id',
            static::class,
            [':id' => $id]
        );
        
        if (!empty($rezArr)) {
            return $rezArr;
        }
        return false;
    }
}