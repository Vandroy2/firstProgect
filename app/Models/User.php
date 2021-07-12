<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

     //  =============================================================

    # функция добавлена вручную
    
    // public function user(){

    

    // $user = new User;

    // $user->name = 'John Doe';

    // $user->email = 'JohnDoe@ukr.net';

    // $user->password = 1234;

    // }

 //  =============================================================
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     * 
     */

    //  =============================================================
    protected $fillable = [
        'name',
        'email',
        'password',
        
    ];


    // ==============================================================

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


      // ===============================================================

    //   public function user() # привязка статьи к пользавателю
    //   {
    //       return $this->belongsTo('App\Model\User');
    //   }
      
  
    // public function articles() # пользователь может написать несколько статей
    // {
    //     return $this->hasMany('App\Model\Contact');
    // }

// ============================================================

// public function isATeamManager(){

//     return false;
// }




// =============================================================

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
