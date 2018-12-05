<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
   
 protected $fillable = [
        'id',
        'name',
        
];
    public function tasks(){
        return $this->hasMany('App\task','Project_id');
     }
}