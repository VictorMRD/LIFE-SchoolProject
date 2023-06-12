<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class votationtable extends Model
{
    use HasFactory;
    protected $fillable = ['table_votations'];
    protected $table = 'table_votations';

    public static function getAllVotations(){
        return votationtable::all();
    }

    public static function getVotacion($id){
        return votationtable::find($id);
    }
}
