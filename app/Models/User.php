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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];

    static public function getSingle($id)
    {
        return self::find($id); //created this to use this function to find using id
    }
    
    static public function getRecordUser()
    {
        return User::select('users.*')
            ->where('is_admin', '=', 0)
            ->where('is_delete', '=', 0)
            ->orderBy('users.id', 'desc')
            ->paginate(10);
    }

    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic)){
            return url('upload/profile/'.$this->profile_pic);
        }
        else{
            return url('assets/img/profile-img.jpg');
        }
    }

}