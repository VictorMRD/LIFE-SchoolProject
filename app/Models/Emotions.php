<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emotions extends Model
{
    protected $fillable = ['table_emotions'];
    protected $table = 'table_emotions';
    use HasFactory;

    public static function getById($id)
    {
        // O puedes usar Option::find($id)
        return Emotions::findOrFail($id);
    }
}
