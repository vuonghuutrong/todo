<?php
namespace Cores;

use Cores\DB;

class Model
{
    public static $table;

    public static function find($id)
    {
        $query = DB::query('SELECT * FROM ' . static::$table . ' where id =  ?', [$id]);
        return empty($query) ? $query : $query[0];
    }

    public static function all()
    {
        return DB::query('SELECT * FROM ' . static::$table);
    }

    public static function insert($data)
    {
        $query = 'INSERT INTO ' . static::$table . ' (' . implode(',', array_keys($data)) . ') 
                    VALUES (' . rtrim(str_repeat('?,', count($data)), ',') . ')';
        return DB::query($query, array_values($data));
    }
    
    public static function update($id, $data)
    {
        $work = self::find($id);
        if (empty($work)) {
            die('Object not found');
        }
        $query = 'UPDATE ' . static::$table . ' SET ' . implode(' = ?, ', array_keys($data)) . ' = ? WHERE id = ?';
        return DB::query($query, array_merge(array_values($data), [$id]));
    }
    
    public static function delete($id)
    {
        $work = self::find($id);
        if (empty($work)) {
            die('Object not found');
        }
        return DB::query('DELETE FROM ' . static::$table . ' WHERE id = ?', [$id]);
    }
}
