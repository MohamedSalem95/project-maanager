<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    // returns the user who created the project
    public function User() {
        return $this->belongsTo(User::class);
    }

    public function members(){
        return $this->belongsToMany(User::class);
    }
}
