<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // the list of projects the user created
    public function projects(){
        return $this->hasMany(Project::class);
    }

    // the list of projects the user is in
    public function projects_iam_in(){
        return $this->belongsToMany(Project::class);
    }

    // the list of tasks the user has
    public function tasks(){
        return $this->hasMany(Task::class);
    }


}
