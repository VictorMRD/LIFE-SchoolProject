<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestUsers extends Model
{
    use HasFactory;
    protected $fillable = ['best_users'];
    protected $table = 'best_users';
    
    public static function addUser($name, $email)
    {
        $user = new BestUsers();
        $user->name = $name;
        $user->email = $email;
        $user->save();
    }

    public static function getAllUsers(){
        return BestUsers::all();
    }

    public static function findUser($email){
        return BestUsers::where('email', $email)->first();
    }

    public static function removeUser($email){
        $user = BestUsers::where('email', $email)->first();
        if ($user) {
            $user->delete();
        }
    }
}
