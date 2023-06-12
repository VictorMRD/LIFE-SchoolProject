<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frasesz extends Model
{
    use HasFactory;
    protected $fillable = ['table_frasesesitas'];
    protected $table = 'table_frasesesitas';

    public static function getAllFrases(){
        return frasesz::all();
    }

    public static function getFrase($id){
        return frasesz::find($id);
    }
}
