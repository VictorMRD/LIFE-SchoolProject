<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedUsers extends Model
{
    use HasFactory;
    protected $fillable = ['deleted_users'];
    protected $table = 'deleted_users';

    public static function addDeleted($email, $name){
        $user = new DeletedUsers();
        $user->name = $name;
        $user->email = $email;
        $user->save();
    }

    public static function getAllDeleted(){
        return DeletedUsers::all();
    }
}
