<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'Username', 
        'Age', 
        'Email', 
        'Password',
        'Position',
        'Description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Add the below function
    public function messages()
    {
        return $this->hasMany(Message::class);
    }    

    public static function getUser($userId){
        return User::find($userId);
    }

    public static function getUserE($email){
        return User::where('email', $email)->first();
    }

    public static function getAllUsers(){
        return User::all();
    }

    public static function removeUserr($email){
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->delete();
        }
    }
}
