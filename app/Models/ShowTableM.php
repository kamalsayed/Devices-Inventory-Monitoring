<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Support\Facades\DB;

class ShowTableM extends Model
{
    use HasFactory;

    public static function getPcData($id=null){
        $value = DB::table('computers')->orderBy('id','asc')->get();
        return $value;
    }



}
