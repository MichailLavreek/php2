<?php

namespace App;

use App\Exceptions\Error404;

abstract class Model
{
    const TABLE = '';

    public $id;

    public static function findAll()
    {
        $db = DB::getInstance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY id',
            static::class
        );
    }

    public static function findById($id)
    {
        $db = DB::getInstance();
        $rezArr = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id',
            static::class,
            [':id' => $id]
        );
        
        if (empty($rezArr)) {
            $exception = new Error404('Запись не найдена');
            throw $exception;
        }
        
        return $rezArr[0];
    }

    public function isNew()
    {
        return empty($this->id);
    }

    private function insert()
    {
        foreach ($this as $k => $value) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' 
        (' . implode(',', $columns) . ')
        VALUES
        (' . implode(',', array_keys($values)) . ')
        ';
        $db = DB::getInstance();
        $db->execute($sql, $values);

        $this->id = $db->getLastId();
    }

    private function update()
    {
        $keyValue = '';
        foreach ($this as $k => $value) {
            if ('id' == $k || 'data' == $k) {
                continue;
            }

            $values[':' . $k] = $value;
            $keyValue = $keyValue . $k . '=:' . $k . ', ';
        }
        $keyValue = substr($keyValue, 0, strrpos($keyValue, ','));

        $sql =
            'UPDATE ' . static::TABLE . ' 
            SET ' . $keyValue . '
            WHERE id=' . $this->id;
        $db = DB::getInstance();
        $db->execute($sql, $values);
    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        } 
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . '
        WHERE id=' . $this->id;
        $db = DB::getInstance();
        $db->execute($sql);


        foreach ($this as $k => $value) {
            unset($this->$k);
        }
    }
    
}