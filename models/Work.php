<?php
namespace Model;

use Cores\Model;

class Work extends Model
{
    public static $table = 'works';

    public static function index()
    {
        $data = Work::all(1);
        return $data;
    }
}
