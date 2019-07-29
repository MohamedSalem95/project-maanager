<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    // the user who should do the task
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    // the project which the task belongs to
    public function project() {
        return $this->belongsTo(User::class);
    }
}
