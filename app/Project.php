<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    // returns the user who created the project
    public function User() {
        return $this->belongsTo(User::class);
    }

    // the list of members in the project
    public function members(){
        return $this->belongsToMany(User::class);
    }

    // the list of tasks in the project
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
