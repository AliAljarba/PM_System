<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'S_Date'
    ];


public function project(){
        return $this->belongsTo('App\Project','Project_id');
     }
}
