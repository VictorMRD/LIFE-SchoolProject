<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    use HasFactory;
    protected $fillable = ['options'];
    protected $table = 'options';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function getById($id)
    {
        // O puedes usar Option::find($id)
        return option::findOrFail($id);
    }
}
