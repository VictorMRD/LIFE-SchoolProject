<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['option'];
    protected $table = 'options';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function getById($id)
    {
        // O puedes usar Option::find($id)
        return Option::findOrFail($id);
    }
}
