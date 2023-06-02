<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['message']; 
    protected $table = 'messages';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function index()
    {
        $mensajes = Message::all();
        return view('chat-list', compact('mensajes'));
    }
}
